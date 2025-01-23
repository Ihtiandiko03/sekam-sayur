<aside class="sidenav d-none d-md-block bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=""
            target="_blank">
            <img src="{!! asset('argon/img/logo-ct-dark.png') !!}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Sekam Sayur</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a @if($link == "Dashboard") class="nav-link active" @else class="nav-link" @endif href="/dashboard">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @if ((auth()->user()->role) == 1)
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Admin</h6>
            </li>
            <li class="nav-item">
                <a @if($link == "Driver") class="nav-link active" @else class="nav-link" @endif href="/dashboard/akundriver">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Akun Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a @if($link == "Pesanan") class="nav-link active" @else class="nav-link" @endif href="/dashboard/pesanan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pesanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a @if($link == "Helpdesk") class="nav-link active" @else class="nav-link" @endif href="/adminhelpdesk">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-send text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Helpdesk</span>
                </a>
            </li>
            @elseif ((auth()->user()->role) == 2)
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="ni ni-single-02" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">User</h6>
            </li>
            <li class="nav-item">
                <a @if($link == "Riwayat") class="nav-link active" @else class="nav-link" @endif href="/riwayat">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Riwayat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/katalog">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Katalog</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/helpdesk">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-send text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Helpdesk</span>
                </a>
            </li>
            @elseif ((auth()->user()->role) == 3)
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="ni ni-single-02" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Driver</h6>
            </li>
            <li class="nav-item">
                <a @if($link == "Pengiriman") class="nav-link active" @else class="nav-link" @endif href="/driver">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pengiriman</span>
                </a>
            </li>
            @elseif ((auth()->user()->role) == 4)
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="ni ni-single-02" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Gudang</h6>
            </li>
            <li class="nav-item">
                <a @if($link == "Product") class="nav-link active" @else class="nav-link" @endif href="/gudang/product">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Product</span>
                </a>
            </li>
            <li class="nav-item">
                <a @if($link == "Pesanan") class="nav-link active" @else class="nav-link" @endif href="/gudang/pesanan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-basket text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pesanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a @if($link == "Cari Driver") class="nav-link active" @else class="nav-link" @endif href="/dashboard/pesanan">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-delivery-fast text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Cari Driver</span>
                </a>
            </li>

            @endif

            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-user-run text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
        
        {{-- <a href="/docs/bootstrap/overview/argon-dashboard/index.html" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank" type="button">Upgrade to PRO</a> --}}
    </div>
</aside>
