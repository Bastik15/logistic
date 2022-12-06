@extends('layouts.default')
@section('content')
    <div class="main-wrap" style="min-width: 850px;">
        <div class="main_content">
            <div class="header">
                Пользователи <a class="stanlink" href="{{ route('main.index') }}">| Меню</a>
            </div>
            <div class="lineblock">
            </div>
            @can('viewAdmin', auth()->user())
                <div class="buttons">
                    <a href="{{ route('users.create') }}" class="stanlink">Добавить пользователя</a>
                </div>
            @endcan
            <table cellspacing='0'>
                <tr>
                    <th>№</th>
                    <th>Логин</th>
                    <th>Роль</th>
                    @can('viewAdmin', auth()->user())
                        <th width="34"></th>
                    @endcan
                </tr>
                @foreach ($users as $user)
                    <tr style="height: 101px">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->name }}</td>
                        @can('viewAdmin', auth()->user())
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="button_delete" value="">
                                </form>
                                {{-- <form action="" method="GET">
                                @csrf
                                <input type="submit" class="button_edit" value="">
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
