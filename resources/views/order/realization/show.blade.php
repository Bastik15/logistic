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
            @if ($realization->is_performed != 1)
                @foreach ($products as $key => $product)
                    @if ($storageProducts->where('id', $product->product_id)->first()->more()->first()->amount < $product->amount)
                        <div class="buttons">
                            <span class="stanlink">Нехватка на складе</span>
                        </div>
                        @break(1)
                    @else
                        @if (++$key == $products->count())
                            <div class="buttons">
                                <a href="{{ route('realization.execute', $realization) }}" class="stanlink">Провести</a>
                            </div>
                        @endif
                        @continue
                    @endif
                @endforeach
            @endif
            <div class="buttons">
                <a href="{{ route('main.index') }}" class="stanlink">Назад</a>
            </div>
        </div>
    </div>
@endsection
