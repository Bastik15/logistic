@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Приход <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th>Тип</th>
                    <th>Заказчик</th>
                    <th>Склад</th>
                </tr>
                @foreach ($orders as $order)
                    <tr style="position: relative">
                        <td>
                            <a style="position: absolute; left: 0; top: 0; right: 0; bottom: 0;"
                                href="{{ route('coming.show', $order) }}"></a>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->deadline }}</td>
                        <td>{{ $order->type->name }}</td>
                        <td>{{ $order->partner->title }}</td>
                        <td>{{ $order->storage->name }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
