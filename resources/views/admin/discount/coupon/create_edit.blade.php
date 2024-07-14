@extends('layouts.admin')
@section('title', 'İndirim Kodu' . (isset($discount) ? 'Güncelleme' : 'Ekleme'))

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}">
    <style>
        .select2-container--focus.select2-container--default .select2-selection--single,
        .select2-container--focus.select2-container--default .select2-selection--multiple{
            border: 1px solid #e9ecef;
        }
        .select2-container .select2-selection--single{
            height: 38px;
            border: 1px solid #e9ecef;
        }
        .select2-selection__rendered:focus-visible{
            outline: unset;
        }
    </style>
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">İNDİRİM KODU{{ isset($discount) ? 'GÜNCELLEME' : 'EKLEME' }}</h6>
            @php
                $currentRoute = !isset($discount) ? route('admin.discount-coupons.store') : route('admin.discount-coupons.update', $discount->id);
            @endphp
            <form class="forms-sample row" action="{{ $currentRoute }}" method="POST" id="gdgForm"
                  enctype="multipart/form-data" >
                @csrf
                @isset($discount)
                    @method('PUT')
                @endisset
                <div class="col-md-6 mb-3">
                    <label for="code" class="form-label">İndirim Kodu</label>
                    <input type="text" class="form-control" id="code" autocomplete="off" placeholder="İndirim Kodu"
                           name="code" value="{{ isset($discount) ? $discount->code : old('code')}}">
                    @error('code')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="discount_id" class="form-label">İndirim Tanımlaması</label>
                    <select class="form-select select-discounts" id="discount_id" name="discount_id" data-width="100%">
                        <option selected="selected" value="-1">İndirim Türü Seçebilirsiniz</option>
                        @foreach($discounts as $itemDiscount)
                            <option value="{{ $itemDiscount->id }}" {{ isset($discount) && $itemDiscount->id === $discount->discount_id ? 'selected' : '' }}>
                                {{ $itemDiscount->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="usage_limit" class="form-label">Maksimim Kullanım Limiti</label>
                    <input type="number" class="form-control" id="usage_limit" placeholder="Maksimim Kullanım Limiti" name="usage_limit"
                           value="{{ isset($discount) ? $discount->usage_limit : old('usage_limit')}}">
                    <div>Kullanım Sayısı: {{ isset($discount) ? $discount->used_count: '0' }}</div>
                    @error('usage_limit')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                    <label for="usage_limit" class="form-label">İndirim Kodu Son Kullanım Tarihi</label>

                    <div class="input-group flatpickr flatpickr-date">
                        <input class="form-control flatpickr-input active"
                               id="expiry_date"
                               placeholder="İndirim Kodu Son Kullanım Tarihi"
                               name="expiry_date"
                               type="text"
                               value="{{ isset($discount) ? $discount->expiry_date : old('expiry_date') }}"
                               data-input="">
                        <span class="input-group-text input-group-addon"><i data-feather="calendar"></i></span>
                    </div>
                </div>

                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/pickr/pickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            if ($(".select-discounts").length) {
                $(".select-discounts").select2();
            }

            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let code = document.querySelector("#code");
            let discount_id = document.querySelector("#discount_id");
            let usage_limit = document.querySelector("#usage_limit");
            let expiry_date = document.querySelector("#expiry_date");


            btnSubmit.addEventListener('click', function ()
            {
                if (code.value.trim().length < 1) {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim Code'unu yazınız.",
                                  icon : "warning"
                              });
                }else if (discount_id.value === '-1'){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim tanımlaması seçiniz.",
                                  icon : "warning"
                              });
                }else if (usage_limit.value.trim().length < 1){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen maksimum kullanım değerini yazınız.",
                                  icon : "warning"
                              });
                } else if (expiry_date.value.trim().length < 1){
                    Swal.fire({
                                  title: "Uyarı!",
                                  text : "Lütfen indirim kodunun son kulalnım tarihini seçiniz.",
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
