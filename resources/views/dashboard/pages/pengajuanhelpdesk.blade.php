@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pegawai'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Pengajuan Helpdesk</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="/helpdesk/simpanpengajuan" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" id="no_tiket" name="no_tiket" value="{{mt_rand(10000000000000, 99999999999999)}}">
                            <input type="hidden" id="status" name="status" value="Belum Dikerjakan">
                            <input type="hidden" id="nama" name="nama" value="{{ Auth::user()->name; }}">
                            <input type="hidden" id="email" name="email" value="{{ Auth::user()->email; }}">
                            <input type="hidden" id="created_at" name="created_at" value="{{ Auth::user()->email; }}">


                            <div class="col-12">
                              <label for="keterangan" class="form-label">Pertanyaan / Keluhan</label>
                              <textarea class="form-control" name="keterangan" id="keterangan" required></textarea>
                            </div>

                            <div class="col-12">
                              <label for="bukti_foto" class="form-label">File Pendukung</label>
                              <input type="file" class="form-control" name="bukti_foto" id="bukti_foto" accept="image/png, image/jpeg, image/jpg" onchange="previewFile()">
                              <div id="file-preview" class="mt-3"></div>
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
        function previewFile() {
            const preview = document.getElementById('file-preview');
            const file = document.getElementById('bukti_foto').files[0];
            const reader = new FileReader();
    
            reader.addEventListener("load", function () {
                // Clear previous content
                preview.innerHTML = '';
    
                // Create an element to display the image
                const img = document.createElement('img');
                img.src = reader.result;
                img.style.maxWidth = '40%'; // Adjust as needed
                img.style.height = 'auto'; // Adjust as needed
                preview.appendChild(img);
            }, false);
    
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
