<a href="javascript:void(0)" class="dropdown-toggle position-relative"
   role="button"
   data-bs-toggle="dropdown"
   aria-expanded="false">
    <i class="bi bi-cart zoom text-white fs-4"></i>
    <span class="item-count bg-orange text-black">{{ $card->items()->count() }}</span>
</a>
<div class="dropdown-menu">
    <div class="row overflow-custom">
        @php($totalPrice = 0)
        @foreach($card->items as $item)
            @php($totalPrice += ($item->quantity * $item->discounted_price) )
            <div class="col-12">
                <div class="card border-0">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ $item->product->featuredImage->path }}" alt="" class="img-fluid rounded-start">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                @php($productName= $item->product->name == '' ? $item->product->productMain->name : $item->product->name)
                                <h5 class="card-title">{{ $productName }}</h5>
                                <p class="card-text">Beden: {{ $item->sizeStock->size }} </p>
                                <p class="card-text">Fiyat: <s style="font-size: 10px">{{ $item->price }} TL</s> <div>{{ $item->discounted_price }} TL</div></p>
                                <p class="card-text">Adet: {{ $item->quantity }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <hr class="my-4">
            </div>
        @endforeach

    </div>

    <div class="row total-price">
        <div class="col-12">
            <hr class="my-4">
        </div>

        <div class="col-12">
            <h5 class="text-center">
                <span>Toplam:</span>
                <span>{{ number_format($totalPrice, 2) }} TL</span>
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
