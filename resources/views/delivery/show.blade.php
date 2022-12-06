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

            @if ($order->status_id == 4)
                <form action="{{ route('delivery.end', $order) }}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="submit" class="buttons" value="Отметить как доставленное"
                        style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
    text-decoration: none;
    color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                </form>
            @endif

            <div class="buttons">
                <a href="{{ url()->previous() }}" class="stanlink">Назад</a>
            </div>

        </div>
    </div>
@endsection
