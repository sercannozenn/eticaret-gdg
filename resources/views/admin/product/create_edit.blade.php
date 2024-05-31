@extends('layouts.admin')
@section('title', 'Ürün Ekleme')

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            margin: 10px;
            padding: 10px;
            cursor: pointer;
        }

        .image-container img {
            height: 5rem;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border 0.3s ease;
        }

        .image-container input[type="radio"] {
            display: none;
        }

        .image-container input[type="radio"]:checked + label img {
            border: 3px solid #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .image-container label:after {
            content: '\2714';
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            /*display: flex;*/
            align-items: center;
            justify-content: center;
            padding: 2px;
            position: absolute;
            top: 5px;
            left: 5px;
            display: none;
        }

        .image-container input[type="radio"]:checked + label::after {
            display: flex;
        }

        .delete-variant-image {
            position: absolute;
            right: 3px;
            top: 3px;
        }
    </style>
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">ÜRÜN EKLEME</h6>
            <form class="forms-sample" action="" method="POST" id="gdgForm" enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"
                           id="home-tab"
                           data-bs-toggle="tab"
                           href="#product-info"
                           role="tab"
                           aria-controls="home"
                           aria-selected="true">Ürün Bilgileri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           id="productVariantTab"
                           data-bs-toggle="tab"
                           href="#product-variant"
                           role="tab"
                           aria-controls="profile"
                           aria-selected="false" disabled="">Ürün Varyant Ekleme
                            <i style="width: 18px" class="ms-2 text-primary" data-feather="info"
                               data-bs-toggle="tooltip"
                               data-bs-placement="top"
                               data-bs-title="Zorunlu alanları doldurduktan sonra Varyant Girişi Yapabilirsiniz"
                            ></i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="product-info" role="tabpanel"
                         aria-labelledby="product-info-tab">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">Ürün Adı <span
                                        class="text-danger"> * </span></label>
                                <input type="text" class="form-control" id="name" autocomplete="off"
                                       placeholder="Ürün Adı"
                                       name="name" value="{{ old('name')}}" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label">Fiyat <span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" id="price" placeholder="Fiyat" name="price"
                                       value="{{ old('price')}}" required>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="type_id" class="form-label">Ürün Türü <span
                                        class="text-danger"> * </span></label>
                                <select class="form-select" id="type_id" name="type_id" required>
                                    <option selected="selected" value="-1">Ürün Türü Seçin</option>
                                    @foreach($types as $type)
                                        <option
                                            value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="brand_id" class="form-label">Marka <span
                                        class="text-danger"> * </span></label>
                                <select class="form-select" id="brand_id" name="brand_id" required>
                                    <option selected="selected" value="-1">Marka Seçebilirsiniz</option>
                                    @foreach($brands as $brand)
                                        <option
                                            value="{{ $brand->id }}" {{ $brand->id == old('brand_id') ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="category_id" class="form-label">Kategori <span
                                        class="text-danger"> * </span></label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option selected="selected" value="-1">Kategori Seçebilirsiniz</option>
                                    @foreach($categories as $pCategory)
                                        <option
                                            value="{{ $pCategory->id }}" {{ $pCategory->id == old('category_id') ? 'selected' : '' }}>{{ $pCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="short_description" class="form-label">Kısa Açıklama</label>
                                <textarea class="form-control" id="short_description" placeholder="Kısa Açıklama"
                                          name="short_description">{{ old('short_description')}}</textarea>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="description" class="form-label">Açıklama</label>
                                <textarea class="form-control" id="description" placeholder="Açıklama"
                                          name="description">{{ old('description')}}</textarea>
                            </div>

                            <div class="col-md-6 mb-4">
                                <input type="checkbox" class="form-check-input" id="status" value="1"
                                       name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="form-check-label ps-2" for="status">
                                    Aktif mi?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-variant" role="tabpanel"
                         aria-labelledby="product-variant-tab">
                        <div>
                            <a href="javascript:void(0)" id="addVariant">
                                <i data-feather="plus-square"></i> <span class="ms-2">Varyant Ekle</span>
                            </a>
                            <hr class="my-3">
                        </div>
                        <div id="variants">
                            @if(old('variant'))
                                @foreach(old('variant') as $index => $variant)
                                    <div class="row variant" id="row-{{ $index }}">
                                        <div class="col-md-4 mb-4" id="">
                                            <label class="form-label" for="name-{{ $index }}"> Ürün Adı </label>
                                            <input
                                                class="form-control variant-product-name @error('variant.' . $index . '.name') is-invalid @enderror"
                                                id="name-{{ $index }}"
                                                placeholder="Ürün Adı"
                                                name="variant[{{ $index }}][name]"
                                                type="text"
                                                value="{{ old('variant.' . $index . '.name') }}">
                                        </div>
                                        <div class="col-md-4 mb-4" id="">
                                            <label class="form-label" for="variant_name-{{ $index }}">Ürün Varyant
                                                Adı</label>
                                            <input
                                                class="form-control variant-name @error('variant.' . $index . '.variant_name') is-invalid @enderror"
                                                id="variant_name-{{ $index }}"
                                                placeholder="Ürün Varyant Adı"
                                                name="variant[{{ $index }}][variant_name]"
                                                type="text"
                                                value="{{ old('variant.' . $index . '.variant_name') }}">
                                        </div>
                                        <div class="col-md-4 mb-4" id="">
                                            <label class="form-label" for="slug-{{ $index }}">Slug</label>
                                            <input
                                                class="form-control product-slug"
                                                id="slug-{{ $index }}"
                                                placeholder="Slug"
                                                name="variant[{{ $index }}][slug]"
                                                type="text"
                                                value="{{ old('variant.' . $index . '.slug') }}">
                                        </div>
                                        <div class="col-md-6 mb-4" id="">
                                            <label class="form-label" for="additional_price-{{ $index }}">Fiyat</label>
                                            <input
                                                class="form-control additional-price-input"
                                                id="additional_price-{{ $index }}"
                                                placeholder="Fiyat"
                                                name="variant[{{ $index }}][additional_price]"
                                                type="number"
                                                value="{{ old('variant.' . $index . '.additional_price') }}"
                                                data-variant-id="{{ $index }}">
                                        </div>
                                        <div class="col-md-6 mb-4" id="">
                                            <label class="form-label" for="final_price-{{ $index }}">Son Fiyat</label>
                                            <input class="form-control readonly"
                                                   id="final_price-{{ $index }}"
                                                   placeholder="Son Fiyat"
                                                   name="variant[{{ $index }}][final_price]"
                                                   type="text"
                                                   value="{{ old('variant.' . $index . '.final_price') }}"
                                                   readonly="">
                                        </div>
                                        <div class="col-md-12 mb-4" id="">
                                            <label class="form-label" for="extra_description-{{ $index }}">Ekstra
                                                Açıklama</label>
                                            <input class="form-control "
                                                   id="extra_description-{{ $index }}"
                                                   placeholder="Ekstra Açıklama"
                                                   name="variant[{{ $index }}][extra_description]"
                                                   type="text"
                                                   value="{{ old('variant.' . $index . '.extra_description') }}">
                                        </div>
                                        <div class="col-md-12 mb-4" id="">
                                            <label class="form-label" for="publish_date-{{ $index }}">Yayınlanma
                                                Tarihi</label>
                                            <div class="input-group flatpickr flatpickr-date" id="">
                                                <input class="form-control flatpickr-input"
                                                       id="publish_date-{{ $index }}"
                                                       placeholder="Yayınlanma Tarihi"
                                                       name="variant[{{ $index }}][publish_date]"
                                                       type="text"
                                                       value="{{ old('variant.' . $index . '.publish_date') }}"
                                                       data-input=""
                                                       readonly="readonly">
                                                <span class="input-group-text input-group-addon" data-toggle="">
                                                <i data-feather="calendar"></i>
                                                    </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4" id="">
                                            <label class="form-label" for="p_status-{{ $index }}">Aktif mi?</label>
                                            <input class="form-check-input "
                                                   id="p_status-{{ $index }}"
                                                   placeholder=""
                                                   name="variant[{{ $index }}][p_status]"
                                                   type="checkbox"
                                                   value="1"
                                                {{ old('variant.' . $index . '.p_status') !== null ? 'checked' : '' }}
                                            >
                                        </div>
                                        <div class="row" id="">
                                            <div class="col-md-12 mb-1" id=""><a
                                                    class="btn-delete-variant btn btn-danger col-3"
                                                    href="javascript:void(0)" data-variant-id="{{ $index }}">Varyant
                                                    Kaldır</a>
                                                <hr class="my-2">
                                            </div>
                                        </div>
                                        <div class="row" id="">
                                            <div class="col-md-12" id="">
                                                <a class="btn btn-info btn-add-image mb-4"
                                                   href="javascript:void(0)"
                                                   data-variant-id="{{ $index }}"
                                                   data-input="data-input-{{ $index }}"
                                                   data-preview="data-preview-{{ $index }}">
                                                    Görsel Ekle
                                                    <i data-feather="image" class="add-size"></i>
                                                </a>
                                            </div>
                                            <input class="form-control"
                                                   id="data-input-{{ $index }}"
                                                   placeholder=""
                                                   name="variant[{{ $index }}][image]"
                                                   type="hidden"
                                                   value="{{ old('variant.' . $index . '.image') }}">
                                            <div class="col-md-12" id="data-preview-{{ $index }}"></div>
                                            <a class="btn-add-size col-md-12" href="javascript:void(0)"
                                               data-variant-id="{{ $index }}">
                                                <i data-feather="plus-circle" class="add-size"></i>
                                                <span class="ms-2">Beden Ekle</span></a>
                                        </div>
                                        <div class="col-md-12 p-0 mb-3" id="sizeDiv{{ $index }}">
                                            @if(old('variant.' . $index . '.size') || old('variant.' . $index . '.stock') )
                                                @foreach(old('variant.'. $index . '.size') as $sizeIndex => $size)

                                                    <div class="row mx-0 size-stock-{{ $index }}"
                                                         id="sizeStockDeleteGeneral-{{ $index }}-{{ $sizeIndex }}">
                                                        <div class="col-md-5 mb-4 px-3" id="">
                                                            <label class="form-label"
                                                                   for="size-{{ $index }}-{{ $sizeIndex }}">Beden</label>
                                                            <select
                                                                class="form-control"
                                                                id="size-{{ $index }}-{{ $sizeIndex }}"
                                                                name="variant[{{ $index }}][size][{{ $sizeIndex }}]">

                                                                <option class="" value="-1">Beden Seçebilirsiniz
                                                                </option>
                                                                @if(old('type_id') == 1)
                                                                        <?php
                                                                        $sizes = ['xs', 's', 'm', 'l', 'xl', 'xxl', '3xl', '4xl', '5xl'];
                                                                        ?>
                                                                @elseif(old('type_id') == 2)
                                                                        <?php
                                                                        $sizes = [];
                                                                        for ($i = 20; $i < 51; $i++) {
                                                                            $sizes[] = $i;
                                                                        }
                                                                        ?>
                                                                @elseif(old('type_id') == 3)
                                                                        <?php $sizes = ['standart']; ?>
                                                                @endif
                                                                @foreach ($sizes as $iSize)
                                                                    <option
                                                                        value="{{ $iSize }}" {{ old('variant.' . $index . '.size.' . $sizeIndex) == $iSize ? 'selected' : '' }}>{{ $iSize }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5 mb-4 px-3" id="">
                                                            <label class="form-label"
                                                                   for="stock-{{ $index }}-{{ $sizeIndex }}">Stok
                                                                Sayısı</label>
                                                            <input class="form-control"
                                                                   id="stock-{{ $index }}-{{ $sizeIndex }}"
                                                                   placeholder="Stok Sayısı"
                                                                   name="variant[{{ $index }}][stock][{{ $sizeIndex }}]"
                                                                   type="number"
                                                                   value="{{ old('variant.' . $index . '.stock.' . $sizeIndex) }}">
                                                        </div>
                                                        <div class="col-md-2 mb-4 px-3" id="">
                                                            <label class="form-label d-block"
                                                                   for="undefined">&nbsp;</label>
                                                            <a class="btn btn-danger w-100 btn-size-stock-delete"
                                                               id="sizeStockDelete-{{ $index }}-{{ $sizeIndex }}"
                                                               href="javascript:void(0)"
                                                               data-size-stock-id="{{ $index }}-{{ $sizeIndex }}">
                                                                Beden Sil
                                                            </a>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            @endif
                                        </div>
                                        <hr class="my-5">
                                    </div>
                                @endforeach

                            @endif
                        </div>

                    </div>
                </div>
                <button type="button" class="btn btn-primary me-2 mt-5" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/axios/dist/axios.min.js') }}"></script>
    <script>
        var checkSlugRoute = "{{ route('admin.product.check-slug') }}";

        @php($arr = old('variant') ?? [])
        var variantCount = Number('{{ count($arr) }}');
        var variantSizeStockInfo = [];

        @if(old('variant') && isset(old('variant')['size']))
            @foreach(old('variant') as $index => $variant)
                let index = Number('{{ $index }}');
                let sizeStock = Number('{{ count(old('variant.' . $index . '.size')) }}');
                variantSizeStockInfo[index] = { size_stock: sizeStock };
            @endforeach
        @endif

        var oldImages = [];
        @if(old('variant'))
            flatpickr(".flatpickr-date", {
            wrap      : true,
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
            @foreach(old('variant') as $index => $variant)
                console.log("GELDİ");
                oldImages.push({images: "{{ old('variant.' . $index . '.image') }}", index: "{{ $index }}"});
            @endforeach
        @endif

        @if(old('name') && is_null(old('variant')))
            Swal.fire({
                          title: 'Uyarı!',
                          text : 'En az bir varyant eklemeniz gerekir.',
                          icon : 'warning'
                      });
        @endif

        let displayErrors = {};
        @if($errors->any())
            displayErrors = @json($errors->toArray());
        @endif
    </script>
    {{--    <script src="{{ asset('assets/js/product/gdg-variant.js') }}"></script>--}}
    <script src="{{ asset('assets/js/product/gdg-variant-u.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush
