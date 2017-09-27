@extends('master')

@section('title', "| $post->title")

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-2">
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            {{ $post->body }}
        </p>
        <hr>
            Posted in:
            <b>
                {{ $post->category->name }}
            </b>
            {{-- same >>--}} {{-- {{ $post->category_id }} --}}
        </hr>
    </div>
</div>
@stop
