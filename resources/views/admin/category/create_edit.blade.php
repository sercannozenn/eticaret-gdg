@extends('layouts.admin')
@section('title', 'Kategori ' . (isset($category) ? 'Güncelleme' : 'Ekleme'))

@push("css")
@endpush

@section('body')
    <div class="card">
        <div class="card-body">

            <h6 class="card-title">KATEGORİ {{ isset($category) ? 'GÜNCELLEME' : 'EKLEME' }}</h6>
            @php
                $currentRoute = !isset($category) ? route('admin.category.store') : route('admin.category.update', $category->id);
            @endphp
            <form class="forms-sample" action="{{ $currentRoute }}" method="POST" id="gdgForm">
                @csrf
                @isset($category)
                    @method('PUT')
                @endisset
                <div class="mb-3">
                    <label for="name" class="form-label">Kategori Adı</label>
                    <input type="text" class="form-control" id="name" autocomplete="off" placeholder="Kategori Adı" name="name" value="{{ isset($category) ? $category->name : old('name')}}">
                    @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{ isset($category) ? $category->slug : old('slug')}}">
                    @error('slug')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="status" name="status" {{ isset($category) ? ($category->status ? 'checked': '') : (old('status') ? 'checked' : '') }}>
                    <label class="form-check-label" for="status">
                        Aktif mi?
                    </label>
                </div>
                <div class="mb-3">
                    <label for="short_description" class="form-label">Kısa Açıklama</label>
                    <textarea name="short_description" id="short_description" rows="3" class="form-control">{{ isset($category) ? $category->short_description : old('short_description')}}</textarea>
                    @error('short_description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Açıklama</label>
                    <textarea name="description" id="description" rows="7" class="form-control">{{ isset($category) ? $category->description : old('description')}}</textarea>
                    @error('description')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Üst Kategori</label>
                    <select class="form-select" id="parent_id" name="parent_id">
                        <option selected="selected" value="-1">Üst Kategori Seçebilirsiniz</option>
                        @foreach($categories as $pCategory)
                            <option value="{{ $pCategory->id }}" {{ isset($category) && $pCategory->id === $category->parent_id ? 'selected' : '' }}>{{ $pCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="button" class="btn btn-primary me-2" id="btnSubmit">KAYDET</button>
            </form>

        </div>
    </div>
@endsection

@push("js")
    <script>
        document.addEventListener("DOMContentLoaded", function ()
        {
            let btnSubmit = document.querySelector("#btnSubmit");
            let gdgForm = document.querySelector("#gdgForm");
            let name = document.querySelector("#name");

            btnSubmit.addEventListener('click', function ()
            {
                if(name.value.trim().length < 1)
                {
                    Swal.fire({
                                  title: "Uyarı!",
                                  text: "Lütfen kategori adını yazınız.",
                                  icon: "warning"
                              });
                }
                else
                {
                    gdgForm.submit();
                }
            });
        });
    </script>
@endpush
