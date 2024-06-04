@extends('layouts.admin')
@section('title', 'Slider ' . (isset($slider) ? 'Güncelleme' : 'Ekleme'))

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/pickr/themes/classic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">Slider {{ isset($slider) ? 'GÜNCELLEME' : 'EKLEME' }}</h6>
            @php
                $currentRoute = !isset($slider) ? route('admin.slider.create') : route('admin.slider.edit', $slider->id);
            @endphp
            <form class="forms-sample" action="{{ $currentRoute }}" method="POST" id="gdgForm"
                  enctype="multipart/form-data">
                @csrf
                @isset($slider)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="status"
                               value="1"
                               name="status" {{ isset($slider) ? ($slider->status ? 'checked': '') : (old('status') ? 'checked' : '') }}>
                        <label class="form-check-label" for="status">
                            Aktif mi?
                        </label>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Slider Adı</label>
                        <input type="text" class="form-control" id="name" placeholder="Slider Adı" name="name"
                               value="{{ isset($slider) ? $slider->name : old('name')}}">
                        @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="order" class="form-label">Sıra Numarası</label>
                        <input type="number" class="form-control" id="order" placeholder="Sıra Numarası" name="order"
                               value="{{ isset($slider) ? $slider->order : old('order')}}">
                        @error('order')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    @php
                        $logoStatus = isset($slider) && file_exists($slider->path);
                    @endphp

                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div @class([
                                                        'col-md-6' => $logoStatus,
                                                        'col-md-12' => !$logoStatus
                                                    ])>
                                <label for="path" class="form-label">Slider Görseli</label>
                                <input type="file" class="form-control" id="path" name="path">
                                <small class="text-danger">En fazla 2mb logo yükleyebilirsiniz.</small>
                                @if(!$logoStatus && isset($slider))
                                    <h5 class="text-warning">Daha önce logo eklenmemiştir.</h5>
                                    <img src="{{ asset('assets/images/"logo"-placeholder.png') }}" height="200">
                                @endif
                                @error('logo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            @if($logoStatus)
                                <div class="col-md-6">
                                    <img src="{{ asset($slider->path) }}" class="img-fluid" style="max-height: 200px">
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="input-group flatpickr flatpickr-date">
                            <input class="form-control flatpickr-input active"
                                   id="release_start"
                                   placeholder="Yayınlanma Tarihi"
                                   name="release_start"
                                   type="text"
                                   value=""
                                   data-input="">
                            <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="input-group flatpickr flatpickr-date">
                            <input class="form-control flatpickr-input active"
                                   id="release_finish"
                                   placeholder="Yayınlanma Tarihi"
                                   name="release_finish"
                                   type="text"
                                   value=""
                                   data-input="">
                            <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                        </div>

                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">1.Satır Yazısı</label>
                        <input type="text" class="form-control" id="row_1_text" autocomplete="off"
                               placeholder="1.Satır Yazısı"
                               name="row_1_text"
                               value="{{ isset($slider) ? $slider->row_1_text : old('row_1_text')}}">
                        @error('row_1_text')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="row_1_css" class="form-label">1.Satır Yazı CSS Kodu</label>
                        <input type="hidden" name="row_1_css">
                        <textarea id="row_1_css" class="ace-editor w-100"></textarea>
                        @error('row_1_css')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">1.Satır Yazı Renk Kodu</label>
                        <div id="row_1_color_button"></div>
                        <input type="hidden" name="row_1_color" id="row_1_color" value="">
                        @error('row_1_color')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">2.Satır Yazısı</label>
                        <input type="text" class="form-control" id="row_2_text" autocomplete="off"
                               placeholder="2.Satır Yazısı"
                               name="row_2_text"
                               value="{{ isset($slider) ? $slider->row_2_text : old('row_2_text')}}">
                        @error('row_2_text')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="row_2_css" class="form-label">2.Satır Yazı CSS Kodu</label>
                        <input type="hidden" name="row_2_css">
                        <textarea id="row_2_css" class="ace-editor w-100"></textarea>
                        @error('row_2_css')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">2.Satır Yazı Renk Kodu</label>
                        <div id="row_2_color_button"></div>
                        <input type="hidden" name="row_2_color" id="row_2_color" value="">
                        @error('row_2_color')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="button_text" class="form-label">Button Yazısı</label>
                        <input type="text" class="form-control" id="button_text" autocomplete="off"
                               placeholder="Button Yazısı"
                               name="button_text"
                               value="{{ isset($slider) ? $slider->button_text : old('button_text')}}">
                        @error('button_text')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="button_url" class="form-label">Button URL(Link)</label>
                        <input type="text" class="form-control" id="button_url" autocomplete="off"
                               placeholder="Button URL (Link)"
                               name="button_url"
                               value="{{ isset($slider) ? $slider->button_url : old('button_url')}}">
                        @error('button_url')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="button_target" class="form-label">Button Yazı Renk Kodu</label>
                        <select name="button_target" id="button_target" class="form-select">
                            <option value="self">Aynı Sayfada</option>
                            <option value="_blank">Farklı Sekmede</option>
                        </select>
                        @error('button_color')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_css" class="form-label">Button CSS Kodu</label>
                        <input type="hidden" name="button_css">
                        <textarea id="button_css" class="ace-editor w-100"></textarea>
                        @error('button_css')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="button_color" class="form-label">Button Yazı Renk Kodu</label>
                        <div id="button_text_color_button"></div>
                        <input type="hidden" name="button_color" id="button_color" value="">
                        @error('button_color')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/ace-builds/src-min/ace.js') }}"></script>
    <script src="{{ asset('assets/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let row1ColorInput = document.querySelector('#row_1_color');
            let row2ColorInput = document.querySelector('#row_2_color');
            let buttonColorInput = document.querySelector('#button_color');

            let row1CssInput = document.querySelector("[name='row_1_css']");
            let row2CssInput = document.querySelector("[name='row_2_css']");
            let buttonCssInput = document.querySelector("[name='button_css']");

            const row1ColorButton = Pickr.create({
                                                     el     : '#row_1_color_button',
                                                     theme  : 'classic', // or 'monolith', or 'nano',
                                                     default: '{{ isset($slider) ? $slider->row_1_color : '' }}',

                                                     swatches: [
                                                         'rgba(244, 67, 54, 1)',
                                                         'rgba(233, 30, 99, 0.95)',
                                                         'rgba(156, 39, 176, 0.9)',
                                                         'rgba(103, 58, 183, 0.85)',
                                                         'rgba(63, 81, 181, 0.8)',
                                                         'rgba(33, 150, 243, 0.75)',
                                                         'rgba(3, 169, 244, 0.7)',
                                                         'rgba(0, 188, 212, 0.7)',
                                                         'rgba(0, 150, 136, 0.75)',
                                                         'rgba(76, 175, 80, 0.8)',
                                                         'rgba(139, 195, 74, 0.85)',
                                                         'rgba(205, 220, 57, 0.9)',
                                                         'rgba(255, 235, 59, 0.95)',
                                                         'rgba(255, 193, 7, 1)'
                                                     ],

                                                     components: {

                                                         // Main components
                                                         preview: true,
                                                         opacity: true,
                                                         hue    : true,

                                                         // Input / output Options
                                                         interaction: {
                                                             hex  : true,
                                                             rgba : true,
                                                             hsla : true,
                                                             hsva : true,
                                                             cmyk : true,
                                                             input: true,
                                                             clear: true,
                                                             save : true
                                                         }
                                                     }
                                                 });
            row1ColorButton.on('save', function (color, instance)
            {
                row1ColorInput.value = color.toHEXA().toString();
            });

            const row2ColorButton = Pickr.create({
                                                     el     : '#row_2_color_button',
                                                     theme  : 'classic', // or 'monolith', or 'nano',
                                                     default: '{{ isset($slider) ? $slider->row_2_color : '' }}',

                                                     swatches: [
                                                         'rgba(244, 67, 54, 1)',
                                                         'rgba(233, 30, 99, 0.95)',
                                                         'rgba(156, 39, 176, 0.9)',
                                                         'rgba(103, 58, 183, 0.85)',
                                                         'rgba(63, 81, 181, 0.8)',
                                                         'rgba(33, 150, 243, 0.75)',
                                                         'rgba(3, 169, 244, 0.7)',
                                                         'rgba(0, 188, 212, 0.7)',
                                                         'rgba(0, 150, 136, 0.75)',
                                                         'rgba(76, 175, 80, 0.8)',
                                                         'rgba(139, 195, 74, 0.85)',
                                                         'rgba(205, 220, 57, 0.9)',
                                                         'rgba(255, 235, 59, 0.95)',
                                                         'rgba(255, 193, 7, 1)'
                                                     ],

                                                     components: {

                                                         // Main components
                                                         preview: true,
                                                         opacity: true,
                                                         hue    : true,

                                                         // Input / output Options
                                                         interaction: {
                                                             hex  : true,
                                                             rgba : true,
                                                             hsla : true,
                                                             hsva : true,
                                                             cmyk : true,
                                                             input: true,
                                                             clear: true,
                                                             save : true
                                                         }
                                                     }
                                                 });
            row2ColorButton.on('save', function (color, instance)
            {
                row2ColorInput.value = color.toHEXA().toString();
            })

            const buttonColorButton = Pickr.create({
                                                       el     : '#button_text_color_button',
                                                       theme  : 'classic', // or 'monolith', or 'nano',
                                                       default: '{{ isset($slider) ? $slider->button_color : '' }}',

                                                       swatches: [
                                                           'rgba(244, 67, 54, 1)',
                                                           'rgba(233, 30, 99, 0.95)',
                                                           'rgba(156, 39, 176, 0.9)',
                                                           'rgba(103, 58, 183, 0.85)',
                                                           'rgba(63, 81, 181, 0.8)',
                                                           'rgba(33, 150, 243, 0.75)',
                                                           'rgba(3, 169, 244, 0.7)',
                                                           'rgba(0, 188, 212, 0.7)',
                                                           'rgba(0, 150, 136, 0.75)',
                                                           'rgba(76, 175, 80, 0.8)',
                                                           'rgba(139, 195, 74, 0.85)',
                                                           'rgba(205, 220, 57, 0.9)',
                                                           'rgba(255, 235, 59, 0.95)',
                                                           'rgba(255, 193, 7, 1)'
                                                       ],

                                                       components: {

                                                           // Main components
                                                           preview: true,
                                                           opacity: true,
                                                           hue    : true,

                                                           // Input / output Options
                                                           interaction: {
                                                               hex  : true,
                                                               rgba : true,
                                                               hsla : true,
                                                               hsva : true,
                                                               cmyk : true,
                                                               input: true,
                                                               clear: true,
                                                               save : true
                                                           }
                                                       }
                                                   });
            buttonColorButton.on('save', function (color, instance)
            {
                buttonColorInput.value = color.toHEXA().toString();
            })

            var row_1_css_editor = ace.edit("row_1_css", {
                selectionStyle: 'text'
            });
            row_1_css_editor.setTheme("ace/theme/dracula");
            row_1_css_editor.getSession().setMode("ace/mode/scss");
            row_1_css_editor.setOption("showPrintMargin", false);

            var row_2_css_editor = ace.edit("row_2_css");
            row_2_css_editor.setTheme("ace/theme/dracula");
            row_2_css_editor.getSession().setMode("ace/mode/scss");
            row_2_css_editor.setOption("showPrintMargin", false)

            var button_css_editor = ace.edit("button_css");
            button_css_editor.setTheme("ace/theme/dracula");
            button_css_editor.getSession().setMode("ace/mode/scss");
            button_css_editor.setOption("showPrintMargin", false)
            @isset($slider)
            row_1_css_editor.setValue('{{ $slider->row_1_css }}');
            row_2_css_editor.setValue('{{ $slider->row_2_css }}');
            button_css_editor.setValue('{{ $slider->button_css }}');
            @endisset

            flatpickr(".flatpickr-date", {
                wrap      : true,
                enableTime: false,
                dateFormat: "Y-m-d",
            });

            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let path = document.querySelector("#path");

            btnSubmit.addEventListener('click', function ()
            {
                row1CssInput.value = row_1_css_editor.getValue();
                row2CssInput.value = row_2_css_editor.getValue();
                buttonCssInput.value = button_css_editor.getValue();


                let images = path.files;
                console.log(images);
                if (!images.length)
                {
                    Swal.fire({
                                  title: 'Uyarı!',
                                  text : 'Slider için görsel seçmediniz',
                                  icon : 'warning'
                              });
                }
                else
                {
                    let image = images[0];
                    let validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
                    let maxSize = 2 * 1024 * 1024;
                    if (!validTypes.includes(image.type))
                    {
                        Swal.fire({
                                      title: 'Uyarı!',
                                      text : 'Görseliniz jpg, jpeg, png ya da webp türlerinde olabilir.',
                                      icon : 'warning'
                                  });
                    }
                    else if (image.size > maxSize)
                    {
                        Swal.fire({
                                      title: 'Uyarı!',
                                      text : 'Görseliniz en fazla 2MB olmalıdır.',
                                      icon : 'warning'
                                  });
                    }
                    else
                    {
                        gdgForm.submit();
                    }
                }
            });
        });
    </script>
@endpush
