@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Product'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Tambah Product</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="/gudang/product/simpanproduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="nama_produk"  class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                            </div>

                            <div class="col-md-6">
                              <label for="tipe" class="form-label">Tipe</label>
                              <select id="tipe" name="tipe" class="form-select">
                                <option selected>Pilih...</option>
                                <option value="Sayuran">Sayuran</option>
                                <option value="Buah">Buah-Buahan</option>
                                <option value="Bumbu Masak">Bumbu Masak</option>
                              </select>
                            </div>
                            
                            <div class="col-12">
                                <label for="jumlah_stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok">
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="gambar" name="gambar">
                            </div>

                            <div class="col-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" name="deskripsi"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="harga_per_ikat" class="form-label">Harga Per Ikat (Boleh Kosong)</label>
                                <input type="number" class="form-control" name="harga_per_ikat" id="harga_per_ikat">
                            </div>
                            <div class="col-md-6">
                                <label for="harga_per_kg" class="form-label">Harga Per Kilogram (Boleh Kosong)</label>
                                <input type="number" class="form-control" name="harga_per_kg" id="harga_per_kg">
                            </div>
                            <div class="col-md-6">
                                <label for="harga_per_ons" class="form-label">Harga Per Ons (Boleh Kosong)</label>
                                <input type="number" class="form-control" name="harga_per_ons" id="harga_per_ons">
                            </div>
                            <div class="col-md-6">
                                <label for="harga_per_biji" class="form-label">Harga Per Biji (Boleh Kosong)</label>
                                <input type="number" class="form-control" name="harga_per_biji" id="harga_per_biji">
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

    
@endsection
