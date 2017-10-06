@extends('master')


@section('title', '| Delete Comment')


@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <h1>
            DELETE THIS COMMENT ?
        </h1>
        <p>
            Name:
            <strong>
                {{ $cmntDelete->name }}
            </strong>
        </p>
        <p>
            Email:
            <strong>
                {{ $cmntDelete->email }}
            </strong>
        </p>
        <p>
            Comment:
            <strong>
                {{ $cmntDelete->comment }}
            </strong>
        </p>
        {!! Form::open(['route' =>['comments.destroy', $cmntDelete->id ], 'method' => 'DELETE']) !!}

            {!! Form::submit('YES, Delete!', ['class' =>'btn btn-lg btn-block btn-danger']) !!}
    {!! Form::close() !!}
    </div>
</div>
@stop
