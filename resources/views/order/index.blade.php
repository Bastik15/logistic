@extends('layouts.default')

@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Накладные <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            <div class="buttons">
                <a href="{{ route('order.create') }}" class="stanlink">Создать накладную</a>
            </div>

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th>Тип</th>
                    <th>Заказчик</th>
                    <th>Склад</th>
                    <th width="34"></th>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->deadline }}</td>
                        <td>{{ $order->type->name }}</td>
                        @if (!is_null($order->partner_id))
                            <td>{{ $order->partner->title }}</td>
                        @else
                            <td>{{ $order->client->email }}</td>
                        @endif
                        <td>{{ $order->storage->name }}</td>
                        <td>
                            @if ($order->status_id == 1)
                                <form action="{{ route('order.destroy', $order) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="button_delete" value="">
                                </form>
                                <a class="button_edit" style="margin: 5px 15px;"
                                    href="{{ route('order.edit', $order) }}"></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
