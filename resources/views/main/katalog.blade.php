@extends('layouts.index')
@section('container')
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
            Apa yang mau <span class="primary-color">kalian</span> hari ini?
        </h1>
        <p>
            Berbagai sayuran, lauk-pauk, bahan pokok dan perbumbuan semua ada disini.
            Silakan masukan jumlah yang akan kalian beli, jangan lupa di klil tombol keranjangnya ya.
        </p>

        <style>
            .food-item-wrap {
                display: grid;
                grid-template-columns: repeat(3, 1fr); 
                gap: 20px;

            }

            .food-item {
                /* background-color: #fff; */
                padding: 10px;
                border-radius: 5px;
                width: 300px;
            }

            @media (max-width: 768px) {
                .food-item-wrap {
                    grid-template-columns: repeat(2, 1fr); 
                }
            }

            @media (max-width: 480px) {
                .food-item-wrap {
                    grid-template-columns: 1fr;
                }
            }

        </style>
        <div class="food-item-wrap">
            @foreach ($products as $p)
            <form method="post" action="/katalog/checkout?action=add&code={{ $p->id }}" class="col-12">
                @csrf 
                <div class="food-item">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('storage/product').'/'.$p->gambar }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>{{ $p->nama_produk }}</h3>
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
                                        <input type="number" class="form-control" name="quantity" placeholder="Jumlah" style="width: 110px;" min="0" max="100">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="submit" class="btn btn-success" value="Keranjang" class="btnAddAction">
                                    </div>
                                </div>
                                @endif
                            </div>
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
