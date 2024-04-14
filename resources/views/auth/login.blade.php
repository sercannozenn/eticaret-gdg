@extends('layouts.auth')
@section('title', 'Kayıt Ol')
@push('css') @endpush


@section('body')
    <div class="auth-form-wrapper px-4 py-5">
        <a href="#" class="noble-ui-logo d-block mb-2">GDG<span>ETicaret</span></a>

        <h5 class="text-muted fw-normal mb-4">Hoş geldiniz. Hesabınıza giriş yapabilirsiniz.</h5>
        <form class="forms-sample">
            <div class="mb-3">
                <label for="email" class="form-label">Email Adresi</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Parola</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Parola">
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="authCheck" name="remember">
                <label class="form-check-label" for="authCheck">
                    Beni Hatırla!
                </label>
            </div>
            <div>
                <a href="javascript:void(0)" id="btnLogin"
                   class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Giriş Yap</a>
                <button type="button"
                        class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                    <i class="mdi mdi-google"></i>
                    Google İle Giriş Yap
                </button>
            </div>
            <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Hesap Oluştur</a>
        </form>
    </div>
@endsection

@push('js') @endpush
