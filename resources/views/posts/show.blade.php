@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{$post->title}}</h1>
        <hr>
        <p>{{$post->body}}</p>
        <p class="text-muted">Created {{$post->created_at->diffForHumans()}}</p>
    </div>
@endsection
