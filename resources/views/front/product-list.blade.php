@extends("layouts.front")

@section("title", "Ürün Listesi")

@push("css")
@endpush

@section("body")
    <main>
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row position-relative">
                            <div class="col-12 product-filter">
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Kategoriler</h3>
                                    <div class="filter-detail">
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Markalar</h3>
                                    <div class="filter-detail">
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Bot</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Cinsiyet</h3>
                                    <div class="filter-detail">
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Kadın</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Erkek</label>
                                        </div>
                                        <div class="form-check filter-item">
                                            <input type="checkbox" class="form-check-input" value="" id="f1">
                                            <label for="f1">Çocuk</label>
                                        </div>

                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Fiyat</h3>
                                    <div class="filter-detail">
                                        <div class="filter-item">
                                            <div class="row filter-price">
                                                <div class="col">
                                                    <input type="text" class="min-price form-control" placeholder="En az">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="max-price form-control" placeholder="En çok">
                                                </div>
                                                <div class="col-3">
                                                    <button type="submit">
                                                        <i class="bi bi-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row quick-filter px-4">
                            <div class="col-12 product-list-info">
                                <div class="row">
                                    <div class="col">
                                        <span class="text-decoration-underline product-count fw-bold-600">120 Ürün Listelendi</span>
                                    </div>
                                    <div class="col">
                                        <select name="sort" id="sortSelect" class="sortby float-end">
                                            <option value="1">Yeni Gelenler</option>
                                            <option value="2">Artan Fiyat</option>
                                            <option value="3">Azalan Fiyat</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row products mt-4 p-4">
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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
                            <div class="col-md-3 wrapper-product position-relative mb-5">
                                <div class="product-image position-relative">
                                    <a href="">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}" class="img-fluid" alt="Adidas">
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


                            <div class="col-md-12 d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="active"><a href="">1</a></li>
                                    <li><a href="">2</a></li>
                                    <li><a href="">3</a></li>
                                    <li><a href="">4</a></li>
                                    <li><a href="">5</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push("js")
@endpush
