@extends('layouts.index')
@section('container')
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
    style="background-image: url({{ asset('assets/img/ff2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-6 col-xs-12">
                <div class="slogan">
                    <h1 style="margin-bottom: 50px;">
                        Registrasi
                    </h1>
                    <form action="/daftarakun" method="POST">
                        @csrf
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Heksa Dananjaya">
                            <label for="name">Nama</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="heksa38a@gmail.com">
                            <label for="email">Email</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                            <label for="password">Password</label>
                          </div>
                          <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg" name="phone_number" onkeypress="validateInput(event)" id="phone_number" placeholder="082377102513">
                            <label for="phone_number">Nomor Telepon</label>
                          </div>

                          <p class="mt-2">Sudah punya akun? <a href="/login" class="text-success">Klik disini</a> untuk login </p>
                          <button type="submit" class="btn btn-success">Daftar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

    <script>
        function validateInput(evt) {
            var theEvent = evt || window.event;
            var key = theEvent.keyCode || theEvent.which;
            key = String.fromCharCode(key);
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
    </script>
@endsection