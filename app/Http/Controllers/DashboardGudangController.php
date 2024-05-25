<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DashboardGudangController extends Controller
{
    public function index(){
        return view('dashboard.pages.dashboard', [
            'link' => 'Dashboard'
        ]);
    }

    public function product(){
        $getProduct = DB::table('products')->where('is_deleted', 0)->get();
        return view('dashboard.pages.product', [
            'link' => 'Product',
            'products' => $getProduct
        ]);
    }

    public function tambahproduct(){
        return view('dashboard.pages.tambahproduct', [
            'link' => 'Product'
        ]);
    }

    public function simpanproduct(Request $request){
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'tipe' => 'required',
            'jumlah_stok' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg',
        ]);

        $validatedData+= [
            'slug' => Str::slug($request->nama_produk, '-'),
            'harga_per_ikat' => $request->harga_per_ikat ? $request->harga_per_ikat : 0,
            'harga_per_kg' => $request->harga_per_kg ? $request->harga_per_kg : 0,
            'harga_per_ons' => $request->harga_per_ons ? $request->harga_per_ons : 0,
            'harga_per_biji' => $request->harga_per_biji ? $request->harga_per_biji : 0,
            'is_deleted' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();

           

            $validatedData['gambar'] = 'Product_'.$filename;


            $file->storeAs('public/product/','Product_' . $filename);


            $upload = DB::table('products')->insert($validatedData);
            if($upload){
                echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/gudang/product';</script>");
            }
        }
    }

    public function lihatproduct($slug){
        $product = DB::table('products')->where('slug', $slug)->first();
        return view('dashboard.pages.lihatproduct', [
            'link' => 'Product',
            'product' => $product
        ]);
    }

    public function editproduct($slug){
        $product = DB::table('products')->where('slug', $slug)->first();
        return view('dashboard.pages.editproduct', [
            'link' => 'Product',
            'product' => $product
        ]);
    }

    public function simpaneditproduct(Request $request){
        // var_dump($_POST); die;
        $validatedData = $request->validate([
            'nama_produk' => 'required|max:255',
            'tipe' => 'required',
            'jumlah_stok' => 'required',
            'deskripsi' => 'required'
        ]);

        $validatedData+= [
            'slug' => Str::slug($request->nama_produk, '-'),
            'harga_per_ikat' => $request->harga_per_ikat ? $request->harga_per_ikat : 0,
            'harga_per_kg' => $request->harga_per_kg ? $request->harga_per_kg : 0,
            'harga_per_ons' => $request->harga_per_ons ? $request->harga_per_ons : 0,
            'harga_per_biji' => $request->harga_per_biji ? $request->harga_per_biji : 0,
            'is_deleted' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = $file->getClientOriginalName();

           
            $validatedData+= [
                'gambar' => 'Product_'.$filename
            ];


            $file->storeAs('public/product/','Product_' . $filename);
        }

        $update = DB::table('products')
          ->where('id', $_POST['id'])
          ->update($validatedData);
        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Diubah');window.location.href='/gudang/product';</script>");
        }
    }

    public function hapusproduct($id){
        $delete = DB::table('products')
              ->where('id', $id)
              ->update(['is_deleted' => 1]);
        
        if($delete){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Dihapus');window.location.href='/gudang/product';</script>");
        }
    }


    public function pesanan(){
        // $data = DB::table('pemesanan')->groupBy('nomor_resi')->get();
        $data = DB::select("SELECT distinct(pemesanan.nomor_resi),tracking.status, tracking.paid_stat FROM pemesanan JOIN tracking ON tracking.nomor_resi = pemesanan.nomor_resi WHERE tracking.paid_stat = 'Paid'");
        
        return view('dashboard.pages.pesanan', [
            'link' => 'Pesanan',
            'pesanan' => $data
        ]);

        // var_dump($data); die;
    }

    public function lihatpesanan($id){
        // $data = DB::table('pemesanan')->where('nomor_resi', $id)->get();

        $data = DB::select("SELECT pemesanan.*, products.* FROM pemesanan JOIN products ON pemesanan.id_produk = products.id  where pemesanan.nomor_resi = '$id'");


        return view('dashboard.pages.lihatpesanan', [
            'link' => 'Pesanan',
            'pesanan' => $data
        ]);
        // var_dump($data); die;
    }

    public function konfirmasipesanan($id){
        $validatedData = [
            'status' => 'Pesanan Siap Diantarkan. Menunggu Konfirmasi Admin',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = DB::table('tracking')
          ->where('nomor_resi', $id)
          ->update($validatedData);
        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Pesanan Berhasil Disimpan');window.location.href='/gudang/pesanan';</script>");
        }
    }


}
