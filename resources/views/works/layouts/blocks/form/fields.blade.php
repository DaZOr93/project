<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            {!! Form::label('title', 'Название') !!}
            {!! Form::text('title', $work->title ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('body', 'Текст') !!}
            {!! Form::textarea('body', $work->body ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('body')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('image', 'Изображение') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>

        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
</div>
