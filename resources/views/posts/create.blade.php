@extends('master')


@section('title', '| Create New Post')

@section('content')
        <div class="row col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(['route' => 'posts.store']) !!}

                {!! Form::label('title', 'Title:', []) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}

                {!! Form::label('body', 'Post Body', []) !!}
                {!! Form::textarea('body', null, array('class' => 'form-control','placeholder' => 'Enter your posts here...')) !!}

                {!! Form::submit('Submit Post', ['class' =>'btn btn-success btn-lg btn-block','style' => 'margin-top: 20px']) !!}

            {!! Form::close() !!}
        </div>
@stop



