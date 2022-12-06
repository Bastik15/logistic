@extends('layouts.default')
@section('content')
    <div class="main-wrap">
        <div class="main_content" style="margin-top: 10%;">
            <div class="header">
                <div class="lineblock">
                </div>
                Новый грузовик
            </div>
            <div class="lineblock">
            </div>
            <form action="{{ route('truck.store') }}" method="POST">
                @csrf
                <input placeholder='Имя' id="name" type="text" name='name' value="{{ old('name') }}"
                    class="@error('name') is-invalid @enderror" required autofocus>
                @error('name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input placeholder='Номер' id="number" type="text" name='number' value="{{ old('number') }}"
                    class="@error('number') is-invalid @enderror" required autofocus>
                @error('number')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

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
