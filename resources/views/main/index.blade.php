@extends('layouts.default')
@section('content')
    <div class="main-wrap">
        <div class="main_content">
            <div class="header">
                Организация "Коммерческие склады"
            </div>
            <div>
                <img src="{{ asset('images/stock.jpg') }}" width="595" height="330" style="border-radius: 10px; ">
            </div>
            <div class="lineblock">
            </div>

            @can('viewAdmin', auth()->user())
                <div class="buttons">
                    <a href="{{ route('users.index') }}" class="stanlink">Пользователи</a>
                </div>
            @endcan

            @can('viewClient', auth()->user())
                <div class="buttons">
                    <a href="{{ route('information.index') }}" class="stanlink">Информация</a>
                </div>
            @endcan

            @can('viewClient', auth()->user())
                <div class="buttons">
                    <a href="{{ route('clientOrder.index') }}" class="stanlink">Заказы</a>
                </div>
            @endcan

            @cannot('viewAdmin', auth()->user())
                @cannot('viewDriver', auth()->user())
                    @cannot('viewClient', auth()->user())
                        <div class="buttons">
                            <a href="{{ route('storage.index') }}" class="stanlink">Товары на складе</a>
                        </div>
                    @endcan
                @endcan
            @endcan

            @cannot('viewWorker', auth()->user())
                @cannot('viewDriver', auth()->user())
                    @cannot('viewClient', auth()->user())
                        <div class="buttons">
                            <a href="{{ route('partner.index') }}" class="stanlink">Контрагенты</a>
                        </div>
                    @endcan
                @endcan
            @endcan

            @can('viewWorker', auth()->user())
                <div class="buttons">
                    <a href="{{ route('coming.index') }}" class="stanlink">Приход</a>
                </div>
            @endcan

            @can('viewWorker', auth()->user())
                <div class="buttons">
                    <a href="{{ route('realization.index') }}" class="stanlink">Реализация</a>
                </div>
            @endcan

            @can('viewManager', auth()->user())
                <div class="buttons">
                    <a href="{{ route('order.index') }}" class="stanlink">Накладные</a>
                </div>
            @endcan

            @can('viewDriver', auth()->user())
                <div class="buttons">
                    <a href="{{ route('available.index') }}" class="stanlink">Доступные</a>
                </div>
            @endcan

            @can('viewDriver', auth()->user())
                <div class="buttons">
                    <a href="{{ route('delivery.index') }}" class="stanlink">Доставляю</a>
                </div>
            @endcan

            @can('viewDriver', auth()->user())
                <div class="buttons">
                    <a href="{{ route('delivery.all') }}" class="stanlink">Доставлено</a>
                </div>
            @endcan

            @can('viewDriver', auth()->user())
                <div class="buttons">
                    <a href="{{ route('truck.index') }}" class="stanlink">Грузовики</a>
                </div>
            @elsecan('viewManager', auth()->user())
                <div class="buttons">
                    <a href="{{ route('truck.index') }}" class="stanlink">Грузовики</a>
                </div>
            @endcan

            <div class="buttons">
                <a class="stanlink" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <div class="lineblock">
            </div>
        </div>
    </div>
@endsection
