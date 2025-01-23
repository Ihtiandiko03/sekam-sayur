@extends('dashboard.layouts.app')

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pengiriman'])
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
                    <h6>Pengiriman Masuk</h6>
                </div>
                <div class="card-body  pt-0 pb-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nomor Resi</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                              @foreach ($pengiriman as $p)
                              <tr class="text-center">
                                <th scope="row"><?=$i++?></th>
                                <td>{{ $p->nomor_resi }}</td>
                                <td>{{ $p->status }}</td>
                                <td>
                                    <a href="/driver/lihatpengiriman/{{$p->nomor_resi}}" class="btn btn-success ">
                                        Lihat
                                    </a>
                                    @if($p->status == 'Menunggu Driver mengirim barang')
                                    <form action="/driver/konfirmasipenjemputan" method="post" class="d-inline">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="id" value="{{$p->nomor_resi}}">
                                        <button class="btn btn-danger">Jemput Barang</button>
                                      </form>
                                    @endif
                                    @if(
                                        $p->status != 'Menunggu Driver mengirim barang' && 
                                        $p->status != 'Pesanan berhasil dibuat' && 
                                        $p->status != 'Pesanan Siap Diantarkan. Sedang Mencari Driver' &&
                                        $p->status != 'Barang Sudah Diterima'

                                    )
                                        <button type="button" class="btn bg-gradient-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Konfirmasi Penerimaan Barang
                                        </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Serah Terima Barang</h1>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="/driver/konfirmasipenerimaanbarang" enctype="multipart/form-data">
                                                        @method('put')
                                                        @csrf
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="nama_penerima_barang" class="form-label">Nama Penerima Barang</label>
                                                                    <input type="text" class="form-control" name="nama_penerima_barang" id="nama_penerima_barang">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="foto_penerimaan_barang" class="form-label">Foto Penerimaan Barang</label>
                                                                    <input type="file" class="form-control" name="foto_penerimaan_barang" id="foto_penerimaan_barang">
                                                                </div>
                                                                <input type="hidden" name="nomor_resi" value="{{$p->nomor_resi}}">
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>
                                            </div>
                                    @endif
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
