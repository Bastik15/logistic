@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Товары в накладной <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
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
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->amount }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>
            @if ($coming->is_performed != 1)
                <div class="buttons">
                    <a href="{{ route('coming.execute', $coming) }}" class="stanlink">Провести</a>
                </div>
            @endif
            <div class="buttons">
                <a href="{{ route('main.index') }}" class="stanlink">Назад</a>
            </div>
        </div>
    </div>
@endsection
