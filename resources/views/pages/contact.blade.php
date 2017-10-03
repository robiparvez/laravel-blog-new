@extends('master')


@section('title', '| Contact')

@section('content')
        <div class="row col-md-12">
            <h1>Contact Me</h1>
            <hr>

            <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}

                <div class="form-group">
                    <label name="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="subject">Subject</label>
                    <input id="subject" type="subject" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label name="message">Message</label>
                    <textarea id="message" type="message" name="message" placeholder="Type your message..." class="form-control"></textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
@stop



