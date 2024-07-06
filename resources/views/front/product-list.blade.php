@extends("layouts.front")

@section("title", "Ürün Listesi")

@push("css")
@endpush

@section("body")
    <main>
        <div class="container">
            <form action="{{ route('product.list') }}" id="productFilterForm">
                <div class="row">
                    <div class="col-md-3">
                        <div class="row position-relative">
                            <div class="col-12 product-filter">
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Kategoriler</h3>
                                    <div class="filter-detail">
                                        @foreach($categories as $category)
                                            <div class="form-check filter-item">
                                                <input type="checkbox"
                                                       name="categories"
                                                       class="form-check-input"
                                                       value="{{ $category->slug }}"
                                                       id="cat-{{ $category->id }}"
                                                        {{ in_array($category->slug, $selectedValues['categories'] ?? []) ? 'checked' : '' }}
                                                >
                                                <label for="cat-{{ $category->id }}">{{ ucfirst($category->name) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Markalar</h3>
                                    <div class="filter-detail">
                                        @foreach($brandsColumns as $brand)
                                            <div class="form-check filter-item">
                                                <input type="checkbox"
                                                       class="form-check-input"
                                                       name="brands"
                                                       value="{{ $brand->slug }}"
                                                       id="brand-{{ $brand->id }}"
                                                    {{ in_array($brand->slug, $selectedValues['brands'] ?? []) ? 'checked' : '' }}
                                                >
                                                <label for="brand-{{ $brand->id }}">{{ ucfirst($brand->name) }}</label>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Cinsiyet</h3>
                                    <div class="filter-detail">
                                        @foreach($genders as $gender)
                                            <div class="form-check filter-item">
                                                <input type="checkbox"
                                                       name="genders"
                                                       class="form-check-input"
                                                       value="{{ $gender->value }}"
                                                       id="gender-{{ $gender->value }}"
                                                    {{ in_array($gender->value, $selectedValues['genders'] ?? []) ? 'checked' : '' }}
                                                >
                                                <label for="gender-{{ $gender->value }}">{{ getGender($gender) }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="filter-item-wrapper mt-2">
                                    <h3 class="filter-title">Fiyat</h3>
                                    <div class="filter-detail">
                                        <div class="filter-item">
                                            <div class="row filter-price">
                                                <div class="col">
                                                    <input type="text"
                                                           name="min_price"
                                                           class="min-price form-control"
                                                           placeholder="En az"
                                                           value="{{ request()->input('min_price') }}"
                                                    >
                                                </div>
                                                <div class="col">
                                                    <input type="text"
                                                           name="max_price"
                                                           class="max-price form-control"
                                                           placeholder="En çok"
                                                           value="{{ request()->input('max_price') }}"
                                                    >
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
                                <button type="submit" class="btn btn-success">Filtrele</button>
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
                            @foreach($products as $product)
                                <div class="col-md-3 wrapper-product position-relative mb-5">
                                    <div class="product-image position-relative">
                                        <a href="">
                                            <img src="{{ $product->featuredImage->path }}" class="img-fluid" alt="Adidas">
                                        </a>
                                        <div class="product-overlay">
                                            <span class="product-tag text-orange fw-bold-600">Yeni</span>
                                            <span class="favorite"><i class="bi bi-heart"></i></span>
                                            <span class="un-favorite"><i class="bi bi-heart-fill"></i></span>
                                            <a href="" class="product-brand text-orange fw-bold-600">
                                                {{ $product->activeProductsMain->brand->name }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-info text-center pt-3">
                                        <h4 class="product-title">{{ $product->name }}</h4>
                                        <div class="text-muted product-description">
                                            {{ $product->activeProductsMain->category->name }}
                                        </div>
                                        <a href="" class="product-price text-orange">
                                            {{ number_format($product->final_price, 2) }} TL
                                        </a>
                                    </div>
                                </div>
                            @endforeach


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
    <script>
        document.addEventListener('DOMContentLoaded', function ()
        {
           let  productFilterForm = document.querySelector('#productFilterForm');
           productFilterForm.addEventListener('input', function (event)
           {
               let currentElement = event.target;
               let params = {};
               let elements = productFilterForm.elements;
               let selectedCheckbox = [];
               Array.from(elements).forEach(function (element) {
                   if(element.name && element.value && element.type === 'text'){
                       params[element.name] = element.value;
                   }else if(element.name && element.value && element.type === 'checkbox'){
                       let checkboxes = document.querySelectorAll('input[name*="' + element.name + '"]' );
                       checkboxes.forEach(function (checkbox) {
                           if(checkbox.checked){
                               if(!selectedCheckbox[element.name]){
                                   selectedCheckbox[element.name] = [];
                               }
                               if (!selectedCheckbox[element.name].includes(checkbox.value)){
                                   selectedCheckbox[element.name].push(checkbox.value);
                               }
                           }else{
                               if (selectedCheckbox[element.name] && selectedCheckbox[element.name].includes(checkbox.value)){
                                   const index = selectedCheckbox[element.name].indexOf(checkbox.value);
                                   selectedCheckbox[element.name].splice(index, 1);
                                   params[element.name].splice(index, 1);
                               }
                           }
                       })
                   }
               });
               for(let key in selectedCheckbox){
                   params[key] = selectedCheckbox[key];
               }

               let queryString = Object.keys(params).map(function (key) {
                   return encodeURIComponent(key) + '=' + encodeURIComponent(params[key]);
               }).join('&');
               let actionUrl  = productFilterForm.action;
               actionUrl = actionUrl.replace('#', '');
               let newUrl = actionUrl + (queryString ? '?' + queryString : '');
               window.location.href = newUrl;
           });
        });
    </script>
@endpush
