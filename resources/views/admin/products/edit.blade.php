@extends('layouts.master')

@section('title', 'View product:')

@section('content')

    <h3>Product {{$product->model}}:</h3>
    <br />

    <div class="row">

        <div class="col-lg-3">

            <img height='300' src="{{ $product_image }}" alt=""><br><br>

        </div>

        <div class="col-lg-9">

            <table class="table">
                <tr>
                    <th>Category:</th>
                    <th>Model:</th>
                    <th>User created:</th>
                    <th>Date created:</th>
                </tr>
                <tr>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->model}}</td>
                    <td><a href="{{route('users.show', $product->user_created->id)}}">{{$product->user_created->name}}</a></td>
                    <td>{{$product->created_at->diffForHumans()}}</td>
                </tr>
            </table>

            <br />

            <h4>Product specification:</h4>

            {{-- Usage of "htmlspecialchars_decode" -> decode as HTML code of text (because we use CKeditor for input) --}}



            <p><?php echo htmlspecialchars_decode($product->specification); ?></p>

            <br />

            <h4>Product description:</h4>

            <p><?php echo htmlspecialchars_decode($product->description); ?></p>

            <br />



             {{--Part for approve\disapprove product --}}

            @if($product->approved === 1)

                <div class="form-group">

                    {!! Form::open(['method' => 'PATCH', 'action' => ['AdminProductController@update', $product->id]]) !!}

                    {!! Form::submit('Un-Approve', ['class' => 'btn btn-primary']) !!}

                </div>

            @else

                <div class="form-group">

                    {!! Form::open(['method' => 'PATCH', 'action' => ['AdminProductController@update', $product->id]]) !!}

                    {!! Form::submit('Approve', ['class' => 'btn btn-primary']) !!}

                </div>

            @endif

            <br />

            <h4>Product owners:</h4>

            <table class="table">
                <tr>
                    <th>Name:</th>
                    <th>E-mail:</th>
                </tr>

                {{-- Part for show all owner of this product -> we do't use variable "owner" for value in foreach
                      because this variable is earlier defined, and in this way is more cleaner view of code
                --}}
                @foreach($owners as $own)

                    {{-- Don't show current user as product owner \ person have this data through "Attach\Detach" option --}}
                    @if($own->id != Auth::user()->id)

                        <tr>
                            <td>{{$own->name}}</td>
                            <td>{{$own->email}}</td>
                            <td><a href="{{route('users.show', $own->id)}}">view</a></td>
                        </tr>

                    @endif

                @endforeach

            </table>

        </div>

    </div>

@endsection