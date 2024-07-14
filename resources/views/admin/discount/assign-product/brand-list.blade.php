@extends('layouts.admin')
@section('title', 'İndirimli Marka Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $discount->name }} </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Hakkında Bilgiler</h6>
                            <p class=""><b>İndirim Adı:</b> {{ $discount->name }}</p>
                            <p class=""><b>İndirim
                                    Türü:</b> {{ getDiscountType(\App\Enums\DiscountType::tryFrom($discount->type)) }}
                            </p>
                            <p class=""><b>İndirim Değeri:</b> {{ $discount->value }}</p>
                            <p class=""><b>Minimum Harcama Değeri:</b> {{ $discount->minimum_spend }}</p>
                            <p class=""><b>Başlangıç Tarihi:</b> {{ $discount->start_date }}</p>
                            <p class=""><b>Bitiş Tarihi Tarihi:</b> {{ $discount->end_date }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                    <x-filter-form :filters="$filters" custom-class="col-md-4"
                                   action="{{ route('admin.discount.show-brands-list', $discount->id) }}"/>
                </div>
                <div class="col-md-12">
                    <h6 class="card-title">İndirim Listesi</h6>

                    <div class="table-responsive pt-3" +>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'brands.id' || is_null(request('order_by')))])
                                    data-order="brands.id">#
                                    {!!   (request('order_by') == 'brands.id' && request('order_direction') == 'asc') || request('order_by') == null ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'brands.id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>
                                <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'brands.name']) data-order="brands.name">
                                    İndirimli Marka Adı
                                    {!!   request('order_by') == 'brands.name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                            (request('order_by') == 'brands.name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                                </th>

                                <th>İşlemler</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($discounts as $item)
                                <tr @class(['bg-info' => !is_null($item->deleted_at)])>
                                    <td>{{ $item->bId }}</td>
                                    <td>{{ $item->bName }}</td>
                                    <td>
                                        @if(is_null($item->deleted_at))
                                            <a href="javascript:void(0)">
                                                <i data-discount-id="{{ $discount->id }}"
                                                   data-brand-id="{{ $item->bId }}"
                                                   data-name="{{ $item->bName }}"
                                                   class="text-danger btn-delete-discount"
                                                   data-feather="trash"></i></a>
                                        @else
                                            <a href="javascript:void(0)">
                                                <i data-discount-id="{{ $discount->id }}"
                                                   data-brand-id="{{ $item->bId }}"
                                                   data-discount-brand-id="{{ $item->dbId }}"
                                                   data-name="{{ $item->bName }}"
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
                            <input type="hidden" name="discount_brand_id" id="discount_brand_id">
                            @csrf
                            @method('PUT')
                        </form>
                        <div class="col-6 mx-auto mt-3">
                            {{ $discounts->withQueryString()->links() }}
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
            let discountBrandIdElement = document.querySelector("#discount_brand_id");
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
                                                  let dataBrandID = element.getAttribute('data-brand-id');
                                                  let route = '{{ route('admin.discount.remove-brand', ['discount' => 'gdg_cat_discount',
                                                                                                        'brand' => 'gdg_cat_brand']) }}';
                                                  route = route.replace('gdg_cat_discount', dataDiscountID)
                                                               .replace('gdg_cat_brand', dataBrandID);
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
                                              let dataBrandID = element.getAttribute('data-brand-id');
                                              discountBrandIdElement.value = element.getAttribute('data-discount-brand-id');
                                              let route = '{{ route('admin.discount.restore-brand', ['discount' => 'gdg_cat_discount',
                                                                                                     'brand' => 'gdg_cat_brand']) }}';
                                              route = route.replace('gdg_cat_discount', dataDiscountID)
                                                           .replace('gdg_cat_brand', dataBrandID);
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
