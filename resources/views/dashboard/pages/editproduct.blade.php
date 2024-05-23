@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Product'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4 class="text-center">{{$product->nama_produk}}</h4>
                    </div>
                    <div class="d-flex justify-content-center">
                        <img src="{!! asset('storage/product').'/'.$product->gambar !!}" class="img-fluid rounded mx-auto d-block" alt="{{ $product->gambar }}" style="max-width: 50%;">
                    </div>
                    <div class="card-body" >
                        <form class="row g-3" action="/gudang/product/simpaneditproduct" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="nama_produk"  class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $product->nama_produk }}" >
                            </div>
                            
                            <div class="col-md-6">
                                <label for="tipe" class="form-label">Tipe</label>
                                <select id="tipe" name="tipe" class="form-select">
                                  <option value="{{ $product->tipe }}" selected>{{ $product->tipe }}</option>
                                  <option>Pilih...</option>
                                  <option value="Sayuran">Sayuran</option>
                                  <option value="Buah">Buah-Buahan</option>
                                  <option value="Bumbu Masak">Bumbu Masak</option>
                                </select>
                              </div>

                            <div class="col-12">
                                <label for="jumlah_stok" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok" value="{{ $product->jumlah_stok }}" >
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input class="form-control" type="file" id="gambar" name="gambar">
                            </div>

                            <div class="col-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="deskripsi" name="deskripsi" >{{ $product->deskripsi }}</textarea>
                            </div>

                            
                            <div class="col-md-6">
                                <label for="harga_per_biji" class="form-label">Harga Per Biji</label>
                                <input type="number" class="form-control" name="harga_per_biji" id="harga_per_biji" value="{{ $product->harga_per_biji }}" >
                            </div>
                            
                            <div class="col-md-6">
                                <label for="harga_per_ikat" class="form-label">Harga Per Ikat</label>
                                <input type="number" class="form-control" name="harga_per_ikat" id="harga_per_ikat" value="{{ $product->harga_per_ikat }}" >
                            </div>
                            
                            <div class="col-md-6">
                                <label for="harga_per_kg" class="form-label">Harga Per Kilogram</label>
                                <input type="number" class="form-control" name="harga_per_kg" id="harga_per_kg" value="{{ $product->harga_per_kg }}" >
                            </div>
                            
                            <div class="col-md-6">
                                <label for="harga_per_ons" class="form-label">Harga Per Ons</label>
                                <input type="number" class="form-control" name="harga_per_ons" id="harga_per_ons" value="{{ $product->harga_per_ons }}" >
                            </div>

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            
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
