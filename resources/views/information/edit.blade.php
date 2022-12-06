@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Настройки <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            <form action="{{ route('information.store') }}" method="POST">
                @csrf
                @method('patch')
                <input placeholder='Адрес' id="address" type="text" name='address'
                    value="{{ is_null(old('address')) ? $about->address : old('address') }}"
                    class="@error('address') is-invalid @enderror" required autofocus>
                <div class="">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button class="buttons"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
      text-decoration: none;
      color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                    Изменить
                </button>
            </form>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
