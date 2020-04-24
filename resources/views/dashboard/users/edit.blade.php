@extends('dashboard.layouts.default')
@section('content')
    <div class="container">


        <div class="jumbotron">
            <h3 class="display-4">Редактирование пользователя {{ $user->name  }}</h3>
            <p class="lead">При добавлении Администратора или Жюри измените Роль.</p>

            {!! Form::open(['method' => 'patch' ,'url' => route('dashboard.users.update', $user->id)]) !!}
            @include('dashboard.users.blocks.form.fields')
            <div class="form-group">
                <a class="btn btn-success" href="{{ url()->previous() }}" role="button">Назад</a>
                {!! Form::submit('Обновить', ['class' => 'btn btn-success']); !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>
@endsection
