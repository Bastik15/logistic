@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Информация <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            <table cellspacing='0'>
                <tr>
                    <th style="width: 300px">Почта</th>
                    <th>Адрес</th>
                    <th width="34"></th>
                </tr>
                <tr>
                    <td>{{ $about->user->email }}</td>
                    <td>
                        @if (is_null($about->address))
                            Отсутствует
                        @else
                            {{ $about->address }}
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('information.edit') }}">
                            @csrf
                            <input type="submit" class="button_edit" value="">
                        </form>
                        {{-- <form action="" method="GET">
                            @csrf
                            <input type="submit" class="button_edit" value="">
                        </form> --}}
                    </td>
                </tr>
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
