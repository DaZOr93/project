<div class="row">
    <div class="col-sm-12 col-md-6">

        <div class="form-group">
            {!! Form::label('rating', 'Оценка') !!}
            {!! Form::select('rating', ['1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5'], '2' ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('rating')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
</div>
