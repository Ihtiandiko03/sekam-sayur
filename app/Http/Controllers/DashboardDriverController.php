<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardDriverController extends Controller
{
    public function index(){
        $getPengiriman = DB::table('tracking')->where('nama_driver', (auth()->user()->id))->where('status', '!=','Pesanan berhasil dibuat')->where('status', '!=','Pesanan Siap Diantarkan. Menunggu Konfirmasi Admin')->get();

        return view('dashboard.pages.driver', [
            'link' => 'Pengiriman',
            'pengiriman' => $getPengiriman
        ]);
    }

    public function lihatpengiriman($id){
        $data = DB::select("SELECT pemesanan.*, products.* FROM pemesanan JOIN products ON pemesanan.id_produk = products.id  where pemesanan.nomor_resi = '$id'");
        $getDriver = DB::table('users')->where('role', 3)->get();


        return view('dashboard.pages.lihatpesanan', [
            'link' => 'Pengiriman',
            'pesanan' => $data,
            'drivers' => $getDriver
        ]);
    }

    public function konfirmasipenjemputan(Request $request){
        // var_dump($request->id); die;

        $getData = DB::select("SELECT tracking.*, users.name FROM tracking JOIN users ON tracking.nama_driver = users.id  where tracking.nomor_resi = '$request->id'");
        // var_dump($getData); die;

        $validateData = [
            'status' => 'Barang sedang dikirim oleh Driver '.$getData[0]->name,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = DB::table('tracking')
                ->where('nomor_resi', $request->id)
                ->update($validateData);
        
        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Silahkan Ambil Barang di Gudang');window.location.href='/driver';</script>");
        }
    }

    public function konfirmasipenerimaanbarang(Request $request){
        
        // var_dump($request->foto_penerimaan_barang); die;
        
        $validatedData = $request->validate([
            'nama_penerima_barang' => 'required|max:255',
            'foto_penerimaan_barang' => 'required',
        ]);
        
        
        $validatedData += [
            'status' => 'Barang Sudah Diterima',
            'updated_at' => date('Y-m-d H:i:s')
        ];


        if ($request->hasFile('foto_penerimaan_barang')) {
            $file = $request->file('foto_penerimaan_barang');
            $filename = $file->getClientOriginalName();

            $validatedData['foto_penerimaan_barang'] = 'Penerimaan_'.$filename;


            $file->storeAs('public/penerimaan/','Penerimaan_' . $filename);
            
            // var_dump($validatedData); die;


            $update = DB::table('tracking')
                ->where('nomor_resi', $request->nomor_resi)
                ->update($validatedData);

            if($update){
                echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/driver';</script>");
            }
        }
    }
}
