@extends('layouts.default')
@section('content')

    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Накладная {{ $order->title }} <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $product->product->name }}</th>
                        <th>{{ $product->amount }}</th>
                        <th>{{ $product->price }}</th>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>

            @if (!is_null(auth()->user()->truck()->first()))
                @if (auth()->user()->orders()->where('status_id', 4)->count() == 0)
                    <form action="{{ route('available.choose', $order) }}" method="POST">
                        @csrf
                        @method('patch')
                        <button class="buttons"
                            style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
text-decoration: none;
color: white; font-family: 'Poiret One', cursive; cursor: pointer;">Принять</button>
                    </form>
                @else
                    <div style="margin-bottom: 10px" class="">Вы уже доставляете.</div>
                    <div style="margin-bottom: 20px" class="">Завершите предыдущий заказ</div>
                    <div class="lineblock"></div>
                @endif
            @else
                <div style="margin-bottom: 20px" class="">Не выбран грузовик</div>
                <div class="lineblock"></div>
            @endif
            <form action="{{ route('available.index', $order) }}">
                <button class="buttons"
                    style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
    text-decoration: none;
    color: white; font-family: 'Poiret One', cursive; cursor: pointer;">Назад</button>
            </form>

        </div>
    </div>
@endsection
