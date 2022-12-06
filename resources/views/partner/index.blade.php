@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Контрагенты <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock"></div>
            @can('viewManager', auth()->user())
                <div class="buttons">
                    <a href="{{ route('partner.create') }}" class="stanlink">Добавить контрагента</a>
                </div>
            @endcan

            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Роль</th>
                    @can('viewManager', auth()->user())
                        <th width="34"></th>
                    @endcan
                </tr>

                @foreach ($partners as $partner)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $partner->title }}</td>
                        <td>{{ $partner->role->name }}</td>
                        @can('viewManager', auth()->user())
                            <td>
                                <form action="{{ route('partner.destroy', $partner) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="button_delete" value="">
                                </form>

                                {{-- <form action={{ url_for('edit', table = 'Контрагенты') }} method="GET">
                        <input type="hidden" name="idedit" value="{{ item . id }}">
                        <button class="button_edit"></button>
                    </form> --}}
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </table>
            <div class="lineblock"></div>
        </div>
    </div>
@endsection
