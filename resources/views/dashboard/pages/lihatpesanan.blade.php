@extends('dashboard.layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('dashboard.layouts.navbars.auth.topnav', ['title' => 'Pesanan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg">
                <div class="row">
                    {{-- <div class="col-xl-6 mb-xl-0 mb-4">
                        <div class="card bg-transparent shadow-xl">
                            <div class="overflow-hidden position-relative border-radius-xl"
                                style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 p-3">
                                    <i class="fas fa-wifi text-white p-2"></i>
                                    <h5 class="text-white mt-4 mb-5 pb-2">
                                        4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                                    <div class="d-flex">
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                                                <h6 class="text-white mb-0">Jack Peterson</h6>
                                            </div>
                                            <div>
                                                <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                                                <h6 class="text-white mb-0">11/22</h6>
                                            </div>
                                        </div>
                                        <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                                            <img class="w-60 mt-2" src="/img/logos/mastercard.png" alt="logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fas fa-landmark opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Salary</h6>
                                        <span class="text-xs">Belong Interactive</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">+$2000</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-0 mt-4">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                            <i class="fab fa-paypal opacity-10"></i>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <h6 class="text-center mb-0">Paypal</h6>
                                        <span class="text-xs">Freelance Payment</span>
                                        <hr class="horizontal dark my-3">
                                        <h5 class="mb-0">$455.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-md-12 mb-lg-0 mb-4">
                        <div class="card mt-4">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-6 d-flex align-items-center">
                                        <h6 class="mb-0">Informasi Pesanan</h6>
                                    </div>

                                    @if ((auth()->user()->role) == 4)
                                    <div class="col-6 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="/gudang/pesanan/konfirmasipesanan/{{$pesanan[0]->nomor_resi}}" ><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Konfirmasi Pesanan Siap Diantarkan</a>
                                    </div>
                                    @elseif ((auth()->user()->role) == 1)
                                    <div class="col-6 text-end">
                                        {{-- <a class="btn bg-gradient-dark mb-0" href="/dashboard/pesanan/konfirmasipesanan/{{$pesanan[0]->nomor_resi}}" ><i
                                            class="fas fa-plus"></i>&nbsp;&nbsp;Pilih Driver Pengiriman</a> --}}
                                        <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Pilih Driver Pengiriman
                                            </button>
                                              
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Driver Pengiriman</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="/dashboard/pesanan/pilihdriver">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="nama_driver" class="form-label">Pilih Driver</label>
                                                            <select class="form-select" name="nama_driver" id="nama_driver">
                                                                <option selected>Pilih...</option>
                                                                @foreach ($drivers as $d)
                                                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <input type="hidden" name="nomor_resi" value="{{ $pesanan[0]->nomor_resi }}">
                                                        </div>
                                                    </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
                                    
                                    
                                    @elseif ((auth()->user()->role) == 2)
                                    <div class="col-6 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="#" >{{$tracking->status}}</a>
                                        <a class="btn bg-gradient-dark mb-0" href="#" >Last updated : {{$tracking->updated_at}}</a>
                                        @if($tracking->status === 'Barang Sudah Diterima')
                                            <a class="btn bg-gradient-dark mt-2" href="#" >Diterima Oleh : {{$tracking->nama_penerima_barang}}</a>
                                            <a class="btn bg-gradient-dark mt-2" target="_blank" href="/storage/penerimaan/{{$tracking->foto_penerimaan_barang}}" >Bukti Serah Terima</a>
                                        @endif
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <h6 class="mb-0">{{ $pesanan[0]->nama_pemesan }}</h6>
                                            <i class=" ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">Nama</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <h6 class="mb-0">{{ $pesanan[0]->nomor_telepon }}</h6>
                                            <i class=" ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">No HP</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <h6 class="mb-0">{{ $pesanan[0]->kecamatan }}</h6>
                                            <i class=" ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">Kecamatan</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <h6 class="mb-0">{{ $pesanan[0]->kota }}</h6>
                                            <i class=" ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">Kota</i>
                                        </div>
                                    </div>
                                    <div class="col-md mt-4">
                                        <div
                                            class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                                            <h6 class="mb-0">{{ $pesanan[0]->alamat_pemesan }}</h6>
                                            <i class=" ms-auto text-dark cursor-pointer"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">Alamat</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Invoices</h6>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">March, 01, 2020</h6>
                                    <span class="text-xs">#MS-415646</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $180
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">February, 10, 2021</h6>
                                    <span class="text-xs">#RV-126749</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $250
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">April, 05, 2020</h6>
                                    <span class="text-xs">#FB-212562</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $560
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">June, 25, 2019</h6>
                                    <span class="text-xs">#QW-103578</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $120
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="text-dark mb-1 font-weight-bold text-sm">March, 01, 2019</h6>
                                    <span class="text-xs">#AR-803481</span>
                                </div>
                                <div class="d-flex align-items-center text-sm">
                                    $300
                                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="fas fa-file-pdf text-lg me-1"></i> PDF</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col-md mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Rincian Pesanan</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @foreach ($pesanan as $p)
                                
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <img class="w-10 me-3 mb-0" src="/storage/product/{{$p->gambar}}" alt="logo">
                                    <h6 class="mb-3 text-sm">{{$p->nama_produk}}</h6>
                                    <span class="mb-2 text-xs">Jumlah Pesanan: <span
                                            class="text-dark font-weight-bold ms-sm-2">
                                            
                                            @if ($p->harga_per_biji != 0)
                                                {{$p->jumlah_pesanan}} Biji
                                            @elseif($p->harga_per_kg != 0)
                                                {{$p->jumlah_pesanan}} Kg
                                            @elseif($p->harga_per_ons != 0)
                                                {{$p->jumlah_pesanan}} Ons
                                            @elseif($p->harga_per_ikat != 0)
                                                {{$p->jumlah_pesanan}} Ikat
                                            @endif
                                    </span></span>
                                    <span class="mb-2 text-xs">Harga Awal: <span
                                            class="text-dark ms-sm-2 font-weight-bold">
                                            @if ($p->harga_per_biji != 0)
                                                Rp.{{ number_format($p->harga_per_biji ,2,",",".") }} per Biji
                                            @elseif($p->harga_per_kg != 0)
                                                Rp.{{ number_format($p->harga_per_kg ,2,",",".") }} per Kg
                                            @elseif($p->harga_per_ons != 0)
                                                Rp.{{ number_format($p->harga_per_ons ,2,",",".") }} per Ons
                                            @elseif($p->harga_per_ikat != 0)
                                                Rp.{{ number_format($p->harga_per_ikat ,2,",",".") }} per Ikat
                                            @endif
                                    </span></span>
                                    <span class="text-xs">Harga: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Rp.{{ number_format($p->harga ,2,",",".") }}</span></span>
                                </div>
                                
                            </li>

                            @endforeach

                            {{-- <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Lucas Harper</h6>
                                    <span class="mb-2 text-xs">Company Name: <span
                                            class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span
                                            class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                                    <span class="text-xs">VAT Number: <span
                                            class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Ethan James</h6>
                                    <span class="mb-2 text-xs">Company Name: <span
                                            class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                                    <span class="mb-2 text-xs">Email Address: <span
                                            class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                                    <span class="text-xs">VAT Number: <span
                                            class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0">Your Transaction's</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>23 - 30 March 2020</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-down"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                                        <span class="text-xs">27 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    - $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                        <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,000
                                </div>
                            </li>
                        </ul>
                        <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                                        <span class="text-xs">26 March 2020, at 13:45 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 750
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                                        <span class="text-xs">26 March 2020, at 12:30 PM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 1,000
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-arrow-up"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                                        <span class="text-xs">26 March 2020, at 08:30 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    + $ 2,500
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="fas fa-exclamation"></i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                                        <span class="text-xs">26 March 2020, at 05:00 AM</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                                    Pending
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>
        @include('dashboard.layouts.footers.auth.footer')
    </div>
@endsection
