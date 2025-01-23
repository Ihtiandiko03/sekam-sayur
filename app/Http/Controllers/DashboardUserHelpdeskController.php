<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;


class DashboardUserHelpdeskController extends Controller
{
    public function index(){
        $getData = DB::table('helpdesks')->where('email', auth()->user()->email)->get();

        return view('dashboard.pages.helpdesk', [
            'link' => 'Helpdesk',
            'helpdesk' => $getData,
            'i' => 1
        ]);
    }

    public function pengajuanhelpdesk(){
        return view('dashboard.pages.pengajuanhelpdesk', [
            'link' => 'Helpdesk'
        ]);
    }

    public function simpanpengajuan(Request $request){
        $buatTiket='';

        if ($request->hasFile('bukti_foto')) {
            $validatedData = $request->validate([
                'nama',
                'email',
                'no_tiket' => 'required',
                'status' => 'required',
                'keterangan' => 'required',
                'bukti_foto',
                'created_at',
            ]);

            $validatedData['nama'] = auth()->user()->name;
            $validatedData['email'] = auth()->user()->email;
            $validatedData['created_at'] = date('Y-m-d H:i:s');


            $file = $request->file('bukti_foto');
            $filename = $file->getClientOriginalName();

            $validatedData['no_tiket'] = 'TIC-2025-'.$validatedData['no_tiket'];
            $validatedData['bukti_foto'] = $validatedData['no_tiket'].'-'.$filename;

            $buatTiket = DB::table('helpdesks')->insert($validatedData);

            $file->storeAs('public/foto_helpdesk/', $validatedData['bukti_foto']);
        } else{
            $validatedData2 = $request->validate([
                'nama',
                'email',
                'no_tiket' => 'required',
                'status' => 'required',
                'keterangan' => 'required',
                'created_at',
            ]);

            $validatedData2['nama'] = auth()->user()->name;
            $validatedData2['email'] = auth()->user()->email;
            $validatedData2['created_at'] = date('Y-m-d H:i:s');

            $validatedData2['no_tiket'] = 'TIC-2025-' . $validatedData2['no_tiket'];
            $buatTiket = DB::table('helpdesks')->insert($validatedData2);
        }

        if($buatTiket){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Tiket Berhasil Dibuat');window.location.href='/helpdesk';</script>");

            // return redirect('/dashboard/helpdesk');
        }
    }

    public function lihatriwayat($tiket){
        $getData = DB::table('helpdesks')->where('no_tiket', $tiket)->get();

        return view('dashboard.pages.lihatriwayathelpdesk', [
            'link' => 'Helpdesk',
            'helpdesk' => $getData[0],
            'i' => 1
        ]);
    }

    public function adminhelpdesk(){
        $getData = DB::table('helpdesks')->get();

        return view('dashboard.pages.adminhelpdesk', [
            'link' => 'Helpdesk',
            'helpdesk' => $getData,
            'i' => 1
        ]);
    }

    public function jawabhelpdesk($tiket){
        $getData = DB::table('helpdesks')->where('no_tiket', $tiket)->get();

        return view('dashboard.pages.jawabhelpdesk', [
            'link' => 'Helpdesk',
            'helpdesk' => $getData[0],
            'i' => 1
        ]);
    }

    public function simpandata(Request $request){
        $validatedData = $request->validate([
            'no_tiket' => 'required',
            'status' => 'required',
            'tanggapan' => 'required',
        ]);

        $updateData = DB::table('helpdesks')->where('no_tiket', $validatedData['no_tiket'])->update($validatedData);

        if($updateData){
            echo ("<script LANGUAGE='JavaScript'>window.alert('Data Berhasil Disimpan');window.location.href='/adminhelpdesk';</script>");

            // return redirect('/adminhelpdesk');
        }
    }
}
