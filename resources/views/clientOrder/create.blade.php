@extends('layouts.default')
@section('content')
    <div class="main-wrap">
        <div class="main_content" style="margin-top: 10%;">
            <div class="header">
                <br>
                <div class="lineblock"></div>
                Заказ
            </div>
            <div class="lineblock">
            </div>
            <form action='{{ route('clientOrder.store') }}' method="POST">
                @csrf

                <input placeholder='Имя' id="title" type="title" name='title' value="{{ old('title') }}"
                    class="@error('title') is-invalid @enderror" required autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input placeholder='Дата' type='date' name='deadline' required>

                <input class="buttons" type="submit" value="Добавить товары"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
text-decoration: none;
color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
            </form>

            <form action="{{ route('clientOrder.index') }}">
                <button class="buttons"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
text-decoration: none;
color: white; font-family: 'Poiret One', cursive; cursor: pointer;">Выход</button>
            </form>

        </div>
    </div>
@endsection
