@extends('layouts.master')

@section('title', 'Approve')

@section('content')

    <h3>Approve:</h3>

    <table class="table">
      <tr>
        <th>Category:</th>
        <th>Model:</th>
        <th>Created at:</th>
        <th>User created:</th>
        <th>Status:</th>
      </tr>

        @foreach($products as $product)

      <tr>
        <td>{{$product->category->name}}</td>
        <td>{{$product->model}}</td>
        <td>{{$product->created_at->diffForHumans()}}</td>
        <td><a href="{{route('users.show', $product->user_created->id)}}">{{$product->user_created->name}}</a></td>
        <td>{{$product->approved === 1 ? 'Approved' : 'Not Approved'}}</td>
        <td><a href="{{route('admin.products.edit', $product->id)}}">view</a></td>
      </tr>

            @endforeach
    </table>

    @endsection