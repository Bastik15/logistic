@extends('layouts.auth')

@section('content')
    {{-- Старая фоорма --}}

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



    {{-- Новая форма --}}
    <div class="main-wrap">
        <div class="main_content" style="margin-top: 30%;">
            <div class="header">
                Организация "Коммерческие склады"
                <br>
                <a href="{{ route('login') }}" class="stanlink">Вход</a> | <a href="{{ route('register') }}"
                    class="stanlink">Регистрация</a>
            </div>
            <div class="lineblock">
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <input placeholder='Логин' id="email" type="email" name='email' value="{{ old('email') }}"
                    class="@error('email') is-invalid @enderror" required autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input placeholder='Пароль' id="password" type="password" name='password' value="{{ old('password') }}"
                    class="@error('password') is-invalid @enderror" required autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input placeholder='Повторите пароль' id="password-confirm" type="password" name="password_confirmation"
                    required autocomplete="new-password">

                <button class="buttons"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
      text-decoration: none;
      color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                    Регистрация
                </button>
            </form>
        </div>
    </div>
@endsection
