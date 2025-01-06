<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class DashboardUserController extends Controller
{
    public function checkout(Request $request){
        switch ($_GET["action"]) {
            case "add":
                if (!empty($_POST["quantity"])) {
                    $productByCode = DB::table('products')->where('id', '=', $_POST["code"])->get();
                    if($productByCode[0]->harga_per_biji != 0){
                        $harga = $productByCode[0]->harga_per_biji;
                    }
                    elseif($productByCode[0]->harga_per_kg != 0){
                        $harga = $productByCode[0]->harga_per_kg;
                    }
                    elseif($productByCode[0]->harga_per_ons != 0){
                        $harga = $productByCode[0]->harga_per_ons;
                    }
                    elseif($productByCode[0]->harga_per_ikat != 0){
                        $harga = $productByCode[0]->harga_per_ikat;
                    }

                    // $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                    
                    $itemArray = array($productByCode[0]->id => array('nama_produk' => $productByCode[0]->nama_produk, 'id' => $productByCode[0]->id, 'quantity' => $_POST["quantity"], 'harga' => $harga, 'gambar' => $productByCode[0]->gambar));
                    // var_dump($itemArray);
                    // die;

                    if (!empty(session('cart_item'))) {
                        // var_dump('TIDAK BISA');
                        // die;
                        if (in_array($productByCode[0]->id, array_keys(session('cart_item')))) {
                            foreach (session('cart_item') as $k => $v) {
                                if ($productByCode[0]->id == $k) {
                                    if (empty(session('cart_item')[$k]["quantity"])) {
                                        session('cart_item')[$k]["quantity"] = 0;
                                    }
                                    session('cart_item')[$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        }
                        else {
                            $gabung = array_merge(session('cart_item'), $itemArray);
                            session()->put('cart_item', $gabung);

                        }
                    }
                    else {
                        // $_SESSION["cart_item"] = $itemArray;
                        // Session::set('cart_item', $itemArray);
                        session()->put('cart_item', $itemArray);
                        // var_dump(Session::get('cart_item'));
                        // die;
                    }
                session()->flash('success', 'Pesanan berhasil ditambahkan ke keranjang!');
                }
                
                return redirect()->back();
                break;
            case "remove":
                $var = (int)$_GET["code"];
                $var -= 1;
                if (!empty(session('cart_item'))) {
                    foreach (session('cart_item') as $k => $v) {
                        if ($var == $k){
                            // unset(session('cart_item')[$k]);
                            // var_dump($k);
                            // die;
                            $cart = session('cart_item');
                            Arr::forget($cart, $k);
                            // array_forget($cart, $k);
                            session()->put('cart_item', $cart);
                            // session()->forget('cart_item', $k);
                        }
                        if (empty(session('cart_item'))){
                            session()->forget('cart_item');
                        }
                    }
                }
                return redirect()->back();
                break;
            case "empty":
                session()->forget('cart_item');
                return redirect()->back();
                break;
        }

    }

    public function isiform(){
        $data = session('cart_item');
        $total = 0;
        $bulan = date("m");
        $kueri = "SELECT COUNT(id) as total FROM `tracking` WHERE MONTH(created_at)= $bulan";
        $getData = DB::select($kueri);
        $nomor_tiket = 'TIC-'.date("Y").'-'.date("m").'-'.sprintf("%06d", ($getData[0]->total + 1));

        foreach($data as $d){
            $validatedData = [
                'nomor_resi' => $nomor_tiket,
                'id_pemesan' => auth()->user()->id,
                'nama_pemesan' => auth()->user()->name,
                'alamat_pemesan' => auth()->user()->alamat,
                'nomor_telepon' => auth()->user()->phone_number,
                'kecamatan' => auth()->user()->daop,
                'kota' => 'Kota Metro',
                'id_produk' => $d['id'],
                'nama_produk' => $d['nama_produk'],
                'jumlah_pesanan' => $d['quantity'],
                'harga_awal' => $d['harga'],
                'harga' => ($d['harga'] * $d['quantity']),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $total += $validatedData['harga'];
            $total += 3000; //ONGKIR SELURUH METRO

            DB::table('pemesanan')->insert($validatedData);
        }

        $validatedData2 = [
            'nomor_resi' => $nomor_tiket,
            'status' => 'Pesanan berhasil dibuat',
            'paid_stat' => 'Unpaid',
            'total_harga' => $total,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        

        $upload = DB::table('tracking')->insertGetId($validatedData2);
        if($upload){

            require '../vendor/midtrans/midtrans-php/Midtrans.php';
            
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $upload,
                    'gross_amount' => $total,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    'last_name' => '',
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->phone_number,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // dd($snapToken);

            return view('checkout', compact('snapToken', 'data', 'total', 'upload'));

            // session()->forget('cart_item');
            // echo ("<script LANGUAGE='JavaScript'>window.alert('Pesanan Berhasil Dibuat. Cek riwayat pesanan di menu Riwayat');window.location.href='/katalog';</script>");
        }
    }

    public function callback(Request $request){
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement' or $request->transaction_status == 'success'){
                DB::table('tracking')
                ->where('id', $request->order_id)
                ->update(['paid_stat' => 'Paid']);
            }
        }
    }

    public function invoice($id){
        $order = DB::table('tracking')->where('id', $id)->get();
        // return view('invoice', compact('order'));

        DB::table('tracking')
                ->where('id', $id)
                ->update(['paid_stat' => 'Paid']);

        session()->forget('cart_item');

        echo ("<script LANGUAGE='JavaScript'>window.alert('Pesanan Berhasil Dibuat. Cek riwayat pesanan di menu Riwayat');window.location.href='/katalog';</script>");


    }
}
