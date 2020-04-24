@extends('works.layouts.default')
@section('content')

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1>Конкур сказок</h1>
                <p class="lead text-muted">Городской конкурс на лчучшую сказку с илюстрацией</p>

            </div>
        </section>

        <div class="album py-1 bg-light">
            <div class="container">

                <div class="row">
                    @forelse($works as $work)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img  width="100%" height="225" class="bd-placeholder-img card-img-top" src="{{ asset('/storage/' . $work->image) }}" alt="">
                            <div class="card-body">
                                <p class="card-text">"{{ $work->title }}", автор: {{ $work->user->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group ">
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ action('WorkController@show',  $work->id) }}" role="button">Просмотр</a>
                                    </div>
                                    <small class="text-muted">Оценка: {{ $work->rating }}</small>
                                </div>
                            </div>
                        </div>
                    </div>



                            @empty
                                Нет работ
                            @endforelse
                </div>
            </div>

        </div>

    </main>
    <div class="justify-content-center">
        {{ $works->links() }}</div>
    @endsection
