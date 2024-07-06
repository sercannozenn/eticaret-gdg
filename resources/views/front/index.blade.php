@extends("layouts.front")

@section("title", "Anasayfa")
@push("css")
@endpush

@section("body")
    <section class="slider position-relative bg-orange mt-2">
        <div class="home-swiper swiper-container">
            <div class="swiper-wrapper">
                @foreach($sliders  as $slider)
                    <div class="swiper-slide">
                        <div class="slide">
                            <img src="{{ asset($slider->path) }}" alt="{{ $slider->name }}">
                        </div>
                        <div class="slider-title">
                            <div class="title-wrapper">
                                <h3 class="font-playfair fw-bold-600"
                                    style="color:{{ $slider->row_1_color }}, {{ $slider->row_1_css }}">
                                    {!! $slider->row_1_text !!}
                                </h3>
                                <h2 class="fw-bold-600 text-white"
                                    style="color:{{ $slider->row_2_color }}, {{ $slider->row_2_css }}">
                                    {!! $slider->row_2_text !!}
                                </h2>
                                <a href="{{ $slider->button_url }}"
                                   target="{{ $slider->button_target }}"
                                   class="btn btn-outline-dark text-center mt-3"
                                   style="color:{{ $slider->button_color }}, {{ $slider->button_css }}">
                                    {!! $slider->button_text !!}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <section class="feature-brands position-relative mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h3 class="fw-bold-600">Markalarımız</h3>

                    <div id="brandPrev" class="swiper-button-prev"></div>
                    <div id="brandNext" class="swiper-button-next"></div>
                </div>
                <div class="col-12">
                    <div class="brand-swiper mt-4">
                        <div class="swiper-wrapper">
                            @foreach($featuredBrands as $brand)
                                <div class="swiper-slide text-center">
                                    <div class="brand-slider">
                                        <a href="">
                                            <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}">
                                        </a>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-product-banner position-relative mt-5">
        <div class="col-12">
            <div class="banner position-relative">
                <img src="{{ asset('assets/images/home-banner1.jpeg') }}" class="web-banner" alt="">
            </div>
        </div>
    </section>

    <section class="feature-season-products position-relative my-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h3 class="fw-bold-600">Sezonun Öne Çıkanları</h3>

                    <div id="seasonPrev" class="swiper-button-prev"></div>
                    <div id="seasonNext" class="swiper-button-next"></div>
                </div>
                <div class="col-12">
                    <div class="season-product-swiper mt-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="assets/images/product1.jpeg" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrapper-product position-relative">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="{{ asset('assets/images/product1.jpeg') }}" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                Adidas
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">Niteball</h4>
                                        <div class="text-muted product-description">
                                            Unisex Sneaker
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            1.299,00 TL
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
    <script src="{{ asset('assets/js/home.js') }}"></script>
@endpush
