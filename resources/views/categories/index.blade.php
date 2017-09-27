@extends('master')


@section('title | All Categoriees')


@section('content')
	{{-- expr --}}

<div class="row">
    <div class="col-md-6">
        <h1>
            Categories
        </h1>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        Name
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <th>
                        {{ $category->id }}
                    </th>
                    <td>
                        {{$category->name}}
                    </td>
                </tr>
                @endforeach<!--end of foreach -->
            </tbody>
        </table><!--end of .table -->
    </div><!--end of .col-md-8 -->

    <div class="col-md-6">
        <div class="well">

            {!! Form::open([ 'route' => 'categories.store','method' => 'POST']) !!}

            <h2>New Category</h2>

            {!! Form::label('name','Name:') !!}

            {!! Form::text('name', null, ['class' => 'form-control']) !!}

            {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}

            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection
