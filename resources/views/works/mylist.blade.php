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
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ action('WorkController@edit',  $work->id) }}" role="button">Редактировать</a>
                                        <form id="destroy-form" action="{{ route('work.destroy', $work->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-secondary" onclick="return confirm('Удалить работу?')" type="submit">Удалить</button>
                                        </form>
                                    </div>
                                    <small class="text-muted">Оценка: {{ $work->rating }}</small>
                                </div>
                            </div>
                        </div>
                    </div>



                            @empty
                        <div class="container text-center">
                            <h4>Нет работ</h4>
                            <p><a class="btn btn-primary btn-lg" href="/create" role="button">Добавить работу</a></p>

                        </div>
                            @endforelse
                </div>
            </div>
        </div>
        <div class="container text-center">
            {{ $works->links() }}</div>
    </main>

    @endsection
