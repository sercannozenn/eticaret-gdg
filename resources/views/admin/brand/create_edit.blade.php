@extends('layouts.admin')
@section('title', 'Marka ' . (isset($brand) ? 'Güncelleme' : 'Ekleme'))

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">MARKA {{ isset($brand) ? 'GÜNCELLEME' : 'EKLEME' }}</h6>
            @php
                $currentRoute = !isset($brand) ? route('admin.brand.store') : route('admin.brand.update', $brand->id);
            @endphp
            <form class="forms-sample" action="{{ $currentRoute }}" method="POST" id="gdgForm"
                  enctype="multipart/form-data">
                @csrf
                @isset($brand)
                    @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="name" class="form-label">Marka Adı</label>
                    <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Marka Adı"
                           name="name" value="{{ isset($brand) ? $brand->name : old('name')}}">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug"
                           value="{{ isset($brand) ? $brand->slug : old('slug')}}">
                    @error('slug')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="status"
                           name="status" {{ isset($brand) ? ($brand->status ? 'checked': '') : (old('status') ? 'checked' : '') }}>
                    <label class="form-check-label" for="status">
                        Aktif mi?
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="is_featured"
                           name="is_featured" {{ isset($brand) ? ($brand->is_featured ? 'checked': '') : (old('is_featured') ? 'checked' : '') }}>
                    <label class="form-check-label" for="is_featured">
                        Marka Öne Çıkarılsın mı?
                    </label>
                </div>
                <div class="mb-3">
                    <label for="order" class="form-label">Sıra Numarası</label>
                    <input type="text" class="form-control" id="order" placeholder="Sıra Numarası" name="order"
                           value="{{ isset($brand) ? $brand->order : old('order')}}">
                    @error('order')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                @php
                $logoStatus = isset($brand) && file_exists($brand->logo);
                @endphp

                <div class="mb-3">
                    <div class="row">
                        <div @class([
                                                        'col-md-6' => $logoStatus,
                                                        'col-md-12' => !$logoStatus
                                                    ])>
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                            <small class="text-danger">En fazla 2mb logo yükleyebilirsiniz.</small>
                            @if(!$logoStatus && isset($brand))
                                <h5 class="text-warning">Daha önce logo eklenmemiştir.</h5>
                                <img src="{{ asset('assets/images/logo-placeholder.png') }}" height="200">
                            @endif
                            @error('logo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        @if($logoStatus)
                            <div class="col-md-6">
                                <img src="{{ asset($brand->logo) }}" class="img-fluid" style="max-height: 200px">
                            </div>
                        @endif
                    </div>

                </div>


                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
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
        });
    </script>
@endpush
