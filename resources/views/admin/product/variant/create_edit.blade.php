@extends('layouts.admin')
@section('title', 'Variant Güncelleme'))

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

            <h6 class="card-title">Variant Güncelleme</h6>

            <form class="forms-sample row" action="{{ route('admin.product.variant.update', $product->id) }}"
                  method="POST"
                  id="gdgForm">
                @csrf
                @method('PUT')

                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Ürün Adı</label>
                    <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Ürün Adı"
                           name="name" value="{{ isset($product) ? $product->name : old('name')}}">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="variant_name" class="form-label">Variant Adı</label>
                    <input type="text" class="form-control" id="variant_name" placeholder="Variant Adı"
                           name="variant_name"
                           value="{{ isset($product) ? $product->variant_name : old('variant_name')}}">
                    @error('variant_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="additional_price" class="form-label">Fiyat</label>
                    <input type="number" class="form-control" id="additional_price" placeholder="Fiyat"
                           name="additional_price"
                           value="{{ isset($product) ? $product->additional_price : old('additional_price')}}">
                    @error('additional_price')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="final_price" class="form-label">Fiyat</label>
                    <input type="number" disabled class="form-control" id="final_price" placeholder="Fiyat"
                           name="final_price"
                           value="{{ isset($product) ? $product->final_price : old('final_price')}}">
                    @error('final_price')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="extra_description" class="form-label">Ekstra Açıklama</label>
                    <textarea name="short_description" id="extra_description" rows="3"
                              class="form-control">{{ isset($product) ? $product->extra_description : old('extra_description')}}</textarea>
                    @error('extra_description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                           value="{{ isset($product) ? $product->slug : old('slug')}}">
                    @error('slug')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <div class="input-group flatpickr flatpickr-date">
                        <input class="form-control flatpickr-input active"
                               id="start_date"
                               placeholder="Yayınlanma Tarihi"
                               name="publish_date"
                               type="text"
                               value="{{ isset($discount) ? $discount->publish_date : old('publish_date') }}"
                               data-input="">
                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="status"
                           name="p_status" {{ isset($product) ? ($product->status ? 'checked': '') : (old('p_status') ? 'checked' : '') }}>
                    <label class="form-check-label" for="status">
                        Aktif mi?
                    </label>
                </div>

                <div class="col-md-12" id="">
                    <a class="btn btn-info btn-add-image mb-4"
                       id="btnAddImage"
                       href="javascript:void(0)"
                       data-variant-id="1"
                       data-input="data-input-1"
                       data-preview="data-preview-1">Görsel Ekle
                        <i class="add" data-feather="image"></i>
                    </a>
                </div>
                <input class="form-control"
                       id="targetInput"
                       name="image"
                       type="hidden"
                       value="{{ $product->variantImages->pluck('path')->implode(',') }}">
                <div class="col-md-12" id="targetPreview">
                    @foreach($product->variantImages as $index => $image)
                        <div class="image-container" id="image-container-{{ $product->id }}-{{ $index }}">
                            <input id="radio-{{ $product->id }}-{{ $index }}"
                                   name="featured_image"
                                   type="radio"
                                   value="{{ $image->path }}"
                                    {{ $image->is_featured ? 'checked' : '' }}
                            >
                            <label for="radio-{{ $image->id }}">
                                <img style="height: 5rem"
                                     src="{{ asset($image->path) }}">
                            </label>
                            <i class="delete-variant-image"
                               data-feather="x"
                               data-url="{{ $image->path }}"
                               data-image-id="{{ $image->id }}"
                               data-image-index="{{ $index }}"
                               data-image-prev="{{ $index > 0 ? ($index-1) : '-'}}"
                               data-image-next="{{ $index < (count($product->variantImages) - 1) ? ($index+1)  : '-'}}"
                            ></i>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-12 my-3">
                    <a class="btn-add-size col-md-12" href="javascript:void(0)" data-variant-id="0">
                        <i data-feather="plus-circle" id="add-size"></i>
                        <span class="ms-2">Beden Ekle</span>
                    </a>
                </div>
                <div class="col-md-12 p-0 mb-3" id="sizeDiv">
                    @if(isset(old()['size']))
                        @foreach(old('size') as $index => $size)
                            <div class="row mx-0 size-stock-0" id="sizeStockDeleteGeneral-{{ $size }}">
                                <div class="col-md-5 mb-4 px-3" id="">
                                    <label class="form-label" for="size-0-0">Beden</label>
                                    <input type="hidden" name="size_ids[]" value="{{old('size_ids')[$index] ?? ''}}">
                                    <select
                                            class="form-control" id="size-0-0" name="size[]">
                                        <option class="" value="-1">Beden Seçebilirsiniz</option>
                                        @php($sizeRange = explode(',', $product->productsMain->type->size_range))
                                        @foreach($sizeRange as $range)
                                            <option value="{{ $range }}" {{ $size == $range ? 'selected' : ''}}>{{ $range }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 mb-4 px-3" id="">
                                    <label class="form-label" for="stock-0-0">Stok Sayısı</label>
                                    <input class="form-control"
                                           id="stock-0-0"
                                           placeholder="Stok Sayısı"
                                           name="stock[]"
                                           type="number"
                                           value="{{ old('stock')[$index] ?? '' }}">
                                </div>
                                <div class="col-md-2 mb-4 px-3" id="">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <a class="btn btn-danger w-100 btn-size-stock-delete"
                                       id="sizeStockDelete-0-0"
                                       href="javascript:void(0)"
                                       data-size="{{ $size }}"
                                       data-size-id="{{ old('size_ids')[$index] ?? '' }}"
                                    >
                                        Beden Sil
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        @foreach($product->sizeStock as $size)
                            <div class="row mx-0 size-stock-0" id="sizeStockDeleteGeneral-{{ $size->size}}">
                                <div class="col-md-5 mb-4 px-3" id="">
                                    <label class="form-label" for="size-0-0">Beden</label>
                                    <input type="hidden" name="size_ids[]" value="{{ $size->id }}">
                                    <select
                                            class="form-control" id="size-0-0" name="size[]">
                                        <option class="" value="-1">Beden Seçebilirsiniz</option>
                                        @php($sizeRange = explode(',', $product->productsMain->type->size_range))
                                        @foreach($sizeRange as $range)
                                            <option value="{{ $range }}" {{ $size->size == $range ? 'selected' : ''}}>{{ $range }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5 mb-4 px-3" id="">
                                    <label class="form-label" for="stock-0-0">Stok Sayısı</label>
                                    <input class="form-control"
                                           id="stock-0-0"
                                           placeholder="Stok Sayısı"
                                           name="stock[]"
                                           type="number"
                                           value="{{ $size->stock }}">
                                </div>
                                <div class="col-md-2 mb-4 px-3" id="">
                                    <label class="form-label d-block">&nbsp;</label>
                                    <a class="btn btn-danger w-100 btn-size-stock-delete"
                                       id="sizeStockDelete-0-0"
                                       href="javascript:void(0)"
                                       data-size="{{ $size->size }}"
                                       data-size-id="{{ $size->id }}"
                                    >
                                        Beden Sil
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>


                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/inputs/create.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let name = document.querySelector("#name");
            let variantName = document.querySelector("#variant_name");
            let slugInput = document.querySelector("#slug");
            let additionalPrice = document.querySelector("#additional_price");
            let finalPrice = document.querySelector("#final_price");
            let btnAddImage = document.querySelector("#btnAddImage");
            let targetInput = document.querySelector("#targetInput");
            let targetPreview = document.querySelector("#targetPreview");
            let btnAddSize = document.querySelector("#add-size");

            let originalPrice = "{{ $product->productsMain->price }}";
            let originalName = "{{ $product->productsMain->name }}";
            let variantID = "{{ $product->id }}";

            btnSubmit.addEventListener('click', function ()
            {
                if (variantName.value.trim().length < 1)
                {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen varyant adını yazınız.",
                                  icon : "warning"
                              });
                }
                else if (slugInput.value.trim().length < 1)
                {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen slug yazınız.",
                                  icon : "warning"
                              });
                }
                else
                {
                    gdgForm.submit();
                }
            });

            additionalPrice.addEventListener('input', function ()
            {
                let result = Number(originalPrice) + Number(this.value);
                finalPrice.value = result;
            });

            name.addEventListener('input', function ()
            {
                let val = this.value;
                let slug = originalName + '-' + variantName.value

                if (val.trim() !== '')
                {
                    slug = val + '-' + variantName.value;
                }
                slugInput.value = generateSlug(slug);
            });
            variantName.addEventListener('input', function ()
            {
                let val = this.value;
                let slug = originalName + '-' + val

                if (name.value.trim() !== '')
                {
                    slug = name.value + '-' + val;
                }
                slugInput.value = generateSlug(slug);
            });

            btnAddImage.addEventListener('click', function ()
            {
                openFileManager();
            });
            btnAddSize.addEventListener('click', function ()
            {
                btnAddSizeAction();
            });
            document.querySelector('body').addEventListener('click', function (event)
            {
                let element = event.target;

                if (element.classList.contains('btn-size-stock-delete'))
                {
                    let dataSizeID = element.getAttribute('data-size-id');
                    if (dataSizeID)
                    {
                        let data = {
                            size_id: dataSizeID
                        };
                        fetch('{{ route('admin.product.variant.delete-size-stock') }}', {
                            method : 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body   : JSON.stringify(data)
                        }).then(response =>
                                {
                                    if (!response.ok)
                                    {
                                        Swal.fire("Beden Silinemedi.", "Hata alındı.", "info");
                                    }
                                    return response.json();
                                })
                          .then(data =>
                                {
                                    element.parentElement.parentElement.remove();
                                    Swal.fire("Başarılı.", "Beden silindi", "success");
                                })
                    }
                    else
                    {
                        element.parentElement.parentElement.remove();
                    }


                }

                if (element.classList.contains('delete-variant-image'))
                {
                    let imageID = element.getAttribute("data-image-id");
                    let dataUrl = element.getAttribute("data-url") + ",";
                    let prevImage = element.getAttribute('data-image-prev');
                    let nextImage = element.getAttribute('data-image-next');
                    targetInput.value = targetInput.value.replace(dataUrl, "");
                    if (prevImage !== '-')
                    {
                        let prevImageElement = document.querySelector('#radio-' + variantID + '-' + prevImage);
                        console.log(prevImageElement);
                        console.log("prevImage");
                        console.log(prevImage);
                        if(prevImageElement){
                            prevImageElement.checked = true;
                        }
                        else if (nextImage !== '-')
                        {
                            let nextImageElement = document.querySelector('#radio-'+ variantID + '-' + nextImage);
                            console.log(nextImageElement);
                            console.log("nextImage");
                            console.log(nextImage);
                            if (nextImageElement){
                                nextImageElement.checked = true;
                            }
                        }
                    }
                    else if (nextImage !== '-')
                    {
                        let nextImageElement = document.querySelector('#radio-'+ variantID + '-' + nextImage);
                        console.log(nextImageElement);
                        console.log("nextImage");
                        console.log(nextImage);
                        if (nextImageElement){
                            nextImageElement.checked = true;
                        }
                    }

                    let dataImageIndex = element.getAttribute("data-image-index");

                    let findImageContainer = document.querySelector("#image-container-" + variantID + "-" + dataImageIndex);
                    findImageContainer.remove();
                }
            })

            function generateSlug(slug)
            {
                const turkishMap = {
                    "ç": "c", "ğ": "g", "ş": "s", "ü": "u", "ö": "o", "ı": "i",
                    "İ": "i", "Ç": "c", "Ğ": "g", "Ş": "s", "Ü": "u", "Ö": "o"
                };
                slug = slug.toLowerCase().replace(/[çşğüöıİÇŞĞÜÖ]/g, match => turkishMap[match]);
                slug = slug.replace(/[\s\W-]+/g, '-').replace(/^-+|-+$/g, '');
                return slug;
            }

            flatpickr(".flatpickr-date", {
                wrap      : true,
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            feather.replace();

            function openFileManager()
            {
                var options = {
                    filebrowserImageBrowseUrl: '/admin/gdg-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/admin/gdg-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl     : '/admin/gdg-filemanager?type=Files',
                    filebrowserUploadUrl     : '/admin/gdg-filemanager/upload?type=Files&_token=',
                    type                     : "file"
                };

                var route_prefix = (options && options.prefix) ? options.prefix : '/admin/gdg-filemanager';


                var file_path = '';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items)
                {
                    file_path = items.map(function (item)
                                          {
                                              return item.url;
                                          }).join(',');
                    file_path = file_path + ",";

                    // set the value of the desired input to image url
                    targetInput.value = file_path;
                    targetInput.dispatchEvent(new Event('change'));

                    // clear previous preview
                    targetPreview.innerHTML = '';

                    // set or change the preview image src
                    selectedVariantImage(items, variantID, targetPreview);

                    targetPreview.dispatchEvent(new Event('change'));
                }
            }

            function selectedVariantImage(items, variantID, target_preview)
            {
                items.forEach(function (item, index)
                              {
                                  let container = createDiv("image-container", `image-container-${variantID}-${index}`);
                                  let radio = createInput("", `radio-${variantID}-${index}`, '', `featured_image`, 'radio', item.url);
                                  if (item.is_featured || index === 0) radio.checked = true;

                                  let prevIndex = index > 0 ? (index - 1) : '-';
                                  let nextIndex = index < (items.length - 1) ? (index+1) : '-';


                                  let iElement = createElement("i", "delete-variant-image", {
                                      "data-feather"    : "x",
                                      "data-url"        : item.url,
                                      "data-variant-id" : variantID,
                                      "data-image-index": index,
                                      "data-image-prev": prevIndex,
                                      "data-image-next": nextIndex
                                  });

                                  let label = createLabel("", `radio-${variantID}-${index}`);

                                  let img = createElement("img", "", {style: "height: 5rem", 'src': item.url})

                                  label.appendChild(img);
                                  container.appendChild(radio);
                                  container.appendChild(label);
                                  container.appendChild(iElement);
                                  target_preview.appendChild(container);
                                  feather.replace();
                              });
            }

            let variantSizeStockInfo = [];
            let sizeStock = variantSizeStockInfo[{{ $product->id }}]?.size_stock || 0;
            const sizes = @json($sizeRange);
            @foreach($product->sizeStock as $size)
                variantSizeStockInfo[{{$product->id}}] = {'size_stock': sizeStock + 1}
            sizeStock = sizeStock + 1;
            @endforeach



            function btnAddSizeAction(sizeValue = null, stockValue = null)
            {
                let dataVariantID = variantID;
                let sizeStock = variantSizeStockInfo[dataVariantID]?.size_stock || 0;
                let productSize = sizes;
                let options = ["Beden Seçebilirsiniz", ...productSize];
                let divID = 'sizeDiv';
                let findDiv = document.querySelector("#" + divID);

                let urunSizeID = 'size-' + dataVariantID + '-' + sizeStock;
                let urunSizeDiv = createDiv("col-md-5 mb-4 px-3")
                let urunSizeLabel = createLabel("form-label", urunSizeID, "Beden");

                let urunSizeSelect = createSelect("form-control", urunSizeID, `size[]`, options, sizeValue || null);
                urunSizeDiv.appendChild(urunSizeLabel);
                urunSizeDiv.appendChild(urunSizeSelect);

                let urunStockID = 'stock-' + dataVariantID + '-' + sizeStock;
                let urunStockDiv = createDiv("col-md-5 mb-4 px-3")
                let urunStockLabel = createLabel("form-label", urunStockID, "Stok Sayısı");
                let urunStockInput = createInput("form-control", urunStockID, 'Stok Sayısı', `stock[]`, 'number', stockValue || null);

                urunStockDiv.appendChild(urunStockLabel);
                urunStockDiv.appendChild(urunStockInput);

                let generalDivID = "sizeStockDeleteGeneral-" + dataVariantID + "-" + sizeStock;
                let urunSizeStockGeneralDivClass = "row mx-0 size-stock-" + dataVariantID;
                let urunSizeStockGeneralDiv = createDiv(urunSizeStockGeneralDivClass, generalDivID)

                let urunSizeStockDeleteDiv = createDiv("col-md-2 mb-4 px-3")
                let aElementID = "sizeStockDelete-" + dataVariantID + "-" + sizeStock;
                let urunSizeStokDeleteAElement = createElement("a", 'btn btn-danger w-100 btn-size-stock-delete', {id: aElementID, href: 'javascript:void(0)', 'data-size-stock-id': dataVariantID + '-' + sizeStock,});
                urunSizeStokDeleteAElement.textContent = 'Beden Sil';
                let urunSizeStokDeleteAElementLabel = createLabel("form-label d-block");
                urunSizeStokDeleteAElementLabel.innerHTML = '&nbsp;'
                urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElementLabel);
                urunSizeStockDeleteDiv.appendChild(urunSizeStokDeleteAElement);

                urunSizeStockGeneralDiv.appendChild(urunSizeDiv);
                urunSizeStockGeneralDiv.appendChild(urunStockDiv);
                urunSizeStockGeneralDiv.appendChild(urunSizeStockDeleteDiv);

                findDiv.appendChild(urunSizeStockGeneralDiv);

                variantSizeStockInfo[dataVariantID] = { 'size_stock' : sizeStock + 1};
            }
        });
    </script>
@endpush
