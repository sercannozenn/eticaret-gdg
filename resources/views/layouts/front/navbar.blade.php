<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="assets/images/logo.png" alt="Logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item active dropdown">
                        <a class="nav-link active dropdown-toggle" aria-current="page" href="javascript:void(0)"
                           data-bs-toggle="dropdown"
                           role="button">
                            MARKALAR
                        </a>
                        <div class="dropdown-menu">
                            <div class="row">
                                <div class="col-md-9 nav-brands">
                                    <h4 class="mb-4">Tüm Markalar</h4>
                                    <div class="row">
                                        @foreach($brandsColumns->chunk(9) as $brands)
                                            <div class="col navbar-column">
                                            @foreach($brands as $brand)
                                                <a href="product-list.html" class="dropdown-link">{{ $brand->name }}</a>
                                            @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <h4 class="mb-4">Tredler</h4>
                                    <div class="row">
                                        <div class="col">
                                            <div class="nav-brand-swiper swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <a href="">
                                                            <img src="assets/images/product2.webp" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="">
                                                            <img src="assets/images/product3.jpeg" class="img-fluid" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="swiper-slide">
                                                        <a href="">
                                                            <img src="assets/images/product4.jpeg" class="img-fluid" alt="">
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="#">KADIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MARKALAR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ÇOCUK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">YENİ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">İNDİRİMLER</a>
                    </li>

                    <!--                    <li class="nav-item dropdown">-->
                    <!--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                    <!--                            Dropdown-->
                    <!--                        </a>-->
                    <!--                        <ul class="dropdown-menu">-->
                    <!--                            <li><a class="dropdown-item" href="#">Action</a></li>-->
                    <!--                            <li><a class="dropdown-item" href="#">Another action</a></li>-->
                    <!--                            <li><hr class="dropdown-divider"></li>-->
                    <!--                            <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->

                </ul>
            </div>
            <div class="nav-right">
                <a href="javascript:void(0)" class="search-open">
                    <i class="bi bi-search zoom"></i>
                </a>
                <div class="search-inside bg-orange">
                    <i class="bi bi-x search-close"></i>
                    <div class="search-overlay"></div>
                    <div class="position-center-center">
                        <div class="search animate__animated animate__backInUp">
                            <form action="">
                                <input type="search" placeholder="Arama">
                                <button type="submit"><i class="bi bi-check-circle"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
