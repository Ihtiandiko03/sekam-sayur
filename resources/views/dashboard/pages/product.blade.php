@extends('dashboard.layouts.app')

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Product'])
    <div class="row mt-4 mx-4">
        {{-- <div class="col-12">
            <div class="alert alert-light" role="alert">
                This feature is available in <strong>Argon Dashboard 2 Pro Laravel</strong>. Check it
                <strong>
                    <a href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        here
                    </a>
                </strong>
            </div> --}}
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Products</h6>
                </div>
                <div class="card-body  pt-0 pb-2">
                    <a href="/gudang/product/tambahproduct" class="btn btn-success">Tambah Product</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Jumlah Stok</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($products as $p)
                              <tr class="text-center">
                                <th scope="row">1</th>
                                <td>{{ $p->nama_produk }}</td>
                                <td>{{ $p->tipe }}</td>
                                <td>{{ $p->jumlah_stok }}</td>
                                <td>
                                    <a href="/gudang/product/lihatproduct/{{$p->slug}}" class="btn btn-info ">
                                        Lihat
                                    </a>

                                    <a href="/gudang/product/editproduct/{{$p->slug}}" class="btn btn-secondary ">
                                        Edit
                                    </a>
                                    
                                    <form action="/gudang/product/hapusproduct/{{$p->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="is_active" value="0">
                                        <button class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                                      </form>
                                </td>
                              </tr>
                              @endforeach

                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
