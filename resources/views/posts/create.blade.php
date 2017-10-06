@extends('master')

{{--Select2 and Parsley CSS--}}
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script type="text/javascript">



    </script>

@stop


@section('title', '| Create New Post')

@section('content')
        <div class="row col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}

                {!! Form::label('title', 'Title:', []) !!}
                {!! Form::text('title', null, ['class' => 'form-control','data-parsley-required' => '', 'data-parsley-minlength' => '6']) !!}


                {!! Form::label('Slug', 'Slug:', []) !!}
                {!! Form::text('slug', null, ['class' => 'form-control','data-parsley-required' => '', 'data-parsley-minlength' => '6','data-parsley-maxlength' => '255']) !!}



                {!! Form::label('category_id', 'Category Name:', ['class' => 'btn-h1-spacing']) !!}

                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>



                {!! Form::label('tags', 'Tags Name:', ['class' => 'btn-h1-spacing']) !!}


                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                {!! Form::label('body', 'Post Body', ['class' => 'btn-h1-spacing']) !!}
                {!! Form::textarea('body', null, array('class' => 'form-control','placeholder' => 'Enter your posts here...','data-parsley-required' => '','data-parsley-minlength' => '6','data-parsley-maxlength' => '255')) !!}

                {!! Form::submit('Submit Post', ['class' =>'btn btn-success btn-lg btn-block','style' => 'margin-top: 20px']) !!}

            {!! Form::close() !!}
        </div>
@stop

{{--Select2 and Parsley script--}}
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}


    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@stop