@extends("layouts.front")

@section("title", "Sipariş Detayları")

@push("css")
@endpush

@section("body")
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12 my-orders p-5 shadow">
                    <h4>#10 Numaralı Siparişinizin Detayları</h4>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Ürünler</th>
                                <th scope="col">Ürün Bilgi</th>
                                <th scope="col">Adet</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Toplam Fiyat</th>
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
                                <td class="s-amount">
                                    <div>1 Adet</div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td class="s-amount">
                                    <div>1 Adet</div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td class="s-amount">
                                    <div>1 Adet</div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                            </tr>
                            <tr>
                                <td><img src="{{ asset('assets/images/product1.jpeg') }}" alt=""></td>
                                <td>
                                    <div>Niteball</div>
                                    <div>Unisex Sneaker</div>
                                    <div>Adidas</div>
                                    <div>Beden: 37</div>
                                </td>
                                <td class="s-amount">
                                    <div>1 Adet</div>
                                </td>
                                <td>199,90</td>
                                <td>199,90</td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><span class="fw-medium">Toplam Fiyat:</span></td>
                                <td><span class="fw-medium">599,70 TL</span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0">Teslimat Bilgileri</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="text-orange">Teslimat Adresi</h6>
                                    <div class="my-4">Sercan Özen</div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores labore molestias nesciunt non quia totam vero! Earum esse eveniet in mollitia, nostrum tenetur? Autem dignissimos ipsum officiis! Eos, odio, qui.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="m-0">Ödeme Bilgileri</h6>
                                        </div>
                                        <div class="col-md-6">
                                <span class="pull-right payment-type">
                                    <i class="bi bi-credit-card"></i>
                                    ****3045 - Tek Çekim
                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="grand-total border-0 p-0 px-2">
                                        <p>Ürünün Toplamı: <span class="pull-right">599,70 TL</span></p>
                                        <p>Kargo Ücreti: <span class="pull-right">30,00 TL</span></p>
                                        <p>İndirim Kodu:
                                            <br>
                                            #Sepette30 <span class="pull-right">30.00 TL</span>
                                        </p>

                                        <p><strong>TOPLAM: </strong> <span class="pull-right">599,70 TL</span></p>
                                    </div>
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
@endpush
