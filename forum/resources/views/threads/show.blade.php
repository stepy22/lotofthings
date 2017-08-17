@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel panel-default">
                        <a href="">   {{$thread->creator->name}} </a> posted: </div>
                    <div class="panel-heading">{{$thread->title}}</div>

                    <div class="panel-body">
                        {{$thread->body}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($thread->replies as $reply)
        @include('threads.reply')
                    @endforeach
        </div>
            {{$thread->channel->name}}

        @if(auth()->check())
                               <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <form method="POST" action="{{'../../'.$thread->path().'/replies'}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <textarea class="form-control" name="body" id="body"  rows="5" placeholder="Have something to say?"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Post</button>
                            </form>
                        </div>

                        </div>


            @else
                <div class="text-center panel panel-default">
                    Please <a href="{{route('login')}}"> sign </a>into participate
                </div>
                @endif
    </div>
@endsection
