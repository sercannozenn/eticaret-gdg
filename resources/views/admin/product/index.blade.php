@extends('layouts.admin')
@section('title', 'Ürün Listesi')

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Ürün LİSTESİ</h6>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad</th>
                        <th>Fiyat</th>
                        <th>Kategori</th>
                        <th>Marka</th>
                        <th>Ürün Türü</th>
                        <th>Durum</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->category->name  }}</td>
                            <td>{{ $product->brand->name  }}</td>
                            <td>{{ $product->type->name  }}</td>
                            <td>
                                @if($product->status)
                                    <a href="javascript:void(0)" class="btn btn-inverse-success btn-change-status"
                                       data-id="{{ $product->id }}">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" class="btn btn-inverse-danger btn-change-status"
                                       data-id="{{ $product->id }}">Pasif</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.product.edit', ['products_main' => $product->id]) }}"><i
                                        class="text-warning" data-feather="edit"></i></a>
                                <a href="javascript:void(0)">
                                    <i data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                       class="text-danger btn-delete-product"
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
{{--                    {{ $brands->links() }}--}}
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
                             if(data.status) {
                                 element.classList.add("btn-inverse-success");
                                 element.classList.remove('btn-inverse-danger')
                             }
                             else {
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
