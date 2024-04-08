<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("body")</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/bootstrap-icons/font/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/swiper/swiper-bundle.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap" rel="stylesheet">
    @stack("css")
</head>
<body>

<div class="top-bar bg-black">
    <div class="container">
        <div class="login float-end ">
            <ul class="login-list">
                <li><a href="" class="text-white">GİRİŞ</a></li>
                <li><a href="" class="text-white">KAYIT</a></li>
                <li><a href="" class="text-white">SİPARİŞLERİM</a></li>
                <li><a href="" class="text-white">SEPETİM</a></li>
                <li class="dropdown user-basket position-relative">
                    <a href="javascript:void(0)" class="dropdown-toggle position-relative"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <i class="bi bi-cart zoom text-white fs-4"></i>
                        <span class="item-count bg-orange text-black">13</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="row overflow-custom">
                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="assets/images/shopping.webp" alt="" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Ürün Başlığı</h5>
                                                <p class="card-text">Fiyat: 10 TL</p>
                                                <p class="card-text">Adet: 1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="my-4">
                            </div>


                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="assets/images/shopping.webp" alt="" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Ürün Başlığı</h5>
                                                <p class="card-text">Fiyat: 10 TL</p>
                                                <p class="card-text">Adet: 1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="my-4">
                            </div>


                            <div class="col-12">
                                <div class="card border-0">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="assets/images/shopping.webp" alt="" class="img-fluid rounded-start">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Ürün Başlığı</h5>
                                                <p class="card-text">Fiyat: 10 TL</p>
                                                <p class="card-text">Adet: 1</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="my-4">
                            </div>
                        </div>
                        <div class="row total-price">
                            <div class="col-12">
                                <hr class="my-4">
                            </div>

                            <div class="col-12">
                                <h5 class="text-center">
                                    <span>Toplam:</span>
                                    <span>250.00 TL</span>
                                </h5>
                            </div>

                            <div class="col-12 basket-buttons">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="" class="btn btn-outline-warning w-100">Sepet</a>
                                    </div>

                                    <div class="col-6">
                                        <a href="" class="btn btn-outline-success w-100">Ödeme</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

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
                                        <div class="col navbar-column">
                                            <a href="product-list.html" class="dropdown-link">Adidas</a>
                                            <a href="#" class="dropdown-link">Nike</a>
                                            <a href="#" class="dropdown-link">Puma</a>
                                            <a href="#" class="dropdown-link">Skechers</a>
                                            <a href="#" class="dropdown-link">Lotto</a>
                                            <a href="#" class="dropdown-link">Huf</a>
                                            <a href="#" class="dropdown-link">Reebok</a>
                                            <a href="#" class="dropdown-link">Parafina</a>
                                            <a href="#" class="dropdown-link">Salomon</a>
                                        </div>
                                        <div class="col navbar-column">
                                            <a href="#" class="dropdown-link">Rains</a>
                                            <a href="#" class="dropdown-link">United 4</a>
                                            <a href="#" class="dropdown-link">Vans</a>
                                            <a href="#" class="dropdown-link">Veja</a>
                                            <a href="#" class="dropdown-link">Market</a>
                                            <a href="#" class="dropdown-link">Nautica</a>
                                            <a href="#" class="dropdown-link">Element</a>
                                            <a href="#" class="dropdown-link">Etnies</a>
                                            <a href="#" class="dropdown-link">Funko</a>
                                        </div>
                                        <div class="col navbar-column">
                                            <a href="#" class="dropdown-link">Columbia</a>
                                            <a href="#" class="dropdown-link">Brekenstock</a>
                                            <a href="#" class="dropdown-link">Casio</a>
                                            <a href="#" class="dropdown-link">Converse</a>
                                            <a href="#" class="dropdown-link">Crocs</a>
                                            <a href="#" class="dropdown-link">Jordan</a>
                                            <a href="#" class="dropdown-link">Primitive</a>
                                            <a href="#" class="dropdown-link">Timberland</a>
                                            <a href="#" class="dropdown-link">XD Design</a>
                                        </div>
                                        <div class="col navbar-column">
                                            <a href="#" class="dropdown-link">Columbia</a>
                                            <a href="#" class="dropdown-link">Brekenstock</a>
                                            <a href="#" class="dropdown-link">Casio</a>
                                            <a href="#" class="dropdown-link">Converse</a>
                                            <a href="#" class="dropdown-link">Crocs</a>
                                            <a href="#" class="dropdown-link">Jordan</a>
                                            <a href="#" class="dropdown-link">Primitive</a>
                                            <a href="#" class="dropdown-link">Timberland</a>
                                            <a href="#" class="dropdown-link">Tüm Markalar</a>
                                        </div>
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

@yield("body")

<footer class="position-relative">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h6 class="text-white">MARKALAR</h6>
                <ul class="link">
                    <li><a href="#.">Adidas</a></li>
                    <li><a href="#.">Nike</a></li>
                    <li><a href="#.">Puma</a></li>
                    <li><a href="#.">Lumberjack</a></li>
                    <li><a href="#.">Skechers</a></li>
                    <li><a href="#.">Newbalance</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white">KATEGORİLER</h6>
                <ul class="link">
                    <li><a href="#.">Sneaker</a></li>
                    <li><a href="#.">Basketbol Ayakkabısı</a></li>
                    <li><a href="#.">Futbol Ayakkabısı</a></li>
                    <li><a href="#.">Fitness Ayakkabısı</a></li>
                    <li><a href="#.">Bot</a></li>
                    <li><a href="#.">Terlik</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white">KURUMSAL</h6>
                <ul class="link">
                    <li><a href="#.">Hakkımızda</a></li>
                    <li><a href="#.">Kullanıcı Sözleşmesi</a></li>
                    <li><a href="#.">Gizlilik ve Çerez Politikası</a></li>
                    <li><a href="#.">Bilgi Toplumu Hizmetleri</a></li>
                    <li><a href="#.">Kişisel Verilerin Korunması</a></li>
                    <li><a href="#.">İletişim</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h6 class="text-white">ÖNEMLİ BİLGİLER</h6>
                <ul class="link">
                    <li><a href="#.">Sıkça Sorulan Sorular</a></li>
                    <li><a href="#.">Garanti & İade Sorgulama</a></li>
                    <li><a href="#.">Sipariş İşlemleri</a></li>
                    <li><a href="#.">Kargo & Teslimat</a></li>
                    <li><a href="#.">İade & Değişim</a></li>
                    <li><a href="#.">Mağazalar</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@stack("js")
</body>
</html>
