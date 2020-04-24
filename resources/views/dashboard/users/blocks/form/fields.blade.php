<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Имя') !!}
            {!! Form::text('name', $user->name ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', $user->email ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('role_id', 'Роль') !!}
            {!! Form::select('role_id', ['1' => 'Администратор', '2' => 'Участник','3' => 'Жюри'], '2' ?? null, ['class' => 'form-control']) !!}
        </div>

        @error('role_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {!! Form::label('password', 'Пароль') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
