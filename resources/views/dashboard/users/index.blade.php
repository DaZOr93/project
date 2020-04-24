@extends('dashboard.layouts.default')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h2 class="display-4">Список пользователей</h2>
            <p class="lead">Здесь вы можете добавлять, редактировать и удалять пользователей.</p>
            <a class="btn btn-primary btn-lg" href="{{ route('dashboard.users.create') }}" role="button">Добавить пользователя</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Роль</th>
                <th scope="col">Email</th>
                <th colspan="2" scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.users.edit', $user->id) }}">Редактировать</a></td>
                    <td>
                        <form id="destroy-form" action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Удалить пользователя?')" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
        <div class="justify-content-center">
            {{ $users->links() }}</div>

@endsection

