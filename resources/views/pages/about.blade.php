@extends('master')


@section('title', '| About')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2"><h1>
            About Me
        </h1>
        <p>
            Name :
            <strong>
                {{ $data['fullname'] }}
            </strong>
        </p>
        <p>
            Email :
            <strong>
                {{ $data['email']  }}
            </strong>
        </p>

        <p>
            Phone :
            <strong>
                {{ $data['phone']  }}
            </strong>
        </p>


    </div>
</div>
@stop
