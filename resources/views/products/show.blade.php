@extends('layouts.master')

@section('title', 'View product:')

@section('content')

    <h3>Product {{$product->model}}:</h3>

<div class="row">

    <div class="col-lg-3">

        <p>image</p>

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
            <td>{{$product->user_created_id}}</td>
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



            {{-- Current user have option to add\remove this product from personal product list.
                 Option for add or remove product from list is show depending if user have or not have this product in list
                   - variable "owner" wich have data of user ownership come from Constroller method ('ProductController@show') --}}



            @if($owner)

                <div class="form-group">

                    {!! Form::open(['method' => 'POST', 'action' => ['ProductController@detach_product', $product->id]]) !!}

                    {!! Form::submit('Detach', ['class' => 'btn btn-primary']) !!}

                </div>

            @else

                <div class="form-group">

                    {!! Form::open(['method' => 'POST', 'action' => ['ProductController@attach_product', $product->id]]) !!}

                    {!! Form::submit('Attach', ['class' => 'btn btn-primary']) !!}

                </div>

            @endif


    </div>

</div>

    @endsection