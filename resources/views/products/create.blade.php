@extends('layouts.master')

@section('title', 'Insert product')

@section('content')

    <h3>Insert Product:</h3>

    <div class="row">

            </div>

                <div class="col-lg-9">

                {!! Form::open(['method' => 'POST', 'action' => 'ProductController@store', 'files' => true]) !!}


                    {{-- hidden input is sent to connect user with product they created --}}
                    {!! Form::hidden('user_created_id', Auth::user()->id) !!}

                    <div class="row">

                        {{-- Category input -> recive value from controller --}}

                        <div class="col-lg-4">

                            <div class="form-group">
                                {!! Form::label('cetegory_id', 'Category:') !!}
                                {!! Form::select('category_id', $categories, 1, ['class'=>'form-control']) !!}
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                                {!! Form::label('model', 'Model:') !!}
                                {!! Form::text('model', null, ['class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="col-lg-4">

                            <div class="form-group">
                                {!! Form::label('image', 'Image:') !!}
                                {!! Form::file('image', ['class' => 'form-control']) !!}
                            </div>

                        </div>

                    </div>

                    {{-- next two textarea will be used with CKeditor --}}

                    <div class="form-group">
                        {!! Form::label('specification', 'Specification:') !!}
                        {!! Form::textarea('specification', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', 'Description:') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>


                <div class="form-group">
                {!! Form::submit('Insert', ['class' => 'btn btn-primary col-sm-6']) !!}
                </div>

                    {!! Form::close() !!}

                </div>

                <div class="col-lg-3">

                    @include('includes.form_error')

                </div>

    </div>

    <script>
        CKEDITOR.replace( 'specification' );
        CKEDITOR.replace( 'description' );
    </script>

    @endsection