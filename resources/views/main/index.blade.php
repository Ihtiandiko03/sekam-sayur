@extends('layouts.index')
@section('container')
    
<!-- SECTION HOME -->
    <section id="home" class="fullheight align-items-center bg-img bg-img-fixed"
    style="background-image: url({{ asset('assets/img/ff2.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-6 col-xs-12">
                <div class="slogan">
                    <h1 class="left-to-right play-on-scroll">
                        MetroSayur
                    </h1>
                    <p class="left-to-right play-on-scroll delay-2">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae eveniet ullam perferendis
                        eos, nobis corrupti similique fuga ipsa minus at eius ipsam expedita quam aliquam
                        perspiciatis voluptate qui dolore soluta.
                    </p>
                    <div class="left-to-right play-on-scroll delay-4">
                        <button>
                            Order now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- END SECTION HOME -->
    <!-- SECION ABOUT -->
    <section class="about fullheight align-items-center" id="about">
    <div class="container">
        <div class="row">
            <div class="col-7 h-xs">
                <img src="{{ asset('assets/assets/dan-gold-4_jhDO54BYg-unsplash.jpg') }}" alt=""
                    class="fullwidth left-to-right play-on-scroll">
            </div>
            <div class="col-5 col-xs-12 align-items-center">
                <div class="about-slogan right-to-left play-on-scroll">
                    <h3>
                        <span class="primary-color">We</span> create <span class="primary-color">delicious</span>
                        memories for <span class="primary-color">you</span>
                    </h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio natus placeat et eos,
                        dignissimos voluptatem tempora necessitatibus doloribus! Eum qui doloribus odio dolor
                        tenetur nihil impedit vero magni, distinctio soluta!
                    </p>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- END SECION ABOUT -->
    <!-- FOOD MENU SECTION -->
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
                <div class="zoom play-on-scroll">
                    <button class="active" data-food-type="all">
                        All food
                    </button>
                </div>
                <div class="zoom play-on-scroll delay-2">
                    <button data-food-type="salad">
                        Salad
                    </button>
                </div>
                <div class="zoom play-on-scroll delay-4">
                    <button data-food-type="lorem">
                        Lorem
                    </button>
                </div>
                <div class="zoom play-on-scroll delay-6">
                    <button data-food-type="ipsum">
                        Ipsum
                    </button>
                </div>
                <div class="zoom play-on-scroll delay-8">
                    <button data-food-type="dolor">
                        Dolor
                    </button>
                </div>
            </div>

            <div class="food-item-wrap all">
                <div class="food-item salad-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url({{ asset('assets/assets/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }});"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class="bx bx-cart-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item lorem-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/sina-piryae-bBzjWthTqb8-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item ipsum-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/jonathan-farber-OCNqOLeCwOc-unsplash.jpg') }}');">
                            </div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item lorem-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/sina-piryae-bBzjWthTqb8-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item dolor-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/carly-jayne-Lv174o7fn7Y-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item salad-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item lorem-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/sina-piryae-bBzjWthTqb8-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="food-item dolor-type">
                    <div class="item-wrap bottom-up play-on-scroll">
                        <div class="item-img">
                            <div class="img-holder bg-img"
                                style="background-image: url('{{ asset('assets/assets/carly-jayne-Lv174o7fn7Y-unsplash.jpg') }}');"></div>
                        </div>
                        <div class="item-info">
                            <div>
                                <h3>
                                    Lorem ipsum
                                </h3>
                                <span>
                                    120$
                                </span>
                            </div>
                            <div class="cart-btn">
                                <i class='bx bx-cart-alt'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- END FOOD MENU SECTION -->
    <!-- TESTIMONIAL SECTION -->
    <section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-4 col-xs-12">
                <div class="review-wrap zoom play-on-scroll delay-2">
                    <div class="review-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                            molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                            dolores ratione voluptatibus quidem explicabo.
                        </p>
                        <div class="review-img bg-img"
                            style="background-image: url({{ asset('assets/assets/close-up-portrait-cute-young-woman-holding-textbook-colored-pencils-posing-studio-isolated-pink_176532-9674.jpg') }});">
                        </div>
                    </div>
                    <div class="review-info">
                        <h3>
                            Lorem Ipsum Dolor
                        </h3>
                        <div class="rating">
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                            <i class="bx bxs-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xs-12">
                <div class="zoom play-on-scroll">
                    <div class="review-wrap active">
                        <div class="review-content">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                                molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt
                                corrupti
                                dolores ratione voluptatibus quidem explicabo.
                            </p>
                            <div class="review-img bg-img"
                                style="background-image: url({{ asset('assets/assets/michael-dam-mEZ3PoFGs_k-unsplash.jpg') }});">
                            </div>
                        </div>
                        <div class="review-info">
                            <h3>
                                Lorem Ipsum Dolor
                            </h3>
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 col-xs-12">
                <div class="review-wrap zoom play-on-scroll delay-4">
                    <div class="review-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, labore nisi non
                            molestias, minus laboriosam nostrum impedit iure facilis odio unde quia ad sunt corrupti
                            dolores ratione voluptatibus quidem explicabo.
                        </p>
                        <div class="review-img bg-img"
                            style="background-image: url({{ asset('assets/assets/portrait-happy-young-man_171337-21716.jpg') }});">
                        </div>
                    </div>
                    <div class="review-info">
                        <h3>
                            Lorem Ipsum Dolor
                        </h3>
                        <div class="rating">
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- END TESTIMONIAL SECTION -->
@endsection
