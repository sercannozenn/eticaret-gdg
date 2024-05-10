@extends('layouts.admin')
@section('title', 'Marka Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Marka Listesi</h6>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Sıra Numarası</th>
                        <th>Marka Adı</th>
                        <th>Slug</th>
                        <th>Durum</th>
                        <th>Öne Çıkarılma Durumu</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{ $brand->id }}</td>
                            <td><img src="{{  asset($brand->logo) }}" alt="{{ $brand->name }}" width="100"></td>
                            <td>{{ $brand->order }}</td>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td>
                                @if($brand->status)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-status"
                                       data-id="{{ $brand->id }}">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-status"
                                       data-id="{{ $brand->id }}">Pasif</a>
                                @endif
                            </td>
                            <td>
                                @if($brand->is_featured)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-is-featured"
                                       data-id="{{ $brand->id }}">Evet</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-is-featured"
                                       data-id="{{ $brand->id }}">Hayır</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.brand.edit', ['brand' => $brand->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>
                                <a href="javascript:void(0)">
                                    <i data-id="{{ $brand->id }}" data-name="{{ $brand->name }}"
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
                    {{ $brands->links() }}
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
                                              let route = '{{ route('admin.brand.destroy', ['brand' => 'gdg_cat']) }}';
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

                    fetch('{{ route('admin.brand.change-status') }}', {
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
                                    Swal.fire("Marka durumu güncellenemedi.", "Hata alındı.", "info");
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
            });


        });


    </script>
@endpush
