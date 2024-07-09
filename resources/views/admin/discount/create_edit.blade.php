@extends('layouts.admin')
@section('title', 'İndirim ' . (isset($discount) ? 'Güncelleme' : 'Ekleme'))

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">İNDİRİM {{ isset($discount) ? 'GÜNCELLEME' : 'EKLEME' }}</h6>
            @php
                $currentRoute = !isset($discount) ? route('admin.discount.store') : route('admin.discount.update', $discount->id);
            @endphp
            <form class="forms-sample row" action="{{ $currentRoute }}" method="POST" id="gdgForm"
                  enctype="multipart/form-data" >
                @csrf
                @isset($discount)
                    @method('PUT')
                @endisset
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">İndirim Adı</label>
                    <input type="text" class="form-control" id="name" autocomplete="off" placeholder="İndirim Adı"
                           name="name" value="{{ isset($discount) ? $discount->name : old('name')}}">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type" class="form-label">İndirim Türü</label>
                    <select class="form-select" id="type" name="type">
                        <option selected="selected" value="-1">İndirim Türü Seçebilirsiniz</option>
                        @foreach($types as $type)
                            <option value="{{ $type->value }}" {{ isset($discount) && $type->value === $discount->type ? 'selected' : '' }}>
                                {{ getDiscountType($type) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="value" class="form-label">İndirim Değeri</label>
                    <input type="number" class="form-control" id="value" placeholder="İndirim Değeri" name="value"
                           value="{{ isset($discount) ? $discount->value : old('value')}}">
                    @error('value')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="minimum_spend" class="form-label">Minimum Harcama Değeri</label>
                    <input type="number" class="form-control" id="minimum_spend" placeholder="Minimum Harcama Değeri" name="minimum_spend"
                           value="{{ isset($discount) ? $discount->minimum_spend : old('minimum_spend')}}">
                    @error('minimum_spend')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <div class="input-group flatpickr flatpickr-date">
                        <input class="form-control flatpickr-input active"
                               id="start_date"
                               placeholder="İndirim Başlangıç Tarihi"
                               name="start_date"
                               type="text"
                               value="{{ isset($discount) ? $discount->start_date : old('start_date') }}"
                               data-input="">
                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="input-group flatpickr flatpickr-date">
                        <input class="form-control flatpickr-input active"
                               id="end_date"
                               placeholder="İndirim Bitiş Tarihi"
                               name="end_date"
                               type="text"
                               value="{{ isset($discount) ? $discount->end_date : old('end_date') }}"
                               data-input="">
                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="status"
                           name="status" {{ isset($discount) ? ($discount->status ? 'checked': '') : (old('status') ? 'checked' : '') }}>
                    <label class="form-check-label" for="status">
                        Aktif mi?
                    </label>
                </div>

                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let name = document.querySelector("#name");
            let discountValue = document.querySelector("#value");
            let discountType = document.querySelector("#type");
            let startDate = document.querySelector("#start_date");
            let endDate = document.querySelector("#end_date");

            btnSubmit.addEventListener('click', function ()
            {
                if (name.value.trim().length < 1) {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim adını yazınız.",
                                  icon : "warning"
                              });
                }else if (discountType.value === '-1'){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim türü seçiniz.",
                                  icon : "warning"
                              });
                }else if (discountValue.value.trim().length < 1){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim değerini yazınız.",
                                  icon : "warning"
                              });
                } else if (startDate.value.trim().length < 1){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim başlangıç tarihini yazınız.",
                                  icon : "warning"
                              });
                } else if (endDate.value.trim().length < 1){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim bitiş tarihini yazınız.",
                                  icon : "warning"
                              });
                } else {
                    gdgForm.submit();
                }
            });


            flatpickr(".flatpickr-date", {
                wrap      : true,
                enableTime: false,
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endpush
