@extends('layouts.master')

@section('title', 'Users')

@section('content')

    <h3>Users:</h3>

    @if(!isset($query))

        <?php $query = ''; ?>

    @endif

    {{-- Form for search user. Default value ("$query") is send\recived from method index on Controller (UserController) --}}

    {!! Form::open(['method'=>'get', 'action' => 'UserController@index']) !!}

    <div class="form-group">
        {!! Form::label('search', 'Search user:') !!}
        {!! Form::text('search', $query, ['class'=>'form-control', 'placeholder' => 'Search user:']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    <br />

    <table class="table">
      <tr>
        <th>Name:</th>
        <th>E-mail:</th>
        <th>Account create:</th>
      </tr>

        @foreach($users as $user)

            {{-- Show users list without current user --}}
            @if($user->id != Auth::user()->id)

      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td><a href="{{route('users.show', $user->id)}}">view</a></td>
      </tr>

            @endif

                @endforeach
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->render()}}
        </div>
    </div>

    @endsection