<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DashboardAdminController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(Authenticate::class);
    // }

    public function index(){
        return view('dashboard.pages.dashboard', [
            'link' => 'Dashboard'
        ]);
    }

    public function akundriver(){
        $getDriver = DB::table('users')->where('role', 3)->where('is_active', 1)->get();
        $getGudang = DB::table('users')->where('role', 4)->where('is_active', 1)->get();

        return view('dashboard.pages.akundriver', [
            'link' => 'Driver',
            'drivers' => $getDriver,
            'gudang' => $getGudang
        ]);
    }

    public function tambahdriver(){
        $getKecamatan = DB::table('kecamatan')->get();
        return view('dashboard.pages.tambahdriver', [
            'link' => 'Driver',
            'kecamatan' => $getKecamatan
        ]);
    }

    public function simpandriver(Request $request){

        // var_dump($request->akun ); die;
        if($request->akun === 'Gudang'){
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
                'alamat' => 'required'
            ]);

            $validatedData['password'] = Hash::make($validatedData['password']);

            $validatedData += [
                'role' => 4, //GUDANG
                'is_active' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ];

            $upload = DB::table('users')->insert($validatedData);
            if($upload){
                echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/akundriver';</script>");
            }
    
        }
        elseif($request->akun === 'Driver'){
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
                'alamat' => 'required',
                'nomor_kendaraan' => 'required',
                'daop' => 'required',
                'sim' => 'required|mimes:jpeg,png,jpg',
                'stnk' => 'required|mimes:jpeg,png,jpg',
            ]);
    
            $validatedData['password'] = Hash::make($validatedData['password']);
    
            $validatedData += [
                'role' => 3, //DRIVER
                'is_active' => 1,
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ];
    
            if ($request->hasFile('sim') && $request->hasFile('stnk')) {
                $file = $request->file('sim');
                $filename = $file->getClientOriginalName();
    
                $file2 = $request->file('stnk');
                $filename2 = $file2->getClientOriginalName();
    
                $validatedData['sim'] = 'SIM_'.$filename;
                $validatedData['stnk'] = 'STNK_'.$filename2;
    
    
                $file->storeAs('public/sim/','SIM_' . $filename);
                $file2->storeAs('public/stnk/','STNK_' . $filename2);
    
    
                $upload = DB::table('users')->insert($validatedData);
                if($upload){
                    echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/dashboard/akundriver';</script>");
                }
            }
        }
        
    }

    public function editdriver($id){
        $getDriver = DB::table('users')->where('id',$id)->first();
        $getKecamatan = DB::table('kecamatan')->get();


        return view('dashboard.pages.ubahdriver', [
            'link' => 'Driver',
            'driver' => $getDriver,
            'kecamatan' => $getKecamatan
        ]);
    }

    public function simpanubahdriver(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone_number' => 'required',
            'alamat' => 'required',
            'nomor_kendaraan' => 'required',
            'daop' => 'required',
        ]);

        $update = DB::table('users')
              ->where('id', $_POST['id'])
              ->update($validatedData);

        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Diubah');window.location.href='/dashboard/akundriver';</script>");
        }
    }

    public function hapusdriver($id){
        $delete = DB::table('users')
              ->where('id', $id)
              ->update(['is_active' => 0]);
        
        if($delete){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Dihapus');window.location.href='/dashboard/akundriver';</script>");
        }
    }

    public function editgudang($id){
        $getGudang = DB::table('users')->where('id',$id)->first();


        return view('dashboard.pages.ubahgudang', [
            'link' => 'Driver',
            'gudang' => $getGudang,
        ]);
    }

    public function simpanubahgudang(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone_number' => 'required',
            'alamat' => 'required',
        ]);

        $update = DB::table('users')
              ->where('id', $_POST['id'])
              ->update($validatedData);

        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Diubah');window.location.href='/dashboard/akundriver';</script>");
        }
    }

    public function pesanan(){
        $data = DB::select("SELECT distinct(pemesanan.nomor_resi),tracking.status, tracking.paid_stat FROM pemesanan JOIN tracking ON tracking.nomor_resi = pemesanan.nomor_resi WHERE tracking.paid_stat = 'Paid'");
        
        return view('dashboard.pages.adminpesanan', [
            'link' => 'Pesanan',
            'pesanan' => $data
        ]);
    }

    public function lihatpesanan($id){
        $data = DB::select("SELECT pemesanan.*, products.* FROM pemesanan JOIN products ON pemesanan.id_produk = products.id  where pemesanan.nomor_resi = '$id'");
        $getDriver = DB::table('users')->where('role', 3)->get();


        return view('dashboard.pages.lihatpesanan', [
            'link' => 'Pesanan',
            'pesanan' => $data,
            'drivers' => $getDriver
        ]);
    }

    public function pilihdriver(Request $request){
        // var_dump($_POST); die;


        $validatedData = [
            'nama_driver' => $request->nama_driver,
            'status' => 'Menunggu Driver mengirim barang',
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = DB::table('tracking')
              ->where('nomor_resi', $request->nomor_resi)
              ->update($validatedData);

        if($update){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Driver Berhasil Dipilih');window.location.href='/dashboard/pesanan';</script>");
        }
    }
}
