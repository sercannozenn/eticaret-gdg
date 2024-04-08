@extends("layouts.front")

@section("title", "Sepet")

@push("css")
@endpush

@section("body")
    <main>
        <div class="container shadow p-5">
            <div class="row">
                <div class="col-md-9 card-page pe-5">
                    <h4>Sepetim</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Ürünler</th>
                                <th scope="col">Ürün Bilgi</th>
                                <th scope="col">Adet</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Toplam Fiyat</th>
                                <th scope="col">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td>
                                    <div class="piece-wrapper">
                                        <div class="input-group">
                                            <span class="piece-decrease"> - </span>
                                            <input type="text" class="piece" value="0" disabled>
                                            <span class="piece-increase"> + </span>
                                        </div>
                                    </div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                                <td><i class="bi bi-trash text-orange"></i></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td>
                                    <div class="piece-wrapper">
                                        <div class="input-group">
                                            <span class="piece-decrease"> - </span>
                                            <input type="text" class="piece" value="0" disabled>
                                            <span class="piece-increase"> + </span>
                                        </div>
                                    </div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                                <td><i class="bi bi-trash text-orange"></i></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td>
                                    <div class="piece-wrapper">
                                        <div class="input-group">
                                            <span class="piece-decrease"> - </span>
                                            <input type="text" class="piece" value="0" disabled>
                                            <span class="piece-increase"> + </span>
                                        </div>
                                    </div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                                <td><i class="bi bi-trash text-orange"></i></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td>
                                    <div class="piece-wrapper">
                                        <div class="input-group">
                                            <span class="piece-decrease"> - </span>
                                            <input type="text" class="piece" value="0" disabled>
                                            <span class="piece-increase"> + </span>
                                        </div>
                                    </div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                                <td><i class="bi bi-trash text-orange"></i></td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td>
                                    <div class="piece-wrapper">
                                        <div class="input-group">
                                            <span class="piece-decrease"> - </span>
                                            <input type="text" class="piece" value="0" disabled>
                                            <span class="piece-increase"> + </span>
                                        </div>
                                    </div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                                <td><i class="bi bi-trash text-orange"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-3 basket-detail shadow py-3">
                    <a href="" class="btn bg-orange text-white w-100 btn-approve-basket">
                        Sepeti Onayla <i class="bi bi-chevron-right"></i>
                    </a>
                    <div class="grand-total mt-4">
                        <p>Ürünün Toplamı: <span class="pull-right">599,70 TL</span></p>
                        <p>Kargo Ücreti: <span class="pull-right">30,00 TL</span></p>
                        <p>İndirim Kodu:
                            <br>
                            #Sepette30 <span class="pull-right">30.00 TL <i class="bi bi-trash"></i></span>
                        </p>

                        <p><strong>TOPLAM: </strong> <span class="pull-right">599,70 TL</span></p>
                    </div>

                    <div class="discount-wrapper mt-4">
                        <h5 class="text-orange">İNDİRİM KODU</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="İndirim Kodu Gir">
                            <button class="btn btn-outline-success" type="button">Uygula</button>
                        </div>
                    </div>

                    <a href="" class="btn bg-orange text-white w-100 btn-approve-basket mt-4">
                        Sepeti Onayla <i class="bi bi-chevron-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </main>
@endsection

@push("js")
@endpush
