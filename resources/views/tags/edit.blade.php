@extends('master')

@section('title', "| Edit Tag" )


@section('content')
<div class="row">
    <div class="col-md-6">

        {!! Form::model($tags_edit, ['route' => ['tags.update', $tags_edit->id], 'method' => 'PUT']) !!}

				{!! Form::label('name', 'Tag Name:', []) !!}
				{!! Form::text('name', null, ['class' => 'form-control']) !!}

				{!! Form::submit('Save Changes', ['class' => 'btn btn-success', 'style' => 'margin-top:20px']) !!}

			{!! Form::close() !!}
    </div>
</div>
@endsection
