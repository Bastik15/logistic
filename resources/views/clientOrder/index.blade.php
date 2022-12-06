@extends('layouts.default')

@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Заказы <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            <div class="buttons">
                <a href="{{ route('clientOrder.create') }}" class="stanlink">Заказать</a>
            </div>

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дата</th>
                    <th>Статус</th>
                    <th width="34"></th>
                </tr>
                @if (!is_null($orders))
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->deadline }}</td>
                            <td>{{ $order->status->name }}</td>
                            <td>
                                @if ($order->status_id == 1)
                                    <form action="{{ route('clientOrder.destroy', $order) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="button_delete" value="">
                                    </form>
                                    <a class="button_edit" style="margin: 5px 15px;"
                                        href="{{ route('clientOrder.edit', $order) }}"></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
