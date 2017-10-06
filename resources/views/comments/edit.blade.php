@extends('master')


@section('title', '| Edit Comment')

@section('content')

	<div class="row">
	    <div class="col-md-8 col-md-offset-2">
	        <h2>
	            Edit Comment
	        </h2>
	        {!! Form::model($cmnt, ['route' => ['comments.update', $cmnt->id ], 'method' => 'PUT']) !!}

					{!! Form::label('name', 'Name: ', ['style' => 'margin-top: 10px;']) !!}
					{!! Form::text('name', null, ['class' => 'form-control', 'disabled' => 'disabled' ]) !!}


					{!! Form::label('email', 'Email: ', ['style' => 'margin-top: 20px;']) !!}
					{!! Form::text('email', null, ['class' => 'form-control', 'disabled' => 'disable']) !!}


					{!! Form::label('comment', 'Comment:', ['style' => 'margin-top: 20px;']) !!}
					{!! Form::textarea('comment', null, ['class' => 'form-control']) !!}


					{!! Form::submit('Edit Comment', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 15px;' ]) !!}
					{!! Form::close() !!}
	    </div>
	</div>
@endsection
