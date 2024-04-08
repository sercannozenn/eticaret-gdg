@extends("layouts.front")

@section("title", "Anasayfa")
@push("css")
@endpush

@section("body")
    <section class="slider position-relative bg-orange mt-2">
        <div class="home-swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slide">
                        <img src="{{ asset('assets/images/slide-bg-2-2.jpg') }}" alt="">
                    </div>
                    <div class="slider-title">
                        <div class="title-wrapper">
                            <h3 class="font-playfair fw-bold-600">SEPETTE %30 İNDİRİM</h3>
                            <h2 class="fw-bold-600 text-white">KAÇIRMA</h2>
                            <a href="" class="btn btn-outline-dark text-center mt-3">SATIN AL</a>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slide">
                        <img src="{{ asset('assets/images/slider3.webp') }}" alt="">
                    </div>
                </div>
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
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="">
                                        <img src="{{ asset('assets/images/brand1.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand2.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand3.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand7.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand5.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand6.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand6.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand6.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand6.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-slide text-center">
                                <div class="brand-slider">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset('assets/images/brand6.webp') }}" alt="">
                                    </a>
                                </div>
                            </div>
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
