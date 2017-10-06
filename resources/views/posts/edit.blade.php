@extends('master')

@section('title', '| View Post')

{{-- Select2 and parsley css --}}
@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.css') !!}

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js">
    </script>
    <script type="text/javascript">
        tinymce.init({
                selector:'textarea',
                plugins: "link",

            });
    </script>
@stop

@section('content')

	<div class="container">
		<div class="row">

			{!! Form::model($post, ['route' => ['posts.update', $post->id ], 'method' => 'PUT', 'files' => true ]) !!}
		    <div class="col-md-8">
	            {{ Form::label('title', 'Title', []) }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}


				{{ Form::label('Slug', 'Slug:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('slug', null, ['class' => 'form-control']) }}


                {!! Form::label('image', 'Update Image:', ['class' => 'form-spacing-top']) !!}
                {!! Form::file('image')!!}

				{{-- Categpry --}}
                {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

				{{-- Tags --}}
				{!! Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) !!}
                {!! Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) !!}

				{{--
            	<select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select> --}}

		        {{ Form::label('body', 'Body', ['class' => 'form-spacing-top']) }}
		        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
		    </div>
		    <div class="col-md-4">
		        <div class="well">
		            <dl class="dl-horizontal">
		                <dt>
		                    Created at:
		                </dt>
		                <dd>
		                     {{ date('M j, Y  h:ia', strtotime($post->created_at))	 }}
		                </dd>
		            </dl>
		            <dl class="dl-horizontal">
		                <dt>
		                    Last Updated:
		                </dt>
		                <dd>
		                    {{ date('M j, Y  h:ia', strtotime($post->updated_at)) }}
		                </dd>
		                <hr>

		                <div class="row">
		                	<div class="col-sm-6">
		                		{{-- Html::linkROute() --}}
		                		{{ Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
		                	</div>

		                	<div class="col-sm-6">
		                		{{-- {{ Html::linkRoute('posts.update', 'Save Changes', array($post->id), array('class' => 'btn btn-success btn-block')) }} --}}

		                		{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
		                	</div>
		                </div>
		            </dl>
		        </div>
		    </div>

		    {!! Form::close() !!}
		</div>
	</div>

@stop

{{--Select2 and Parsley script--}}
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}


    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({{ json_encode($post->tags()->allRelatedids()) }}).trigger('change');
    </script>
@stop

