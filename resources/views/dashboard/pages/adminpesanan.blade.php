@extends('dashboard.layouts.app')

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pesanan'])
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
                    <h6>Pesanan</h6>
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
                              @foreach ($pesanan as $d)
                              <tr class="text-center">
                                <th scope="row"><?=$i++?></th>
                                <td>{{ $d->nomor_resi }}</td>
                                <td>{{ $d->status }}</td>
                                <td>
                                    <a href="/dashboard/pesanan/lihatpesanan/{{$d->nomor_resi}}" class="btn btn-success ">
                                        Lihat
                                    </a>
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
