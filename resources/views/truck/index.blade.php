@extends('layouts.default')
@section('content')

    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Грузовики <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>
            @can('viewManager', auth()->user())
                <div class="buttons">
                    <a href="{{ route('truck.create') }}" class="stanlink">Добавить грузовик</a>
                </div>
            @endcan
            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Номер</th>
                    @can('viewManager', auth()->user())
                        <th>Водитель</th>
                    @endcan
                    @can('viewDriver', auth()->user())
                        <th width="34"></th>
                    @endcan
                </tr>
                @can('viewDriver', auth()->user())
                    @if (!is_null($myTruck))
                        <tr>
                            <td>1</td>
                            <td>{{ $myTruck->name }}</td>
                            <td>{{ $myTruck->number }}</td>
                            <td>
                                <form action="{{ route('truck.choose', $myTruck) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input
                                        style="padding-top: 5px; padding-bottom: 5px; font-size: 18px; margin: 0px; width: 100px"
                                        type="submit" class="" value="Убрать">
                                </form>
                            </td>
                        </tr>
                    @endif
                @endcan
                @foreach ($trucks as $truck)
                    <tr>
                        @if (isset($myTruck))
                            @if (!is_null($myTruck))
                                <td>{{ $loop->iteration + 1 }}</td>
                            @else
                                <td>{{ $loop->iteration }}</td>
                            @endif
                        @else
                            <td>{{ $loop->iteration }}</td>
                        @endif
                        <td>{{ $truck->name }}</td>
                        <td>{{ $truck->number }}</td>
                        @can('viewManager', auth()->user())
                            <td>{{ !is_null($truck->user_id) ? $truck->user()->first()->email : 'Отсутствует' }}</td>
                        @endcan
                        @can('viewDriver', auth()->user())
                            <td style="">
                                <form action="{{ route('truck.choose', $truck) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input
                                        style="padding-top: 5px; padding-bottom: 5px; font-size: 18px; margin: 0px; width: 100px"
                                        type="submit" class="" value="Выбрать">
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </table>

            <div class="lineblock"></div>
        </div>
    </div>
@endsection
