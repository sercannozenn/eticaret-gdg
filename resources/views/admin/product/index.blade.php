@extends('layouts.admin')
@section('title', 'Ürün Listesi')

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
            <h6 class="card-title">Ürün LİSTESİ</h6>

            <x-filter-form :filters="$filters" action="" customClass="col-md-3" :disableButton="true"/>
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
                        <th class="order-by" data-order="products_main.id">#</th>
                        <th class="order-by" data-order="products_main.name">Ad</th>
                        <th>Fiyat</th>
                        <th class="order-by" data-order="categories.name">Kategori</th>
                        <th class="order-by" data-order="brands.name">Marka</th>
                        <th class="order-by" data-order="products_main.type_id">Ürün Türü</th>
                        <th class="order-by" data-order="products_main.status">Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody id="list-body">
                    </tbody>
                </table>
                <form action="" method="POST" id="deleteForm">
                    @csrf
                    @method('DELETE')
                </form>
                <div class="col-6 mx-auto mt-3">
                    <nav class="d-flex justify-items-center justify-content-between">
                        <div class="d-flex justify-content-between flex-fill d-sm-none">
                            <ul class="pagination">
                            </ul>
                        </div>
                        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
                            <div>
                                <ul class="pagination">
                                </ul>
                            </div>
                        </div>
                    </nav>
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

            document.querySelector('.table').addEventListener('click', function (event)
            {
                let element = event.target;

                if (element.classList.contains('btn-delete-product'))
                {
                    let catName = element.getAttribute('data-name');
                    Swal.fire({
                                  title            : catName + " ürününü silmek istediğinize emin misiniz?",
                                  showCancelButton : true,
                                  cancelButtonText : "Hayır",
                                  confirmButtonText: "Evet",
                              }).then((result) =>
                                      {
                                          if (result.isConfirmed)
                                          {
                                              let dataID = element.getAttribute('data-id');
                                              let route = '{{ route('admin.product.destroy', ['products_main' => 'gdg_cat']) }}';
                                              route = route.replace('gdg_cat', dataID);
                                              deleteForm.action = route;

                                              setTimeout(deleteForm.submit(), 100);
                                          }
                                          else if (result.isDenied)
                                          {
                                              Swal.fire("Ürün silinmedi.", "", "info");
                                          }
                                      });

                }

                if (element.classList.contains('btn-change-status'))
                {
                    let dataID = element.getAttribute('data-id');

                    let data = {
                        id: dataID
                    };

                    fetch('{{ route('admin.product.change-status') }}', {
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
                                    Swal.fire("Ürünün durumu güncellenemedi.", "Hata alındı.", "info");
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


            });

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

        var searchRoute = '{{ route('admin.product.search') }}';
        var editRoute = "{{ route('admin.product.edit', ['products_main' => 'main_id_val']) }}";
        var currentPage = "{{ request()->input('page', 1) }}";

    </script>
    <script src="{{ asset('assets/js/product/search.js') }}"></script>

@endpush
