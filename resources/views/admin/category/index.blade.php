@extends('layouts.admin')
@section('title', 'Kategori Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Kategori Listesi</h6>
            <x-filter-form :filters="$filters" action="{{ route('admin.category.index') }}"/>

            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'id')]) data-order="id">
                            #
                            {!!   (request('order_by') == 'id' && request('order_direction') == 'asc') || request('order_by') == null ? '<i data-feather="chevron-down"></i>' :
                                  (request('order_by') == 'id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}

                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'name')]) data-order="name">
                            Kategori Adı
                            {!!   request('order_by') == 'name' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                 (request('order_by') == 'name' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}

                        </th>
                        <th>Slug</th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'parent_id')]) data-order="parent_id">
                            Üst Kategori
                            {!!   request('order_by') == 'parent_id' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                 (request('order_by') == 'parent_id' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}
                        </th>
                        <th @class(['order-by', 'text-primary fw-bolder'=> (request('order_by') == 'status')]) data-order="status">
                            Durum
                            {!!   request('order_by') == 'status' && request('order_direction') == 'asc' ? '<i data-feather="chevron-down"></i>' :
                                 (request('order_by') == 'status' &&  request('order_direction') == 'desc' ? '<i data-feather="chevron-up"></i>' : '') !!}

                        </th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->parentCategory?->name }}</td>
                            <td>
                                @if($category->status)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-status"
                                       data-id="{{ $category->id }}">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-status"
                                       data-id="{{ $category->id }}">Pasif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>
                                <a href="javascript:void(0)">
                                    <i data-id="{{ $category->id }}" data-name="{{ $category->name }}"
                                       class="text-danger btn-delete-category"
                                       data-feather="trash"></i></a>
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
                    {{ $categories->links() }}
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

                if (element.classList.contains('btn-delete-category'))
                {
                    let catName = element.getAttribute('data-name');
                    Swal.fire({
                                  title            : catName + " Kategorisini silmek istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataID = element.getAttribute('data-id');
                                              let route = '{{ route('admin.category.destroy', ['category' => 'gdg_cat']) }}';
                                              route = route.replace('gdg_cat', dataID);
                                              deleteForm.action = route;

                                              setTimeout(deleteForm.submit(), 100);
                                          }
                                          else if (result.isDenied)
                                          {
                                              Swal.fire("Kategori silinmedi.", "", "info");
                                          }
                                      });

                }

                if (element.classList.contains('btn-change-status'))
                {
                    let dataID = element.getAttribute('data-id');

                    let data = {
                        id: dataID
                    };

                    fetch('{{ route('admin.category.change-status') }}', {
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
                                    Swal.fire("Kategori durumu güncellenemedi.", "Hata alındı.", "info");
                                }
                                return response.json();
                            })
                      .then(data =>
                            {
                                element.textContent = data.status ? "Aktif" : "Pasif";
                                if (data.status)
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

                function removeIElements()
                {
                    let findIElements = document.querySelectorAll('th svg');
                    findIElements.forEach(i =>
                                          {
                                              i.remove();
                                          })
                }
            });


        });


    </script>
@endpush
