@extends('layouts.index')
@section('container')
<section class="align-items-center bg-img bg-img-fixed" id="food-menu-section"
style="background-image: url({{ asset('assets/assets/katherine-chase-4MMK78S7eyk-unsplash.jpg') }});">
<div class="container">
    <div class="food-menu">
        <h1>
            What will <span class="primary-color">you</span> eat today?
        </h1>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque alias aliquam eveniet, iure
            praesentium dicta ex dolorum inventore itaque minus repudiandae, odio provident? Velit architecto
            natus expedita non? Odio, dolorum.
        </p>
        <div class="food-category">
            {{-- <div class="zoom play-on-scroll">
                <button class="active" data-food-type="all">
                    All food
                </button>
            </div>
            <div class="zoom play-on-scroll delay-2">
                <button data-food-type="salad">
                    Sayuran
                </button>
            </div>
            <div class="zoom play-on-scroll delay-4">
                <button data-food-type="lorem">
                    Buah-buahan
                </button>
            </div>
            <div class="zoom play-on-scroll delay-6">
                <button data-food-type="ipsum">
                    Bumbu Dapur
                </button>
            </div>
            <div class="zoom play-on-scroll delay-8">
                <button data-food-type="dolor">
                    Lainnya
                </button>
            </div> --}}
        </div>

        <div class="food-item-wrap all">

            @foreach ($products as $p)
            <form method="post" action="/katalog/checkout?action=add&code={{ $p->id }}" class="col-12">

                @csrf 
                <div class="food-item lorem-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('storage/product').'/'.$p->gambar }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    {{ $p->nama_produk }}
                                </h3>
                                <span>
                                    @if ($p->harga_per_biji != 0)
                                        Rp.{{ number_format($p->harga_per_biji ,2,",",".") }} per Biji
                                        <?php $harga = $p->harga_per_biji; ?>
                                    @elseif($p->harga_per_kg != 0)
                                        Rp.{{ number_format($p->harga_per_kg ,2,",",".") }} per Kg
                                        <?php $harga = $p->harga_per_kg; ?>
                                    @elseif($p->harga_per_ons != 0)
                                        Rp.{{ number_format($p->harga_per_ons ,2,",",".") }} per Ons
                                        <?php $harga = $p->harga_per_ons; ?>
                                    @elseif($p->harga_per_ikat != 0)
                                        Rp.{{ number_format($p->harga_per_ikat ,2,",",".") }} per Ikat
                                        <?php $harga = $p->harga_per_ikat; ?>
                                    @endif
                                </span>
                                <input type="hidden" name="code" value="{{ $p->id }}">
                                <input type="hidden" name="harga" value="{{ $harga }}">
                                <input type="hidden" name="action" value="Add">
                                @if (auth()->user())
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="number" class="form-control" name="quantity" placeholder="Jumlah" style="width: 110px;">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-success" value="Keranjang" class="btnAddAction">
                                    </div>
                                </div>
                                @endif
                            </div>

                            {{-- <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </form>

            @endforeach


            
        </div>
    </div>
</div>
</section>
@endsection