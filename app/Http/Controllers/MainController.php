<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        return view('main.index',[
            'active' => 'Home'
        ]);
    }

    public function login(){
        return view('main.login', [
            'active' => 'Login'
        ]);
    }

    public function register(){
        return view('main.register', [
            'active' => 'Register'
        ]);
    }

    public function daftarakun(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData += [
            'role' => 2,
            'is_active' => 1,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d')
        ];

        // var_dump($validatedData); die;


        DB::table('users')->insert($validatedData);
        return redirect('/login')->with('alert', 'Pendaftar akun berhasil, Silahkan login');
    }

    public function loginakun(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $kueri = "SELECT `is_active`,  `role` FROM `users` WHERE `email` = '".$credentials['email']."'";
        $getData = DB::select($kueri);
        $aktif = $getData[0]->is_active;
        $role = $getData[0]->role;

        // var_dump($role); die;

        if (Auth::attempt($credentials) && $aktif == 1) {
            $request->session()->regenerate();
            if ($role == 1) {
                return redirect()->intended('/dashboard');
            }
            else if($role == 2){
                return redirect()->intended('/');
            }
            else if($role == 4){
                return redirect()->intended('/gudang');
            }

        }

        echo ("<script LANGUAGE='JavaScript'>window.alert('GAGAL LOGIN. Pastikan Email dan Password sudah terdaftar');window.location.href='/login';</script>");
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function katalog(){
        $katalog = DB::table('products')->where('is_deleted', 0)->get();
        // var_dump($katalog); die;
        return view('main.katalog',[
            'active' => 'Katalog',
            'products' => $katalog
        ]);
    }

    public function debug(){
        dump(session()->all());
    }
}
