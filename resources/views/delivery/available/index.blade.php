@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Доступные <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>
            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Отправитель</th>
                    <th>Получатель</th>
                </tr>
                @foreach ($orders as $order)
                    <tr style="position: relative">
                        <td>
                            <a style="position: absolute; left: 0; top: 0; right: 0; bottom: 0;"
                                href="{{ route('available.show', $order) }}"></a>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $order->title }}</td>
                        @if ($order->type_id == 1)
                            <td>{{ $order->partner->title }}</td>
                            <td>{{ $order->storage->name }}</td>
                        @else
                            <td>{{ $order->storage->name }}</td>
                            @if (!is_null($order->partner_id))
                                <td>{{ $order->partner->title }}</td>
                            @else
                                <td>{{ $order->client->email }}</td>
                            @endif
                        @endif
                    </tr>
                @endforeach
            </table>

            <div class="lineblock"></div>
        </div>
    </div>
@endsection
