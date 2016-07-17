@extends('layouts.master');

@section('title', 'Product list:')

@section('content')

    <h3>Product list:</h3>

    <br />

<table class="table">
  <tr>
    <th>Image:</th>
    <th>Category:</th>
    <th>Model:</th>
    <th>User created:</th>
    <th>Date created:</th>
  </tr>

    @foreach($products as $product)

  <tr>
    <td>image</td>
    <td>{{$product->category->name}}</td>
    <td><a href="{{route('products.show', $product->id)}}">{{$product->model}}</a></td>
    <td><a href="{{route('users.show', $product->user_created->id)}}">{{$product->user_created->name}}</a></td>
    <td>{{$product->created_at->diffForHumans()}}</td>
  </tr>

        @endforeach
</table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$products->render()}}
        </div>
    </div>


@endsection