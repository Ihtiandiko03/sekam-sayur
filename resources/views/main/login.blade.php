@extends('layouts.index')
@section('container')
    @if(session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
        </div>
    @endif
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
    style="background-image: url({{ asset('assets/img/ff2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-6 col-xs-12">
                <div class="slogan">
                    <h1 style="margin-bottom: 50px;">
                        Login
                    </h1>
                    <form action="/loginakun" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="HeksaDJ03">
                            <label for="email">Email</label>
                          </div>
                          <div class="form-floating">
                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Password">
                            <label for="password">Password</label>
                          </div>
                          <p class="mt-2">Belum punya akun? <a href="/register" class="text-success">Klik disini</a> untuk registrasi </p>
                          <button type="submit" class="btn btn-success">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection