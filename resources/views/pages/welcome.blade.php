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
            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <hr/>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...</p>

                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <hr/>

            <div class="post">
                <h3>Post Title</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua...</p>

                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <hr/>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <h2>SideBar</h2>
        </div>
    </div>
@stop

{{-- @section('scripts')
    <script type="text/javascript">

        confirm('Just confirming');

    </script>
@stop --}}