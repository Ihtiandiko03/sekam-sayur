

@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pegawai'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>RIWAYAT HELPDESK</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                              <label for="keterangan" class="form-label">Pertanyaan / Keluhan</label>
                              <textarea class="form-control" name="keterangan" id="keterangan" readonly>{{$helpdesk->keterangan}}</textarea>
                            </div>

                            <div class="col-12">
                              <label for="bukti_foto" class="form-label">Bukti Foto</label>
                              <br>
                              <img src="{{ asset('storage/foto_helpdesk').'/'.$helpdesk->bukti_foto }}" width="40%">
                            </div>

                            <div class="col-12">
                                <label for="tanggapan" class="form-label">Respon Admin Metro Sayur</label>
                                <textarea class="form-control" name="tanggapan" id="tanggapan" readonly>{{$helpdesk->tanggapan}}</textarea>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @include('dashboard.layouts.footers.auth.footer')
    </div>
@endsection