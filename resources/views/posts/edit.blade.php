@extends('master')

@section('title', '| View Post')

@section('content')

	<div class="container">
		<div class="row">

			{!! Form::model($post, ['route' => ['posts.update', $post->id ], 'method' => 'PUT' ]) !!}
		    <div class="col-md-8">
	            {{ Form::label('title', 'Title', []) }}
				{{ Form::text('title', null, ['class' => 'form-control']) }}


				{{ Form::label('Slug', 'Slug:', ['class' => 'form-spacing-top']) }}
                {{ Form::text('slug', null, ['class' => 'form-control']) }}

                {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}




                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

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