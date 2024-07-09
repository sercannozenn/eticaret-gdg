@extends('layouts.admin')
@section('title', $data->title)

@push("css")
    <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}"
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">{{ $data->title }}</h6>

            <form class="forms-sample row" action="{{ $data->route }}" method="POST" id="gdgForm"
                  enctype="multipart/form-data" >
                @csrf
                <p class="col-md-2"> <b>İndirim Adı:</b> {{ $discount->name }}</p>
                <p class="col-md-2"> <b>İndirim Türü:</b> {{ getDiscountType(\App\Enums\DiscountType::tryFrom($discount->type)) }}</p>
                <p class="col-md-2"> <b>İndirim Değeri:</b> {{ $discount->value }}</p>
                <p class="col-md-2"> <b>Minimum Harcama Değeri:</b> {{ $discount->minimum_spend }}</p>
                <p class="col-md-2"> <b>Başlangıç Tarihi:</b> {{ $discount->start_date }}</p>
                <p class="col-md-2"> <b>Bitiş Tarihi Tarihi:</b> {{ $discount->end_date }}</p>
                <div class="col-md-12 my-3">
                    <label for="type" class="form-label">{{ $data->label }}</label>
                    <select class="js-example-basic-multiple form-select"
                            multiple="multiple"
                            data-width="100%"
                            id="{{ $data->select_id }}"
                            name="{{ $data->select_name }}[]"
                    >
                        @foreach($data->items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script src="{{ asset('assets/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let data_id = document.querySelector("#{{ $data->select_id }}");

            btnSubmit.addEventListener('click', function ()
            {
                 if (data_id.value === '')
                 {
                     Swal.fire({
                                   title: "Uyarı!",
                                   text : "{{ $data->message }}",
                                   icon : "warning"
                               });
                 } else {
                    gdgForm.submit();
                }
            });
        });
    </script>
@endpush
