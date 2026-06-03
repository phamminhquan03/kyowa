@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center min-vh-75">

        <div class="col-md-6 col-lg-5">

            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">
                        <h2 class="fw-bold">Đăng nhập</h2>
                        <p class="text-muted">
                            Chào mừng bạn quay trở lại hệ thống
                        </p>
                    </div>

                    <x-auth-session-status
                        class="alert alert-success"
                        :status="session('status')"
                    />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control form-control-lg"
                                value="{{ old('email') }}"
                                placeholder="Nhập email"
                                required
                            >

                            @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Mật khẩu
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control form-control-lg"
                                placeholder="Nhập mật khẩu"
                                required
                            >

                            @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        {{-- Remember --}}
                        <div class="form-check mb-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                            >

                            <label class="form-check-label" for="remember">
                                Ghi nhớ đăng nhập
                            </label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="text-decoration-none">
                                    Quên mật khẩu?
                                </a>
                            @endif

                            <a href="{{ route('register') }}"
                               class="text-decoration-none">
                                Đăng ký
                            </a>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary btn-lg w-100 rounded-3"
                        >
                            Đăng nhập
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>
</div>
@endsection