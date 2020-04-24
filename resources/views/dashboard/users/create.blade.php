@extends('dashboard.layouts.default')
@section('content')
    <div class="container">


        <div class="jumbotron">
            <h3 class="display-4">Добавление пользователя</h3>
            <p class="lead">При добавлении Администратора или Жюри измените Роль.</p>

            {!! Form::open(['url' => route('dashboard.users.store')]) !!}
            @include('dashboard.users.blocks.form.fields')
            <div class="form-group">
                <a class="btn btn-success" href="{{ url()->previous() }}" role="button">Назад</a>
                {!! Form::submit('Добавить', ['class' => 'btn btn-success']); !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>
@endsection
