@extends('layouts.admin')
@section('title', 'Ürün Ekleme'))

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
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
                           id="profile-tab"
                           data-bs-toggle="tab"
                           href="#product-variant"
                           role="tab"
                           aria-controls="profile"
                           aria-selected="false">Ürün Varyant Ekleme</a>
                    </li>
                </ul>
                <div class="tab-content border border-top-0 p-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="product-info" role="tabpanel"
                         aria-labelledby="product-info-tab">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="name" class="form-label">Ürün Adı</label>
                                <input type="text" class="form-control" id="name" autocomplete="off"
                                       placeholder="Ürün Adı"
                                       name="name" value="{{ old('name')}}">
                                @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="price" class="form-label">Fiyat</label>
                                <input type="text" class="form-control" id="price" placeholder="Fiyat" name="price"
                                       value="{{ old('price')}}">
                                @error('price')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="type_id" class="form-label">Ürün Türü</label>
                                <select class="form-select" id="type_id" name="type_id">
                                    <option selected="selected" value="-1">Marka Seçebilirsiniz</option>
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="brand_id" class="form-label">Marka</label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option selected="selected" value="-1">Marka Seçebilirsiniz</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select class="form-select" id="category_id" name="category_id">
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

                            <div class="col-md-6 form-check  mb-4">
                                <input type="checkbox" class="form-check-input" id="status"
                                       name="status" {{ old('status') ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
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
                        </div>
                        <div id="variants"></div>
{{--                        <div class="row">--}}
                            {{--                            <div class="col-md-4 mb-4">--}}
                            {{--                                <label for="name" class="form-label">Ürün Adı</label>--}}
                            {{--                                <input type="text" class="form-control" id="name" autocomplete="off"--}}
                            {{--                                       placeholder="Ürün Adı"--}}
                            {{--                                       name="name" value="{{ old('name')}}">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-4">--}}
                            {{--                                <label for="variant_name" class="form-label">Ürün Varyant Adı</label>--}}
                            {{--                                <input type="text" class="form-control" id="variant_name" autocomplete="off"--}}
                            {{--                                       placeholder="Ürün Adı"--}}
                            {{--                                       name="variant_name" value="{{ old('variant_name')}}">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-4 mb-4">--}}
                            {{--                                <label for="slug" class="form-label">Slug</label>--}}
                            {{--                                <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"--}}
                            {{--                                       value="{{ old('slug')}}">--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-md-6 mb-4">--}}
                            {{--                                <label for="additional_price" class="form-label">Fiyat</label>--}}
                            {{--                                <input type="text" class="form-control" id="additional_price" placeholder="Fiyat" name="additional_price"--}}
                            {{--                                       value="{{ old('additional_price')}}">--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-6 mb-4">--}}
                            {{--                                <label for="final_price" class="form-label">Son Fiyat</label>--}}
                            {{--                                <input type="text" class="form-control" id="final_price" placeholder="Son Fiyat" name="final_price"--}}
                            {{--                                       value="{{ old('final_price')}}">--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-md-12 mb-4">--}}
                            {{--                                <label for="extra_description" class="form-label">Ekstra Açıklama</label>--}}
                            {{--                                <textarea class="form-control" id="extra_description" placeholder="Kısa Açıklama"--}}
                            {{--                                          name="extra_description">{{ old('extra_description')}}</textarea>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-12  mb-4">--}}
                            {{--                                <label for="publish_date" class="form-label">Yayınlanma Tarihi</label>--}}
                            {{--                                <div class="input-group flatpickr flatpickr-date" id="flatpickr-date">--}}
                            {{--                                    <input type="text"--}}
                            {{--                                           class="form-control"--}}
                            {{--                                           name="publish_date"--}}
                            {{--                                           id="publish_date"--}}
                            {{--                                           placeholder="Yayınlanma Tarihi Seçebilirsiniz."--}}
                            {{--                                           data-input>--}}
                            {{--                                    <span class="input-group-text input-group-addon" data-toggle><i data-feather="calendar"></i></span>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="col-md-6 form-check  mb-4">--}}
                            {{--                                <input type="checkbox" class="form-check-input" id="p_status"--}}
                            {{--                                       name="p_status" {{ old('p_status') ? 'checked' : '' }}>--}}
                            {{--                                <label class="form-check-label" for="p_status">--}}
                            {{--                                    Aktif mi?--}}
                            {{--                                </label>--}}
                            {{--                            </div>--}}
                            {{--                            --}}
                            {{--                            <div>--}}
                            {{--                                <i data-feather="plus-circle"></i> <span class="ms-2">Beden Ekle</span>--}}
                            {{--                            </div>--}}


{{--                            <hr>--}}


                            {{--                            <div class="col-md-6 mb-4">--}}
                            {{--                                <label for="size" class="form-label">Beden</label>--}}
                            {{--                                <select class="form-select" id="size" name="size">--}}
                            {{--                                    <option selected="selected" value="-1">Beden Seçebilirsiniz</option>--}}
                            {{--                                    @for($i=20; $i < 51; $i++)--}}
                            {{--                                        <option value="{{ $i }}">{{ $i }}</option>--}}
                            {{--                                    @endfor--}}
                            {{--                                </select>--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-md-6 mb-4">--}}
                            {{--                                <label for="stock" class="form-label">Stok Sayısı</label>--}}
                            {{--                                <input type="text" class="form-control" id="stock" placeholder="Stok Sayısı" name="stock"--}}
                            {{--                                       value="{{ old('stock')}}">--}}
                            {{--                            </div>--}}

                            {{--                            <div class="col-md-12 mb-4">--}}
                            {{--                                <label for="images" class="form-label">Varyant Görselleri</label>--}}
                            {{--                                <input type="file" class="form-control" id="images" placeholder="Stok Sayısı" name="images[]" multiple>--}}
                            {{--                            </div>--}}


{{--                        </div>--}}

                    </div>
                </div>
                <button type="button" class="btn btn-primary me-2 mt-5" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/product/gdg-variant.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let name = document.querySelector("#name");

            btnSubmit.addEventListener('click', function ()
            {
                if (name.value.trim().length < 1)
                {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen marka adını yazınız.",
                                  icon : "warning"
                              });
                }
                else
                {
                    gdgForm.submit();
                }
            });


            if ($('.flatpickr-date').length)
            {
                flatpickr(".flatpickr-date", {
                    wrap      : true,
                    enableTime: true,
                    dateFormat: "Y-m-d H:i",
                });
            }
        });
    </script>
@endpush
