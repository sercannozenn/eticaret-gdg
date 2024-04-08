@extends("layouts.front")

@section("title", "Ürün Detay Sayfası")

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
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product1.jpeg') }}"/>
                                    </div>
                                </div>
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product2.webp') }}"/>
                                    </div>
                                </div>
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product3.jpeg') }}"/>
                                    </div>
                                </div>
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product4.jpeg') }}"/>
                                    </div>
                                </div>
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product5.jpeg') }}"/>
                                    </div>
                                </div>
                                <div class="swiper-slide big-image">
                                    <div class="swiper-zoom-container">
                                        <img src="{{ asset('assets/images/product6.jpeg') }}"/>
                                    </div>
                                </div>
                            </div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                        <div thumbsSlider="" class="swiper-container thumb-sliders swiper-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product1.jpeg') }}"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product2.webp') }}"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product3.jpeg') }}"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product4.jpeg') }}"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product5.jpeg') }}"/>
                                </div>
                                <div class="swiper-slide ">
                                    <img class="thumb-image" src="{{ asset('assets/images/product6.jpeg') }}"/>
                                </div>
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
                    <h4 class="fw-bold-600">Niteball</h4>
                    <div class="price text-orange fw-bold-600">199,90 TL</div>
                    <hr class="mt-5">
                    <h6>Unisex Sneaker</h6>
                    <hr>
                    <h6>Adidas</h6>
                    <hr>
                    <p class="product-short-description font-playfair">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eius excepturi in odio possimus
                        quisquam repellendus tempora. Consectetur debitis deserunt dolorum eveniet hic incidunt inventore nemo,
                        non nulla quaerat voluptas.
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
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                    </select>
                                </div>
                            </div>

                            <hr class="my-3">
                            <div class="col-md-12">
                                <a href="" class="btn bg-orange add-to-card w-100 text-white">Sepete Ekle</a>
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
                                    <h6>Lorem ipsum dolor sit.</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci beatae nam sit.
                                        Accusamus
                                        ipsum minima minus repudiandae. Earum et ipsum maiores reiciendis repudiandae
                                        tempora, vel!
                                        Adipisci architecto commodi dolores error est fugiat minima numquam odit,
                                        repudiandae saepe
                                        tenetur, voluptate. Ab accusamus commodi consectetur culpa dicta ex fugiat, laborum
                                        minima
                                        pariatur quia rerum similique. A aliquam, assumenda aut corporis distinctio
                                        doloremque ea et
                                        expedita in incidunt ipsum iure laboriosam, minus nostrum quis reiciendis sunt ut
                                        veniam
                                        veritatis voluptas? Expedita harum inventore laborum praesentium. Ab delectus,
                                        dignissimos ex
                                        excepturi expedita laudantium minima omnis repudiandae rerum sed. Adipisci eos
                                        laborum molestiae
                                        neque voluptates.</p>
                                    <hr>
                                    <strong>Lorem ipsum.</strong>
                                    <hr>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut corporis debitis
                                        dignissimos
                                        exercitationem illo iste modi necessitatibus officia, officiis quia ratione velit.
                                        Adipisci at
                                        dolor explicabo quasi, sit tempora voluptatibus. Ab animi at consequuntur earum
                                        inventore iste
                                        temporibus ut velit. Enim facere iste laboriosam maiores minima natus nobis placeat
                                        quae quas
                                        quidem rem repellat repudiandae similique sit, totam ut voluptatibus. Cupiditate
                                        debitis
                                        delectus distinctio doloribus ducimus ea earum expedita ipsa omnis repellat.
                                        Blanditiis dolorum
                                        earum exercitationem incidunt voluptas? Aliquid delectus deleniti doloribus earum
                                        est, facilis
                                        fuga in inventore, ipsum maxime minima minus nesciunt optio perspiciatis quo quod
                                        soluta veniam
                                        voluptatum. Accusamus, animi aspernatur beatae commodi cupiditate doloremque eaque
                                        enim esse
                                        eveniet hic impedit iste iure modi mollitia neque non pariatur perspiciatis sint
                                        tempore, veniam
                                        veritatis vero vitae voluptas voluptates voluptatibus. Deserunt facere numquam
                                        obcaecati omnis
                                        quaerat quasi tenetur. Adipisci autem dolor doloremque exercitationem id natus quae
                                        quis
                                        repellendus sapiente. A ad adipisci atque aut consectetur consequatur culpa
                                        cupiditate dolore
                                        dolorem doloremque dolores eligendi et exercitationem explicabo facilis fugit illo
                                        in, ipsa
                                        libero nisi non nostrum obcaecati perferendis porro possimus provident quas
                                        quisquam, rem sequi
                                        voluptates! Deleniti dolor eaque esse, excepturi explicabo odio tempora tempore.
                                        Blanditiis
                                        cumque, deleniti deserunt, dolore dolorum facilis labore officia perferendis, rem
                                        sunt vitae
                                        voluptatem voluptatibus! Adipisci atque debitis distinctio dolorem eum eveniet nemo
                                        officiis
                                        pariatur placeat, quidem quisquam, tempore voluptas voluptates! Alias aliquam
                                        consequatur cum
                                        explicabo fuga iure, molestiae mollitia, nihil nulla numquam obcaecati rem saepe
                                        sapiente
                                        similique, veritatis. Aliquam animi culpa dolore earum harum illum ipsam ipsum modi,
                                        mollitia
                                        nisi nobis perspiciatis quasi sed sunt ut! Commodi eum harum modi non odit, officia
                                        optio quidem
                                        repudiandae similique suscipit. Alias amet, animi delectus dicta et excepturi fugit
                                        inventore
                                        laboriosam perspiciatis ratione saepe sequi tempore voluptate voluptatem voluptates.
                                        Amet
                                        consequuntur error exercitationem id, illum mollitia nobis voluptas?</p>
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
    <script src="{{ asset('assets/js/product-detail.js') }}"></script>
@endpush
