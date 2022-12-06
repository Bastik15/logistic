@extends('layouts.default')
@section('content')
    <div class="main-wrap">
        <div class="main_content" style="margin-top: 10%;">
            <div class="header">
                Система учета товаров на складе
                <br>
                <div class="lineblock">
                </div>
                Новый пользователь
            </div>
            <div class="lineblock">
            </div>
            <form action="{{ route('users.store') }}" method="POST">
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

                <p style="color: white; margin-bottom: 2px; margin-top: 6px;">Ваша роль:</p>
                <select name='role_id' style="min-width: 88%;">

                    <option value='3'>Менеджер</option>
                    <option value='4'>Работник склада</option>
                    <option value='5'>Водитель</option>
                </select>
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
