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

    <script type="text/javascript"
      src="{{ config('midtrans.snap_url') }}"
      data-client-key="{{ config('midtrans.client_key') }}"></script>

    <title>Sekam Sayur</title>
</head>
<body>

    

    <section class="align-items-center bg-img bg-img-fixed" id="food-menu-section"
        style="background-image: url({{ asset('assets/assets/katherine-chase-4MMK78S7eyk-unsplash.jpg') }});">
        <div class="container" >
            @if (session('success'))
            <div class="alert alert-success" style="margin: 10px 0;
            padding: 15px;
            border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif

            <div class="food-menu" style="padding-bottom: 200px;">
                <h1>
                    Check Out
                </h1>
                {{-- <p>
                    Berbagai sayuran, lauk-pauk, bahan pokok dan perbumbuan semua ada disini.
                    Silakan masukan jumlah yang akan kalian beli, jangan lupa di klil tombol keranjangnya ya.
                </p> --}}

                <div class="container">
                    {{-- <h1 class="my-3">Sekam Sayur</h1> --}}
            
                    <div class="card">
                        {{-- <img src="{{ asset('storage/product/musangking.jpg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Detail Pesanan</h5>
                            @foreach ($data as $d)    
                            <table class="mx-auto">
                                <tr>
                                    <td>Nama Produk</td>
                                    <td>: {{$d['nama_produk']}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah</td>
                                    <td>: {{$d['quantity']}}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>: Rp{{$d['harga'] * $d['quantity']}},00</td>
                                </tr>
                            </table>
                            @endforeach
                            <h5>Ongkos Kirim : Rp3.000,00</h5>
                            <h7>(Ongkos Kirim Berlaku untuk Seluruh Wilayah Kota Metro)</h7>
                            <h1>Total Bayar: Rp{{ $total }},00</h1>
                            <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>
                            <div id="snap-container"></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function (result) {
                    // alert("payment success!"); console.log(result);
                    window.location.href = '/invoice/{{$upload}}'
                },
                onPending: function (result) {
                    alert("wating your payment!"); console.log(result);
                },
                onError: function (result) {
                    alert("payment failed!"); console.log(result);
                },
                onClose: function () {
                    alert('you closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>
</html>