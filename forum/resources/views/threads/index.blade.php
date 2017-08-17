@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Forum threads</div>

                    <div class="panel-body">
                        @foreach($threads as $thread)
                            <article>
                                <a href="/forum/public/{{$thread->path()}}">{{$thread->title}}</a>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
