@extends('layouts.auth')
@section('title', 'Kayıt Ol')
@push('css') @endpush


@section('body')
    <div class="auth-form-wrapper px-4 py-5">
        <a href="#" class="noble-ui-logo d-block mb-2">GDG<span>ETicaret</span></a>

        <h5 class="text-muted fw-normal mb-4">Hoş geldiniz.</h5>
        <form class="forms-sample" id="verifyMailForm" action="{{ route('send-verify-mail') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Adresi</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
            </div>

            <div>
                <a href="javascript:void(0)" id="btnSendMail"
                   class="btn btn-primary me-2 mb-2 mb-md-0 text-white">Doğorulama Mailini Gönder</a>
            </div>
            <a href="{{ route('register') }}" class="d-block mt-3 text-muted">Hesap Oluştur</a>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/js/auth/verifySendMail.js') }}"></script>

@endpush
