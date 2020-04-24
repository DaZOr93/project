extends('works.layouts.default')

dd($work);

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{ $work->title }}</h1>
            <p>{{ $work->title }}</p>
            <p><a class="btn btn-primary btn-lg" href="/" role="button">Back</a></p>
        </div>
    </div>

@endsection
