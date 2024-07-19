@extends('layouts.admin')
@section('title', $data->name . ' İndirim Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $data->name }} </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                    <x-filter-form :filters="$filters" custom-class="col-md-4"
                                   action="{{ $filterRoute }}"/>
                </div>
                <div class="col-md-12">
                    <h6 class="card-title">İndirim Listesi</h6>

                    <div class="table-responsive pt-3" +>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'discounts.id' || is_null(request('order_by')))])
                                    data-order="discounts.id">#
                                    {!!   (request('order_by') == 'discounts.id' && request('order_direction') == 'asc') || request('order_by') == null ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'discounts.id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.name']) data-order="discounts.name">
                                    İndirim Adı
                                    {!!   request('order_by') == 'discounts.name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>

                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.type']) data-order="discounts.type">
                                    İndirim Türü
                                    {!!   request('order_by') == 'discounts.type' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.type' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.value']) data-order="discounts.value">
                                    İndirim Değeri
                                    {!!   request('order_by') == 'discounts.value' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.value' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.minimum_spend']) data-order="discounts.minimum_spend">
                                    Minimum Harcama Değeri
                                    {!!   request('order_by') == 'discounts.minimum_spend' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.minimum_spend' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.start_date']) data-order="discounts.start_date">
                                    İndirim Başlangıç Tarihi
                                    {!!   request('order_by') == 'discounts.start_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.start_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discounts.end_date']) data-order="discounts.end_date">
                                    İndirim Bitiş Tarihi
                                    {!!   request('order_by') == 'discounts.end_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'discounts.end_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>

                                <th>İşlemler</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discounts as $discount)
                                <tr @class(['bg-info' => !is_null($discount->pivot->deleted_at)])>
                                    <td>{{ $discount->id }}</td>
                                    <td>{{ $discount->name }}</td>
                                    <td>{{ getDiscountType(\App\Enums\DiscountType::tryFrom($discount->type)) }}</td>
                                    <td>{{ $discount->value }} </td>
                                    <td>{{ $discount->minimum_spend }} </td>
                                    <td>{{ $discount->start_date }} </td>
                                    <td>{{ $discount->end_date }} </td>
                                    <td>
                                        <a href="{{ route('admin.discount.edit', ['discount' => $discount->id]) }}"><i
                                                class="text-warning" data-feather="edit"></i></a>


                                        @if(is_null($discount->pivot->deleted_at))
                                            <a href="javascript:void(0)">
                                                <i data-discount-id="{{ $discount->pivot->discount_id }}"
                                                   data-dynamic-id="{{ $data->id }}"
                                                   data-name="{{ $discount->name }}"
                                                   class="text-danger btn-delete-discount"
                                                   data-feather="trash"></i></a>
                                        @else
                                            <a href="javascript:void(0)">
                                                <i data-discount-id="{{ $discount->pivot->discount_id }}"
                                                   data-dynamic-id="{{ $data->id }}"
                                                   data-discount-pivot-id="{{ $discount->pivot->id }}"
                                                   data-name="{{ $discount->name }}"
                                                   class="text-success btn-restore-discount"
                                                   data-feather="rotate-cw"></i></a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                        </form>
                        <form action="" method="POST" id="putForm">
                            <input type="hidden" name="{{ $restoreElementName }}" id="{{ $restoreElementName }}">
                            @csrf
                            @method('PUT')
                        </form>
                        <div class="col-6 mx-auto mt-3">
{{--                            {{ $discounts->withQueryString()->links() }}--}}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@push("js")
    <script>
        document.addEventListener('DOMContentLoaded', function ()
        {
            let deleteForm = document.querySelector("#deleteForm");
            let putForm = document.querySelector("#putForm");
            let discountDynamicIdElement = document.querySelector("#{{ $restoreElementName }}");
            let defaultOrderDirection = "{{ request('order_direction') }}";

            feather.replace();

            document.querySelector('.table').addEventListener('click', function (event)
            {
                let element = event.target;

                if (element.classList.contains('btn-delete-discount'))
                {
                    let catName = element.getAttribute('data-name');
                    Swal.fire({
                                  title            : catName + " İndirimini silmek istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataDiscountID = element.getAttribute('data-discount-id');
                                              let route = '{{ $deleteRoute }}';
                                              route = route.replace('gdg_cat_discount', dataDiscountID);

                                              deleteForm.action = route;

                                              setTimeout(deleteForm.submit(), 100);
                                          }
                                          else if (result.isDenied)
                                          {
                                              Swal.fire("İndirim silinmedi.", "", "info");
                                          }
                                      });

                }

                if (element.classList.contains('btn-restore-discount'))
                {
                    let catName = element.getAttribute('data-name');
                    Swal.fire({
                                  title            : catName + " İndirimini geri almak istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataDiscountID = element.getAttribute('data-discount-id');
                                              discountDynamicIdElement.value = element.getAttribute('data-discount-pivot-id');
                                              let route = '{{ $deleteRoute }}';
                                              route = route.replace('gdg_cat_discount', dataDiscountID);
                                              putForm.action = route;

                                              setTimeout(putForm.submit(), 100);
                                          }
                                          else if (result.isDenied)
                                          {
                                              Swal.fire("İndirim silinmedi.", "", "info");
                                          }
                                      });

                }


                if (element.classList.contains('order-by'))
                {
                    let dataOrder = element.getAttribute('data-order');
                    let orderByElement = document.querySelector('#order_by');
                    let orderDirectionElement = document.querySelector('#order_direction');
                    let filterForm = document.querySelector('#filter-form');

                    orderByElement.value = dataOrder;
                    removeIElements();

                    if (defaultOrderDirection === '' || defaultOrderDirection === null || defaultOrderDirection === undefined)
                    {
                        defaultOrderDirection = 'desc';

                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-up');
                        element.appendChild(iElement);

                    }
                    else if (defaultOrderDirection === 'asc')
                    {
                        defaultOrderDirection = 'desc'
                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-up');
                        element.appendChild(iElement);
                    }
                    else
                    {
                        defaultOrderDirection = 'asc';
                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-down');
                        element.appendChild(iElement);
                    }
                    orderDirectionElement.value = defaultOrderDirection;
                    feather.replace();
                    filterForm.submit();
                }
            });

            function removeIElements()
            {
                let findIElements = document.querySelectorAll('th svg');
                findIElements.forEach(i =>
                                      {
                                          i.remove();
                                      })
            }
        });


    </script>

@endpush
