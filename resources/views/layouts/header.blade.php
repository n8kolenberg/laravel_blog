

<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">New features</a>



            @if(Auth::check())
                <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
                <a class="nav-link" href="/logout">Log out</a>
                @else
                <a class="nav-link ml-auto" href="/login">Login</a>
                <a class="nav-link pull-0" href="/register">Register</a>
            @endif
        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">

        @if($flash = session('message'))
        <div id="post_flash" class="alert alert-success">
            {{$flash}}
        </div>
        @endif


        <h1 class="blog-title">The Bootstrap Blog</h1>
        <p class="lead blog-description">An example blog template built with Bootstrap.</p>
       @if(Auth::check())
            <div class="col-sm-12 blog-main">
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
           @endif
    </div>
</div>