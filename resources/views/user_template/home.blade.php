@extends('user_template.layouts.template')
@section('main-content')
    <!-- fashion section start -->

    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">
                <h1 class="fashion_taital">Összes termék</h1>
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($all_products as $product)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                    <p class="price_text">Ár <span
                                            style="color: #262626;">{{ $product->product_price }}</span></p>
                                    <div class="tshirt_img">{{ $product->product_price }}<img
                                            src="{{ asset($product->product_img) }}">
                                    </div>
                                    <div class="btn_main">
                                        <div class="buy_bt">
                                            <form action="{{ route('add_to_product_cart') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $product->price }}" name="price">
                                                <input type="hidden" value="1" name="quantity">
                                                <br>
                                                <input class="btn btn-warning" type="submit" value="Vásárlás">
                                            </form>
                                        </div>
                                        <div class="seemore_bt"><a
                                                href="{{ route('single_product', [$product->id, $product->slug]) }}">Mutass
                                                többet</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fashion section end -->

    <!-- electronic section start -->
    <div class="fashion_section">
        <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital">Elektronika</h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">Laptop</h4>
                                        <p class="price_text">Kezdő ár <span style="color: #262626;">$ 100</span>
                                        </p>
                                        <div class="electronic_img"><img src="{{ asset('home/images/laptop-img.png') }}">
                                        </div>
                                        <div class="btn_main">
                                            <input class="btn btn-warning" type="submit" value="Vásárlás">
                                            <div class="seemore_bt"><a href="#">Mutass többet</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">Mobil</h4>
                                        <p class="price_text">Kezdő ár <span style="color: #262626;">$ 100</span>
                                        </p>
                                        <div class="electronic_img"><img src="{{ asset('home/images/mobile-img.png') }}">
                                        </div>
                                        <div class="btn_main">
                                            <input class="btn btn-warning" type="submit" value="Vásárlás">
                                            <div class="seemore_bt"><a href="#">Mutass többet</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="box_main">
                                        <h4 class="shirt_text">Asztali számítógépek</h4>
                                        <p class="price_text">Kezdő ár <span style="color: #262626;">$ 100</span>
                                        </p>
                                        <div class="electronic_img"><img src="{{ asset('home/images/computer-img.png') }}">
                                        </div>
                                        <div class="btn_main">
                                            <input class="btn btn-warning" type="submit" value="Vásárlás">
                                            <div class="seemore_bt"><a href="#">Mutass többet</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- electronic section end -->
@endsection
