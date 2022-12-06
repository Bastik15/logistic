@extends('layouts.default')
@section('content')

    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Доставляю <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>
            <div style="margin-bottom: 20px" class="">
                {{ !is_null($truck) ? $truck->name : 'Грузовик не выбран' }}
            </div>
            @if (!is_null($truck))
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
                                    href="{{ route('delivery.show', $order) }}"></a>
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

                @if ($orders->count() > 0 && $orders->where('status_id', 4)->count() == 0)
                    <form action="{{ route('delivery.start') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="submit" class="buttons" value="Начать доставку"
                            style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
    text-decoration: none;
    color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                    </form>
                @endif
            @endif
        </div>
    </div>
@endsection
