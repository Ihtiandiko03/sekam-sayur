<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> METRO SAYUR </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    @include('partials.navbar')
        @yield('container')
    

    <!-- FOOTER SECTION -->
    <section class="footer bg-img" style="background-image: url({{ asset('assets/assets/nordwood-themes-pYWrdKO5ksI-unsplash.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-6 col-xs-12">
                    <h1>
                        Metro Sayur
                    </h1>
                    <br>
                    <p>Merupakan website dibawah naungan Sentra Kreatif Kota Metro
                        yang bergerak pada bidang penjualan sayuran dan makanan pokok
                        yang bekerja sama dengan dinas perdagangan Kota Metro 
                        Informasi dan Layanan
                        Dapat menghubungi No Admin : 0895369032502
                        
                    </p>
                    <br>
                    
                </div>
                {{-- <div class="col-2 col-xs-12">
                    <h1>
                        About us
                    </h1>
                    <br>
                    <p>
                        <a href="#">
                            Chefs
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            Menu
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            Testimonials
                        </a>
                    </p>
                    <p>
                        <a href="#">
                            Lorem ipsum
                        </a>
                    </p>
                </div>
                <div class="col-4 col-xs-12"> --}}
                    {{-- <h1>
                        Informasi dan Layanan
                    </h1>
                    <br>
                    <p> Dapat menghubungi No Admin :
                        0895369032502
                    </p> --}}
                    {{-- <div class="input-group">
                        <input type="text" placeholder="Enter your email">
                        <button>
                            Subscribe
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- END FOOTER SECTION -->

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
