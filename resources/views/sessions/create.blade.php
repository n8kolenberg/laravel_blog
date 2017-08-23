@extends('layouts.master')


@section('content')
    <div class="col-sm-8">
        <h2>Sign In</h2>
        <form action="/login" method="POST">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Sign In</button>
            </div>

            @include('layouts.errors')

        </form>
    </div>
@endsection

