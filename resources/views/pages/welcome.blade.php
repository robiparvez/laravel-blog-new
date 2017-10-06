@extends('master')

@section('title', '| Home')

@section('stylesheets')
    {{-- expr --}}
    <link rel="stylesheet" type="text/css" href="">
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to Parvez's blog !</h1>
                <p class="lead">Thank you for visiting my blog</p>
                <p><a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">Popular Posts &raquo;</a></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">

            @foreach ($posts as $post)
                <div class="post">
                    <h3>{{ $post->title }}</h3>
                    <p>{!! substr($post->body  , 0, 25) !!} {!! strlen($post->body) > 250 ? "..." : ""  !!}</p>

                    <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More</a>
                </div>
            <hr/>
            @endforeach

        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>SideBar</h2>
        </div>
    </div>
@stop
