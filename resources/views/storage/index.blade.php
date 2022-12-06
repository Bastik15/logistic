@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Товары на складе <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Количество</th>
                    <th>Цена</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->more->amount }}</td>
                        <td>{{ $product->more->price }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
