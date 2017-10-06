@extends('master')
<?php $title_tag = htmlspecialchars($post->
title); ?>

@section('title', "| $title_tag")

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
        </hr>
        <hr>
        </hr>
    </div>
</div>


{{-- @php


{{ echo urlencode('https://scontent.fdac5-1.fna.fbcdn.net/v/t1.0-9/14993516_10207467743481755_1773707475555528407_n.jpg?oh=790dfde092edf7586c13ff4dc49132f0&oe=5A7ED252') }}
@endphp --}}



<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2 class="comments-title">
            <span class="glyphicon glyphicon-comment">
            </span>
            {{ $post->comment()->count()
             }}
            Comments
        </h2>
        @foreach ($post->comment as $comment_output)
        <div class="comment">
            <div class="author-info">
                <img class="author-image" src="{{ "https://www.gravatar.com/avatar/".  md5(strtolower(trim($comment_output->email))) .
                "?s=50&d=monsterid"}}"  >

                    <div class="author-name">
                        <h4>
                            {{ $comment_output->name }}
                        </h4>
                        <p class="author-time">
                            {{ $comment_output->created_at->diffForHumans() }}
                        </p>
                    </div>
                </img>
            </div>
            <div class="comment-content">
                {{ $comment_output->comment }}
            </div>
        </div>
        @endforeach
    </div>
</div>
{{--
<div class="container">
    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" rel="stylesheet">
        <div class="row">
            <div class="comments-container">
                <h1>
                    Comments
                </h1>
                <ul class="comments-list" id="comments-list">
                    <li>
                        <div class="comment-main-level">
                            @foreach ($post->comment as $comment_output)
                            <div class="comment-avatar">
                                <img alt="" src="http://i9.photobucket.com/albums/a88/creaticode/avatar_1_zps8e1c80cd.jpg"/>
                            </div>
                            <div class="comment-box">
                                <div class="comment-head">
                                    <h6 class="comment-name by-author">
                                        <a href="#">
                                            {{ $comment_output->name }}
                                        </a>
                                    </h6>
                                    <span>
                                    </span>
                                    <i class="fa fa-reply">
                                    </i>
                                    <i class="fa fa-heart">
                                    </i>
                                </div>
                                <div class="comment-content">
                                    {{ $comment_output->comment }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        --}}
                        <!-- Respuestas de los comentarios -->
                        {{--
                        <ul class="comments-list reply-list">
                            <li>
                                <!-- Avatar -->
                                <div class="comment-avatar">
                                    <img alt="" src="http://i9.photobucket.com/albums/a88/creaticode/avatar_2_zps7de12f8b.jpg"/>
                                </div>
                                <!-- Contenedor del Comentario -->
                                <div class="comment-box">
                                    <div class="comment-head">
                                        <h6 class="comment-name">
                                            <a href="http://creaticode.com/blog">
                                                Lorena Rojero
                                            </a>
                                        </h6>
                                        <span>
                                            hace 10 minutos
                                        </span>
                                        <i class="fa fa-reply">
                                        </i>
                                        <i class="fa fa-heart">
                                        </i>
                                    </div>
                                    <div class="comment-content">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?
                                    </div>
                                </div>
                            </li>
                        </ul>
                        --}}
      {{--
                    </li>
                </ul>
            </div>
        </div>
    </link>
</div>
--}}
<div class="row">
    <div class="col-md-6 col-md-offset-2" id="comment-form" style="margin-top: 20px;">
        <h3>
            Add Comments
        </h3>
        <hr>
            {!! Form::open(['route' => ['comments.store', $post->id] , 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-md-6">
                    {!! Form::label('name', 'Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {{-- null => no default value --}}
                </div>
                <div class="col-md-6">
                    {!! Form::label('email', 'Email:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-md-12">
                    {!! Form::label('comment', 'Comment;', []) !!}
                            {!! Form::textarea('comment', null, ['class' =>'form-control', 'rows'=>'5']) !!}
                </div>
            </div>
            {!! Form::submit('Add', ['class' => 'btn btn-success btn-block', 'style' => 'margin-top: 15px;']) !!}
                    {!! Form::close() !!}
        </hr>
    </div>
</div>
@stop
