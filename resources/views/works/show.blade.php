@extends('works.layouts.default')
@section('content')
    <section class="latest section">
        <div class="jumbotron">
            <div class="content">

                <div class="item featured text-center ">
                    <h3 class="title">{{ $work->title }}</h3>

                    <div class="featured-image">
                        <img class="img-responsive project-image" src="{{ asset('/storage/' . $work->image) }}" alt="project name" />
                        <div class="ribbon">

                        </div>
                    </div>
                    <div class=" text-left">
                        {{ $work->body }}
                    </div><!--//desc-->
                    <div class="border-top m-2"></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="desc text-left">Участник: {{ $work->user->name }}</p>
                        <small class="text-muted">Оценка: {{ $work->rating }}</small>
                        </div>
                    @auth
                        @if(\Auth::user()->role_id==3)
                            <div class="border-top m-2"></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="form-group">

                                    {!! Form::open(['url' => route('work.rating', $work->id)]) !!}
                                    @include('works.layouts.blocks.form.rating')
                                    <div class="form-group">
                                        <a class="btn btn-success" href="{{ url()->previous() }}" role="button">Назад</a>
                                        {!! Form::submit('Добавить', ['class' => 'btn btn-success']); !!}
                                    </div>
                                    {!! Form::close() !!}



                        @endif
                    @endauth

                </div><!--//item-->


            </div><!--//content-->
        </div><!--//section-inner-->

    </section><!--//section-->


@endsection
