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
        .image-container img{
            height: 5rem;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: border 0.3s ease;
        }
        .image-container input[type="radio"]{
            display: none;
        }
        .image-container input[type="radio"]:checked + label img{
            border: 3px solid #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        .image-container label:after{
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
        .image-container input[type="radio"]:checked + label::after{
            display: flex;
        }
        .delete-variant-image{
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
                                <label for="name" class="form-label">Ürün Adı <span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" id="name" autocomplete="off"
                                       placeholder="Ürün Adı"
                                       name="name" value="{{ old('name')}}" required>
                                @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label">Fiyat  <span class="text-danger"> * </span></label>
                                <input type="text" class="form-control" id="price" placeholder="Fiyat" name="price"
                                       value="{{ old('price')}}" required>
                                @error('price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="type_id" class="form-label">Ürün Türü  <span class="text-danger"> * </span></label>
                                <select class="form-select" id="type_id" name="type_id" required>
                                    <option selected="selected" value="-1">Ürün Türü Seçin</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="brand_id" class="form-label">Marka  <span class="text-danger"> * </span></label>
                                <select class="form-select" id="brand_id" name="brand_id" required>
                                    <option selected="selected" value="-1">Marka Seçebilirsiniz</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="category_id" class="form-label">Kategori  <span class="text-danger"> * </span></label>
                                <select class="form-select" id="category_id" name="category_id" required>
                                    <option selected="selected" value="-1">Kategori Seçebilirsiniz</option>
                                    @foreach($categories as $pCategory)
                                        <option value="{{ $pCategory->id }}">{{ $pCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="short_description" class="form-label">Kısa Açıklama</label>
                                <textarea class="form-control" id="short_description" placeholder="Kısa Açıklama"
                                          name="short_description">{{ old('short_description')}}</textarea>
                                @error('short_description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="description" class="form-label">Açıklama</label>
                                <textarea class="form-control" id="description" placeholder="Açıklama"
                                          name="description">{{ old('description')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <input type="checkbox" class="form-check-input" id="status"
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
                        <div id="variants"></div>

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
        var checkSlugRoute= "{{ route('admin.product.check-slug') }}";
    </script>
{{--    <script src="{{ asset('assets/js/product/gdg-variant.js') }}"></script>--}}
    <script src="{{ asset('assets/js/product/gdg-variant-u.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>

@endpush
