@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Driver'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Edit Driver</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="/dashboard/driver/simpanubahdriver" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                              <label for="name"  class="form-label">Nama Lengkap</label>
                              <input type="text" class="form-control" name="name" id="name" value="{{$driver->name}}">
                            </div>
                            <div class="col-md-6">
                              <label for="phone_number"  class="form-label">Nomor Telepon</label>
                              <input type="text" class="form-control" name="phone_number" id="phone_number" onkeypress="validateInput(event)" value="{{$driver->phone_number}}">
                            </div>
                            <div class="col-12">
                              <label for="email"  class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" id="email" value="{{$driver->email}}">
                            </div>
                            <div class="col-12">
                              <label for="alamat" class="form-label">Alamat</label>
                              <textarea class="form-control" name="alamat" id="alamat">{{$driver->alamat}}</textarea>
                            </div>
                            <div class="col-md-6">
                              <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                              <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" value="{{$driver->nomor_kendaraan}}">
                            </div>
                            <div class="col-md-6">
                              <label for="daop" class="form-label">Daerah Operasional</label>
                              <select id="daop" name="daop" class="form-select">
                                <option value="{{$driver->daop}}" selected>{{$driver->daop}}</option>
                                @foreach ($kecamatan as $k)
                                    <option value="{{ $k->nama_kecamatan }}">{{ $k->nama_kecamatan }}</option>
                                @endforeach
                              </select>
                            </div>

                            <input type="hidden" name="id" value="{{$driver->id}}">
                            
                            
                            
                            <div class="col-12">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('dashboard.layouts.footers.auth.footer')
    </div>

    <script>
        function validateInput(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
@endsection
