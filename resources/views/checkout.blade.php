<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script> --}}

    <script type="text/javascript"
      src="{{ config('midtrans.snap_url') }}"
      data-client-key="{{ config('midtrans.client_key') }}"></script>

    <title>Sekam Sayur</title>
</head>
<body>

    <div class="container">
        <h1 class="my-3">Sekam Sayur</h1>

        <div class="card" style="width: 50rem;">
            {{-- <img src="{{ asset('storage/product/musangking.jpg') }}" class="card-img-top" alt="..."> --}}
            <div class="card-body">
                <h5 class="card-title">Detail Pesanan</h5>
                @foreach ($data as $d)    
                <table>
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
                        <td>: {{$d['harga'] * $d['quantity']}}</td>
                    </tr>
                </table>
                @endforeach
                <h5>Ongkos Kirim : Rp3.000,00</h5>
                <h7>(Ongkos Kirim Berlaku untuk Seluruh Wilayah Kota Metro)</h7>
                <h1>Total Bayar: {{ $total }}</h1>
                <button class="btn btn-primary mt-3" id="pay-button">Bayar Sekarang</button>
                <div id="snap-container"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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