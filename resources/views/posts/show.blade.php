@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{$post->title}}</h1>
        <hr>
        <p>{{$post->body}}</p>

        <p class="text-muted">Created by
            {{$post->user->name}}
            {{$post->created_at->diffForHumans()}}
        </p>

        @if(count($post->tags))
            @foreach($post->tags as $tag)
                <a href="/posts/tags/{{$tag->name}}">
                    <button type="button" class="btn btn-outline-primary btn-sm">
                        {{$tag->name}}
                    </button>
                </a>
            @endforeach
        @endif

        <hr>

        <ul class="list-group">
            <div class="comments">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->created_at->diffForHumans()}}: &nbsp;
                        </strong>
                        {{$comment->body}}
                    </li>
                @endforeach
            </div>
        </ul>

        <hr>
            {{-- Add a comment --}}
            <div class="card">
                <div class="card-block">

                    <form action="/posts/{{$post->id}}/comments" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea class="form-control" name="body" placeholder="Your comment here.." cols="55" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add comment</button>
                        </div>
                    </form>
                    
                    @include('layouts.errors')
                </div>
            </div>
        </ul>
    </div>
@endsection
