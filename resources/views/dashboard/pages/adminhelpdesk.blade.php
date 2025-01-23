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
                    <h6>Helpdesk</h6>
                    <a href="/helpdesk/pengajuanhelpdesk" class="btn btn-success">Tambah Data</a>
                </div>
                <div class="card-body  pt-0 pb-2">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nomor Tiket</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                              @foreach ($helpdesk as $h)
                              <tr class="text-center">
                                <th scope="row"><?=$i++?></th>
                                <td>{{ $h->no_tiket }}</td>
                                <td>{{ $h->status }}</td>
                                <td>
                                    @if ($h->status == 'Belum Dikerjakan')
                                    <a href="/adminhelpdesk/jawabhelpdesk/{{$h->no_tiket}}" class="btn btn-primary ">
                                        Jawab
                                    </a>
                                    @endif
                                    
                                    <a href="/helpdesk/lihatriwayat/{{$h->no_tiket}}" class="btn btn-success ">
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
