@extends('master')

@section('title', "| $tag->name Tag" )

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>
            {{ $tag->name }} Tag
            <small>
                ( {{$tag->posts()->count()}} Posts )
            </small>
        </h1>
    </div>
    <div class="col-md-2">
        <a class="btn btn-primary pull-right btn-block" href="{{ route('tags.edit', $tag->id) }}" style="margin-top: 20px;">
            Edit
        </a>
    </div>

    <div class="col-md-2">

        {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}

        	{!! Form::submit('DELETE', ['class' => 'btn btn-danger pull-right btn-block', 'style' => 'margin-top:20px;']) !!}

        {!! Form::close() !!}

    </div>
</div>
<br>
    <br>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Tags
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->posts as $post)
                        <tr>
                            <th>
                                {{ $post->id }}
                            </th>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                @foreach ($post->tags as $tag)
                                <div class="label label-default">
                                    {{ $tag->name }}
                                </div>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-default btn-xs" href="{{ route('posts.show', $post->id) }}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endsection
    </br>
</br>