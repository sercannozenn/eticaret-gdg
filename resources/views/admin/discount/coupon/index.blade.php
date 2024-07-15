@extends('layouts.admin')
@section('title', 'İndirim Kodu Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">İndirim Kodu Listesi</h6>

            <x-filter-form :filters="$filters" action="{{ route('admin.discount-coupons.index') }}" />

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'id' || is_null(request('order_by')))])
                            data-order="id">#
                            {!!   (request('order_by') == 'id' && request('order_direction') == 'asc') || request('order_by') == null ? '<i data-feather="chevron-down"></i>' :
                            (request('order_by') == 'id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'code']) data-order="code">
                            İndirim Kodu
                            {!!   request('order_by') == 'code' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'code' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'discount_id']) data-order="discount_id">
                            İndirim Tanımlaması
                            {!!   request('order_by') == 'discount_id' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'discount_id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'usage_limit']) data-order="usage_limit">
                            Maksimum Kullanım Değeri
                            {!!   request('order_by') == 'usage_limit' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'usage_limit' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'used_count']) data-order="used_count">
                            Kullanım Miktarı
                            {!!   request('order_by') == 'used_count' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'used_count' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'expiry_date']) data-order="expiry_date">
                            İndirim Kodu Son Kullanım Tarihi
                            {!!   request('order_by') == 'expiry_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'expiry_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($coupons as $coupon)
                        <tr @class(['bg-info' => !is_null($coupon->deleted_at)])>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->discount->name }}</td>
                            <td>{{ $coupon->usage_limit }}</td>
                            <td>{{ $coupon->used_count }}</td>
                            <td>{{ $coupon->expiry_date }}</td>
                            <td>
                                <a href="{{ route('admin.discount-coupons.edit', ['discount_coupon' => $coupon->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>


                                @if(is_null($coupon->deleted_at))
                                    <a href="javascript:void(0)">
                                        <i data-id="{{ $coupon->id }}"
                                           data-name="{{ $coupon->code }}"
                                           class="text-danger btn-delete-discount"
                                           data-feather="trash"></i>
                                    </a>
                                @else
                                    <a href="javascript:void(0)">
                                        <i data-discount-id="{{ $coupon->id }}"
                                           data-name="{{ $coupon->code }}"
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
                    @csrf
                    @method('PUT')
                </form>
                <div class="col-6 mx-auto mt-3">
                    {{ $coupons->withQueryString()->links() }}
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
                                              let dataID = element.getAttribute('data-id');
                                              let route = '{{ route('admin.discount-coupons.destroy', ['discount_coupon' => 'gdg_cat']) }}';
                                              route = route.replace('gdg_cat', dataID);
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
                                  title            : catName + " İndirim kodunu geri almak istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataDiscountID = element.getAttribute('data-discount-id');
                                              let route = '{{ route('admin.discount-coupons.restore', ['discount_coupon' => 'gdg_cat_discount']) }}';
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

                if(element.classList.contains('order-by')){
                    let dataOrder = element.getAttribute('data-order');
                    let orderByElement = document.querySelector('#order_by');
                    let orderDirectionElement = document.querySelector('#order_direction');
                    let filterForm = document.querySelector('#filter-form');

                    orderByElement.value = dataOrder;
                    removeIElements();

                    if(defaultOrderDirection === '' || defaultOrderDirection === null || defaultOrderDirection === undefined){
                        defaultOrderDirection = 'desc';

                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-up');
                        element.appendChild(iElement);

                    }else if(defaultOrderDirection === 'asc'){
                        defaultOrderDirection = 'desc'
                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-up');
                        element.appendChild(iElement);
                    }else{
                        defaultOrderDirection = 'asc';
                        let iElement = document.createElement('i');
                        iElement.setAttribute('data-feather', 'chevron-down');
                        element.appendChild(iElement);
                    }
                    orderDirectionElement.value =defaultOrderDirection;
                    feather.replace();
                    filterForm.submit();
                }
            });

            function removeIElements()
            {
                let findIElements = document.querySelectorAll('th svg');
                findIElements.forEach(i => {
                    i.remove();
                })
            }
        });


    </script>
@endpush
