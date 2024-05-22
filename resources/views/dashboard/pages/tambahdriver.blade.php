@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pegawai'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Tambah Akun Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="/dashboard/driver/simpandriver" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                              <label for="akun" class="form-label">Pilih Akun</label>
                              <select id="akun" name="akun" class="form-select" onchange="pilihAkun()">
                                <option selected>Pilih...</option>
                                <option value="Driver">Akun Driver</option>
                                <option value="Gudang">Akun Gudang</option>
                              </select>
                            </div>
                            <div class="col-md-6">
                              <label for="name"  class="form-label">Nama Lengkap</label>
                              <input type="text" class="form-control" name="name" id="name">
                            </div>
                            <div class="col-md-6">
                              <label for="phone_number"  class="form-label">Nomor Telepon</label>
                              <input type="text" class="form-control" name="phone_number" id="phone_number" onkeypress="validateInput(event)">
                            </div>
                            <div class="col-md-6">
                              <label for="email"  class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="col-md-6">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="col-12">
                              <label for="alamat" class="form-label">Alamat</label>
                              <textarea class="form-control" name="alamat" id="alamat"></textarea>
                            </div>

                            {{-- AKUN DRIVER --}}
                            <div id="akundriver" style="display: none;">
                              <div class="col-md-6">
                                <label for="nomor_kendaraan" class="form-label">Nomor Kendaraan</label>
                                <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan">
                              </div>
                              <div class="col-md-6">
                                <label for="daop" class="form-label">Daerah Operasional</label>
                                <select id="daop" name="daop" class="form-select">
                                  <option selected>Pilih...</option>
                                  @foreach ($kecamatan as $k)
                                      <option value="{{ $k->nama_kecamatan }}">{{ $k->nama_kecamatan }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-6">
                                  <label for="sim" class="form-label">SIM (Format jpeg,png,jpg)</label>
                                  <input class="form-control" type="file" id="sim" name="sim">
                              </div>
                              <div class="col-md-6">
                                  <label for="stnk" class="form-label">STNK (Format jpeg,png,jpg)</label>
                                  <input class="form-control" type="file" id="stnk" name="stnk">
                              </div>
                            </div>
                            
                            
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

        function pilihAkun(){
          var akun = document.getElementById("akun").value;

          // alert(akun);

          if(akun === 'Driver'){
            var x = document.getElementById("akundriver");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

          } 
          else{
            var x = document.getElementById("akundriver");
            x.style.display = "none";
          }
        }
    </script>
@endsection
