@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Накладная {{ $order->title }} <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Товар</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th width="34"></th>
                </tr>
                @foreach ($orderProducts as $product)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $product->product->name }}</th>
                        <th>{{ $product->amount }}</th>
                        <th>{{ $product->price }}</th>
                        <th>
                            <form
                                action="{{ route('product.destroy', ['order' => $order->id, 'product' => $product->product_id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" class="button_delete" value="">
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>

            <div class="main_content" style="margin-top: 10%;">
                <div class="header">
                    <br>
                    <div class="lineblock"></div>
                    Новый товар
                </div>
                <form action="{{ route('clientOrder.storeOrder', $order->id) }}" method="POST">
                    @csrf
                    <table cellspacing='0'>
                        <tr>
                            <th>
                                <select name="product_id" required style="width: 200px">
                                    @foreach ($products as $product)
                                        @if (is_null($orderProducts->where('product_id', $product->id)->first()))
                                            <option value="{{ $product->id }}">
                                                {{ $product->name . ' ' . $product->more->price . 'Р' }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </th>
                            <th>
                                <input value="{{ old('amount') }}" class="@error('amount') is-invalid @enderror"
                                    placeholder='Количество' type='number' name='amount' required>
                            </th>
                        </tr>
                        <tr>
                            <th>

                            </th>
                            <th>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </th>
                        </tr>
                    </table>

                    <input class="buttons" type="submit" value="Добавить"
                        style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
    text-decoration: none;
    color: white; font-family: 'Poiret One', cursive; cursor: pointer;">
                </form>
                <form action="{{ route('clientOrder.index') }}">
                    <button class="buttons"
                        style="min-width: 88%; margin-left: auto; margin-right: auto; margin-bottom: 15px; font-size: 28px;
        text-decoration: none;
        color: white; font-family: 'Poiret One', cursive; cursor: pointer;">Завершить</button>
                </form>

            </div>
        </div>
    @endsection
