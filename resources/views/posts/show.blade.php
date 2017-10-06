@extends('master')


@section('title', '| View Post')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h1><img src="{{ asset('images/' . $post->image ) }}" height="200" width="200" /></h1>

            <h1>
                {{ $post->title }}
            </h1>
            <p class="lead">
                {{-- {{ strip_tags($post->body) }} --}}
                {{-- {{ strip_tags() }} --}}

                {!! $post->body !!}
            </p>
            <hr>
                <h3>
                    @foreach ($post->tags as $tag)
                    <div class="label label-default ">
                        {{ $tag->name  }}
                    </div>
                    @endforeach
                </h3>
            </hr>
            <div id="backend-comments" style="margin-top: 50px">
                <h3>
                    Comments
                    <small>
                        {{ $post->comment()->count() }}
                    </small>
                </h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Comment
                            </th>
                            <th width="100px">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comment as $comment_show)
                        <tr>
                            <td>
                                {{ $comment_show->name }}
                            </td>
                            <td>
                                {{ $comment_show->email }}
                            </td>
                            <td>
                                {{ $comment_show->comment }}
                            </td>
                            <td>
                                <a class="bt btn-xs btn-primary" href="{{ route('comments.edit', $comment_show->id) }}" style="margin-right: 10px;">
                                    <span class="glyphicon glyphicon-pencil">
                                    </span>
                                    Edit
                                </a>

                                <a class="bt btn-xs btn-danger" href="{{ route('comments.delete', $comment_show->id) }}"><span class="glyphicon glyphicon-trash">
                                    </span>
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>
                        Created at:
                    </label>
                    <p>
                        {{ date('M j, Y  h:ia', strtotime($post->created_at))    }}
                    </p>
                </dl>
                <dl class="dl-horizontal">
                    <label>
                        Url Slug:
                    </label>
                    <a href="{{ url('blog/'. $post->slug)  }}">
                        {{ url('blog/'. $post->slug)  }}
                    </a>
                </dl>
                <dl class="dl-horizontal">
                    <label>
                        Current Category:
                    </label>
                    <p>
                        {{ $post->category->name }}
                    </p>
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
                                        <a class="btn btn-default btn-block" href="{{ route('posts.index') }}">
                                            Show all Posts
                                        </a>
                                    </br>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                    </hr>
                </dl>
            </div>
        </div>
    </div>
</div>
@stop
