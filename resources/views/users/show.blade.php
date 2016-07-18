@extends('layouts.master')

@section('title', 'User info')

@section('content')

    <h3>{{$user->name}} info</h3>
    <h6>{{$user->email}}</h6>

    <br />

    <div class="row">

        <div class="col-lg-3">

            <img height='300' src="{{ $user_image }}" alt="">

        </div>

        <div class="col-lg-9">

            <h4>Equipment:</h4>

            <br />

            <table class="table">
              <tr>
                  <th>Category:</th>
                  <th>Model:</th>
              </tr>

                @foreach($products as $product)

                    {{-- Show only approved product, or if user is administrator show all products--}}
                    @if($product->approved === 1 || Auth::user()->role_id === 1)

              <tr>
                <td>{{$product->category->name}}</td>
                <td>{{$product->model}}</td>
                <td><a href="{{route('products.show', $product->id)}}">view</a></td>
              </tr>

                    @endif

                    @endforeach

            </table>

        </div>

    </div>

    @endsection