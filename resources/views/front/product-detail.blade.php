@extends("layouts.front")

@section("title", ucfirst($product->name))

@push("css")
@endpush

@section("body")
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-image-wrapper position-relative">
                        <div class="swiper-container big-slider">
                            <div class="swiper-wrapper">
                                @foreach($product->variantImages as $image)
                                    <div class="swiper-slide big-image">
                                        <div class="swiper-zoom-container">
                                            <img src="{{ asset($image->path) }}"/>
                                        </div>
                                    </div>

                                @endforeach
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div thumbsSlider="" class="swiper-container thumb-sliders swiper-thumbs">
                            <div class="swiper-wrapper">
                                @foreach($product->variantImages as $image)

                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset($image->path) }}"/>
                                </div>
                                @endforeach
                            </div>
                            <div class="thumb-sliders-buttons text-center">
                            <span class="thumb-prev me-4">
                                <i class="bi bi-arrow-left"></i>
                            </span>
                                <span class="thumb-next">
                                <i class="bi bi-arrow-right"></i>
                            </span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 product-detail position-relative">
                    <h4 class="fw-bold-600">{{ $product->name }}</h4>
                    <div class="price text-orange fw-bold-600">{{ number_format($product->final_price, 2) }} TL</div>
                    <hr class="mt-5">
                    <h6>{{ $product->productsMain->category->name }}</h6>
                    <hr>
                    <h6>{{ $product->productsMain->brand->name }}</h6>
                    <hr>
                    <p class="product-short-description font-playfair">
                        {{ $product->productsMain->short_description }}
                    </p>
                    <div class="shopping">
                        <div class="row">
                            <div class="col-md-1 text-center">
                                <i class="bi bi-heart text-orange"></i>
                            </div>
                            <div class="col-md-5">
                                <div class="piece-wrapper">
                                    <div class="input-group">
                                        <span class="piece-decrease"> - </span>
                                        <input type="text" class="piece" value="0" disabled>
                                        <span class="piece-increase"> + </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="input-group">
                                    <select id="footSize" class="form-control text-center">
                                        <option disabled selected>Beden</option>
                                        @foreach($product->sizeStock as $size)
                                            <option value="{{ $size->id }}">{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <hr class="my-3">
                            <div class="col-md-12">
                                <a href="javascript:void(0)" data-product-id="{{ $product->id }}" class="btn bg-orange add-to-card w-100 text-white">Sepete Ekle</a>
                            </div>
                        </div>
                    </div>
                    <div class="discount-rate">
                        %20
                        <span>İndirim</span>
                    </div>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-expanded="false"
                                        aria-controls="collapseOne">
                                    Ürün Hakkında
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $product->productsMain->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Teslimat
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid aspernatur atque
                                    consequuntur dicta, distinctio doloremque ducimus est harum illo in itaque iure magnam
                                    mollitia, odio odit officiis quam quasi qui recusandae rem saepe sit ut! Ab accusantium
                                    alias architecto asperiores aut corporis error est eveniet fugiat id mollitia nam
                                    necessitatibus nisi nulla officiis pariatur quae quaerat quam quia quibusdam, quos rerum
                                    sed soluta temporibus totam! Dolores eaque eos facilis inventore laboriosam nam nobis
                                    perferendis, porro provident reprehenderit saepe veritatis. Consequatur cupiditate
                                    debitis dolorum nisi, provident quae recusandae totam unde velit vitae! Amet animi autem
                                    consectetur consequuntur cupiditate deserunt libero, molestiae molestias nihil officiis
                                    porro quo, sapiente totam voluptates voluptatibus! Alias atque delectus eaque esse
                                    facilis, ipsam minus recusandae tenetur velit! Expedita iste laudantium omnis quis
                                    rerum? Eligendi laudantium molestias neque obcaecati officiis quis! Asperiores at aut
                                    deleniti dolorem fuga neque perferendis quod sed sit ullam. Accusamus accusantium alias
                                    atque blanditiis dolore doloribus dolorum fugiat illo illum inventore laborum nesciunt,
                                    nostrum odio optio pariatur, possimus qui reiciendis tempora tenetur veniam, voluptate
                                    voluptatibus voluptatum. Cum debitis doloremque, dolores eligendi esse facere inventore
                                    iure libero maxime non omnis provident quaerat, quibusdam ratione repudiandae sint
                                    tempore. Ab ad est impedit magnam quidem repudiandae vero?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@push("js")
    <script>
        var addToCardRoute = '{{ route('card.add-to-card') }}';
    </script>
    <script src="{{ asset('assets/js/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('assets/js/product-detail.js') }}"></script>
    <script src="{{ asset('assets/js/card/card.js') }}"></script>
@endpush
