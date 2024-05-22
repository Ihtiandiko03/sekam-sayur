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
    
    
                $file->storeAs('sim/','SIM_' . $filename);
                $file2->storeAs('stnk/','STNK_' . $filename2);
    
    
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
}
