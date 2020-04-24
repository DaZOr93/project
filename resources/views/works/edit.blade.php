@extends('works.layouts.default')
@section('content')
    <div class="container">


        <div class="jumbotron">
            <h3 class="display-4">Редактирование работы</h3>
            <p class="lead">При добавлении не забудьте подобрать илюстрацию.</p>

            {!! Form::open(['method' => 'patch' ,'url' => route('work.update', $work->id), 'files'=> true]) !!}
            @include('works.layouts.blocks.form.fields')
            <div class="form-group">
                {!! Form::submit('Обновить', ['class' => 'btn btn-success']); !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>
@endsection
