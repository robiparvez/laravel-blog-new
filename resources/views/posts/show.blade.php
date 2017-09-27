@extends('master')


@section('title', '| View Post')


@section('content')

	<div class="container">
		<div class="row">
		    <div class="col-md-8">
		        <h1>
		            {{ $post->title }}
		        </h1>
		        <p class="lead">
		            {{ $post->body }}
		        </p>
		    </div>
		    <div class="col-md-4">
		        <div class="well">
		            <dl class="dl-horizontal">
		                <label>
		                    Created at:
		                </label>
		                <p>
		                     {{ date('M j, Y  h:ia', strtotime($post->created_at))	 }}
		                </p>
		            </dl>


		            <dl class="dl-horizontal">

			            	<label>Url Slug:</label>
		                    <a href="{{ url('blog/'. $post->slug)  }}">{{ url('blog/'. $post->slug)  }}</a>

		            </dl>


		            <dl class="dl-horizontal">

			            	<label>Current Category:</label>
		                    <p>{{ $post->category->name }}</p>

		            </dl>


		            <dl class="dl-horizontal">
		                <label>
		                    Last Updated:
		                </label>
		                <p>
		                    {{ date('M j, Y  h:ia', strtotime($post->updated_at)) }}
		                </p>

		                <hr>

		                <div class="row">
		                	<div class="col-sm-6">
		                		{{-- Html::linkROute() --}}
		                		{{ Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) }}
		                	</div>


		                	<div class="col-sm-6">
								{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

			                		{{-- {{ Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) }} --}}
			                		{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

			                	{!! Form::close() !!}
		                	</div>

							<div class="row">
							  <div class="col-md-12">
							    <br>
							    <a href="{{ route('posts.index') }}" class="btn btn-default btn-block">Show all Posts</a>
							  </div>
							</div><!-- /.row -->
		                </div>
		            </dl>
		        </div>
		    </div>
		</div>
	</div>

@stop
