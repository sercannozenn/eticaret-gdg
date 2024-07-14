@extends('layouts.admin')
@section('title', 'İndirim Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">İndirim Listesi</h6>

            <x-filter-form :filters="$filters" action="{{ route('admin.discount.index') }}" />

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'id' || is_null(request('order_by')))])
                            data-order="id">#
                            {!!   (request('order_by') == 'id' && request('order_direction') == 'asc') || request('order_by') == null ? '<i data-feather="chevron-down"></i>' :
                            (request('order_by') == 'id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'name']) data-order="name">
                            İndirim Adı
                            {!!   request('order_by') == 'name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'type']) data-order="type">
                            İndirim Türü
                            {!!   request('order_by') == 'type' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'type' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'value']) data-order="value">
                            İndirim Değeri
                            {!!   request('order_by') == 'value' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'value' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'status']) data-order="status">
                            Durum
                            {!!   request('order_by') == 'status' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'status' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'start_date']) data-order="start_date">
                            İndirim Başlangıç Tarihi
                            {!!   request('order_by') == 'start_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'start_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'end_date']) data-order="end_date">
                            İndirim Bitiş Tarihi
                            {!!   request('order_by') == 'end_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'end_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th>İşlemler</th>
                        <th>Atamalar</th>
                        <th>Listeler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->name }}</td>
                            <td>{{ getDiscountType(\App\Enums\DiscountType::tryFrom($discount->type)) }}</td>
                            <td>{{ $discount->value }}</td>
                            <td>
                                @if($discount->status)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-status"
                                       data-id="{{ $discount->id }}">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-status"
                                       data-id="{{ $discount->id }}">Pasif</a>
                                @endif
                            </td>
                            <td>{{ $discount->start_date }}</td>
                            <td>{{ $discount->end_date }}</td>
                            <td>
                                <a href="{{ route('admin.discount.edit', ['discount' => $discount->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>
                                <a href="javascript:void(0)">
                                    <i data-id="{{ $discount->id }}" data-name="{{ $discount->name }}"
                                       class="text-danger btn-delete-discount"
                                       data-feather="trash"></i></a>

                            </td>
                            <td>
                                <a href="{{ route('admin.discount.assign-products', $discount->id) }}" class="btn btn-primary p-1" title="Ürüne İndirim Atama">
                                    <i data-feather="box"></i>
                                </a>
                                <a href="{{ route('admin.discount.assign-categories', $discount->id) }}" class="btn btn-success p-1" title="Kategoriye İndirim Atama">
                                    <i data-feather="grid"></i>
                                </a>
                                <a href="{{ route('admin.discount.assign-brands', $discount->id) }}" class="btn btn-info p-1" title="Markaya İndirim Atama">
                                    <i data-feather="shield"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.discount.show-products-list', $discount->id) }}" class="btn btn-primary p-1" title="Ürüne Listesi">
                                    <i data-feather="box"></i>
                                </a>
                                <a href="{{ route('admin.discount.show-categories-list', $discount->id) }}" class="btn btn-success p-1" title="Kategoriye Listesi">
                                    <i data-feather="grid"></i>
                                </a>
                                <a href="{{ route('admin.discount.show-brands-list', $discount->id) }}" class="btn btn-info p-1" title="Markaya Listesi">
                                    <i data-feather="shield"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
                <div class="col-6 mx-auto mt-3">
                    {{ $discounts->withQueryString()->links() }}
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
                                              let route = '{{ route('admin.discount.destroy', ['discount' => 'gdg_cat']) }}';
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

                if (element.classList.contains('btn-change-status'))
                {
                    // let dataID = element.getAttribute('data-id');
                    let dataID = 5;

                    let data = {
                        id: dataID
                    };

                    fetch('{{ route('admin.discount.change-status') }}', {
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
                                    return response.json()
                                                   .then(error => {
                                                       Swal.fire("İndirimin durumu güncellenemedi.", error?.message || 'Hata alındı', "info");
                                                   })
                                }
                                return response.json();
                            })
                      .then(data =>
                         {
                             element.textContent = data.status ? "Aktif" : "Pasif";
                             if(data.status)
                             {
                                 element.classList.add("btn-inverse-success");
                                 element.classList.remove('btn-inverse-danger')
                             }
                             else
                             {
                                 element.classList.remove("btn-inverse-success");
                                 element.classList.add('btn-inverse-danger')
                             }
                             Swal.fire("Başarılı.", element.textContent + " olarak güncellendi.", "success");
                         })
                }

                if (element.classList.contains('btn-change-is-featured'))
                {
                    let dataID = element.getAttribute('data-id');

                    let data = {
                        id: dataID
                    };

                    fetch('{{ route('admin.brand.change-is-featured') }}', {
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
                                    Swal.fire("Marka öne çıkarılma durumu güncellenemedi.", "Hata alındı.", "info");
                                }
                                return response.json();
                            })
                      .then(data =>
                            {
                                element.textContent = data.is_featured ? "Evet" : "Hayır";
                                if(data.is_featured)
                                {
                                    element.classList.add("btn-inverse-success");
                                    element.classList.remove('btn-inverse-danger')
                                }
                                else
                                {
                                    element.classList.remove("btn-inverse-success");
                                    element.classList.add('btn-inverse-danger')
                                }
                                Swal.fire("Başarılı.", element.textContent + " olarak güncellendi.", "success");


                            })
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
