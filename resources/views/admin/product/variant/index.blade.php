@extends('layouts.admin')
@section('title', 'Ürün Variant Listesi')

@push("css")
    <style>
        #filter-form {
            min-height: 80px;
            max-height: max-content;
            height: 80px;
            overflow: hidden;
            transition: all 1s ease;
            resize: vertical;
        }
    </style>
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Ürün Variant Listesi</h6>

            <x-filter-form custom-class="col-md-3" :filters="$filters" action="{{ route('admin.product.variant.list') }}" />
            <div class="row justify-content-end mt-4">
                <div class="col-md-4">
                    <a href="javascript:void(0)" id="showFilter" class="btn btn-info float-end"
                       title="Filterleri Gör"><i data-feather="eye"></i></a>
                </div>
            </div>
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
                            Ürün Adı
                            {!!   request('order_by') == 'name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'variant_name']) data-order="variant_name">
                            Ürün Varyant Adı
                            {!!   request('order_by') == 'variant_name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'variant_name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th>
                            Ürün Kategori Adı
                        </th>
                        <th>
                            Ürün Marka Adı
                        </th>
                        <th>
                            Ürün Türü
                        </th>
                        <th>
                            Cinsiyet
                        </th>
                        <th>Slug</th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'status']) data-order="status">
                            Durum
                            {!!   request('order_by') == 'status' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                (request('order_by') == 'status' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'final_price']) data-order="final_price">
                            Son Fiyat
                            {!!   request('order_by') == 'final_price' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'final_price' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> request('order_by') == 'publish_date']) data-order="publish_date">
                            Yayın Tarihi
                            {!!   request('order_by') == 'publish_date' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                    (request('order_by') == 'publish_date' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->variant_name }}</td>
                            <td>{{ $product->cname }}</td>
                            <td>{{ $product->bname }}</td>
                            <td>{{ $product->typename }}</td>
                            <td>{{getGender( \App\Enums\Gender::tryFrom($product->gender) )}}</td>
                            <td>{{ $product->slug }}</td>
                            <td>
                                @if($product->status)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-status"
                                       data-id="{{ $product->id }}">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-status"
                                       data-id="{{ $product->id }}">Pasif</a>
                                @endif
                            </td>
                            <td>{{ $product->final_price }}</td>
                            <td>{{ $product->publish_date }}</td>
                            <td>
                                <a href="{{ route('admin.product.variant.edit', ['variant' => $product->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>
                                <a href="javascript:void(0)">
                                    <i data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                       class="text-danger btn-delete-variant"
                                       data-feather="trash"></i></a>
                                <a href="{{ route('admin.brand.show-discounts', ['brand' => $product->id]) }}" title="İndirimleri Görüntüle"><i
                                        class="text-primary" data-feather="eye"></i></a>
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
{{--                    {{ $products->withQueryString()->links() }}--}}
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

                if (element.classList.contains('btn-delete-variant'))
                {
                    let catName = element.getAttribute('data-name');
                    Swal.fire({
                                  title            : catName + " variantını silmek istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataID = element.getAttribute('data-id');
                                              let route = '{{ route('admin.product.variant.delete', ['variant' => 'gdg_cat']) }}';
                                              route = route.replace('gdg_cat', dataID);
                                              deleteForm.action = route;

                                              setTimeout(deleteForm.submit(), 100);
                                          }
                                          else if (result.isDenied)
                                          {
                                              Swal.fire("Variant silinmedi.", "", "info");
                                          }
                                      });

                }

                if (element.classList.contains('btn-change-status'))
                {
                    let dataID = element.getAttribute('data-id');

                    let data = {
                        id: dataID
                    };

                    fetch('{{ route('admin.product.variant.change-status') }}', {
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
                                    Swal.fire("Ürün durumu güncellenemedi.", "Hata alındı.", "info");
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

            let showFilter = document.querySelector('#showFilter');
            showFilter.addEventListener('click', function ()
            {
                let filterForm = document.querySelector('#filter-form');
                if (filterForm.offsetHeight < filterForm.scrollHeight)
                {
                    filterForm.style.height = filterForm.scrollHeight + 'px';
                }
                else
                {
                    filterForm.style.height = '80px';
                }

            });
        });


    </script>
@endpush
