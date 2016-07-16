@extends('layouts.master')

@section('title', 'Edit user data')

@section('content')

<h1>Edit personal data:</h1>

<br />

<div class="row">
    <div class="col-sm-3">

        <img height='300' src="{{ $user_image }}" alt=""><br><br>

        @if(session('new_password'))

            <p class="bg-info">{{ session('new_password') }}</p>

        @endif

    </div>



    <div class="col-sm-9">

        {!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id], 'files' => true]) !!}

        <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                </div>
        </div>

        <div class="col-lg-6">
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                </div>
        </div>

        <div class="col-lg-6">
             <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
              </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                {!! Form::label('repeat_password', 'Repeat password:') !!}
                {!! Form::password('repeat_password', ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image', ['class' => 'form-control']) !!}
        </div>

          <div class="form-group">
             {!! Form::submit('Update', ['class' => 'btn btn-primary col-sm-6']) !!}
          </div>


        {!! Form::close() !!}

    </div>

</div>

@endsection