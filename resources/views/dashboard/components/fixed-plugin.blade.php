<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-bars py-2"></i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Menu</h5>
                <p></p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- Sidebar Backgrounds -->
            <div>
                {{-- <h6 class="mb-0">Sidebar Colors</h6> --}}
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
                        {{-- <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Admin</h6> --}}
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
                    @elseif ((auth()->user()->role) == 2)
                    <li class="nav-item mt-3 d-flex align-items-center">
                        <div class="ps-4">
                            
                        </div>
                        {{-- <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">User</h6> --}}
                    </li>
                    <li class="nav-item">
                        <a @if($link == "Riwayat") class="nav-link active" @else class="nav-link" @endif href="/riwayat">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-bag-17 text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Riwayat</span>
                        </a>
                    </li>
                    @elseif ((auth()->user()->role) == 3)
                    <li class="nav-item mt-3 d-flex align-items-center">
                        <div class="ps-4">
                            
                        </div>
                        {{-- <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Driver</h6> --}}
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
                            
                        </div>
                        {{-- <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Gudang</h6> --}}
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
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/katalog">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-cart text-dark text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Katalog</span>
                        </a>
                    </li>
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
            {{-- <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning"
                        onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger"
                        onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                    onclick="sidebarType(this)">White</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                    onclick="sidebarType(this)">Dark</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                        onclick="darkMode(this)">
                </div>
            </div> --}}
            
        </div>
    </div>
</div>
