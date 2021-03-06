@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h2>Create a post</h2>

        <hr>

        <form action="/posts" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title of your post: </label>
                <input type="text" class="form-control" id="title" placeholder="What will you call your post?" name="title" >
            </div>

            <div class="form-group">
                <label for="body">Post</label>
                <textarea  class="form-control" id="body" placeholder="Start writing your post here..." name="body" ></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            @include('layouts.errors')

        </form>

    </div>

    
    @endsection