@extends('layouts.default')
@section('content')
    <div class="main-wrap">
        <div class="main_content" style="margin-top: 10%;">
            <div class="header">
                Система учета товаров на складе
                <br>
                <div class="lineblock">
                </div>
                Добавить контрагента
            </div>
            <div class="lineblock">
            </div>
            <form action="{{ route('partner.store') }}" method="POST">
                @csrf
                <input placeholder='Имя' id="title" type="title" name='title' value="{{ old('title') }}"
                    class="@error('title') is-invalid @enderror" required autofocus>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <select name='role_id' style="min-width: 88%;">
                    @foreach ($roles as $role)
                        <option value='{{ $role->id }}'>{{ $role->name }}</option>
                    @endforeach
                </select>
                <button class="buttons"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
  text-decoration: none;
  color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                    Добавить
                </button>
            </form>
        </div>
    </div>
@endsection
