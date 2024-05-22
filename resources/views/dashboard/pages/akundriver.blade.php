@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pegawai'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <a href="/dashboard/driver/tambahdriver" class="btn btn-primary">Tambah Akun</a>
                        <h4>Driver</h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Nomor Telepon</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xs font-weight-bolder">
                                            Daerah Operasional</th>
                                        
                                        <th class="text-secondary"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $d)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold">{{$d->name}}</p>
                                        </td>
                                        <td>
                                            <p>{{$d->phone_number}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{$d->daop}}</span>
                                        </td>
                                        
                                        <td class="align-middle">
                                            <a href="/dashboard/driver/editdriver/{{$d->id}}" class="btn btn-secondary "
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            
                                            <form action="/dashboard/driver/hapusdriver/{{$d->id}}" method="post" class="d-inline">
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
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h4>Gudang</h4>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">
                                            Nama</th>
                                        <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">
                                            Nomor Telepon</th>
                                        
                                        <th class="text-secondary"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gudang as $d)
                                    <tr>
                                        <td>
                                            <p class="font-weight-bold">{{$d->name}}</p>
                                        </td>
                                        <td>
                                            <p>{{$d->phone_number}}</p>
                                        </td>
                                        
                                        <td class="align-middle">
                                            <a href="/dashboard/driver/editgudang/{{$d->id}}" class="btn btn-secondary "
                                                data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            
                                            <form action="/dashboard/driver/hapusdriver/{{$d->id}}" method="post" class="d-inline">
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
        
        @include('dashboard.layouts.footers.auth.footer')
    </div>
@endsection
