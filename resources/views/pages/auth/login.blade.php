@extends('layouts.default')
@section('title')
    Login
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, meditation, tree, river, login
@endsection
@section('description')
    This is a login page for blog - terra about nature and mindfulness.
@endsection
@section('content')
<div class="row">

    <div class="col-md-6 mx-auto">

        <div class="card card-body bg-light mt-5">

            <h2>Login</h2>

            <p>Pleaser fill out the form to login</p>

            <form action="{{ route('auth.login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <label for="email">Email: <sup>*</sup></label>

                    <input type="text" name="email" class="form-control form-control-lg" value="{{ old('email') ?? '' }}">

                    @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password">Password: <sup>*</sup></label>

                    <input type="password" name="password" class="form-control form-control-lg">

                    @error('password')
                    <div class="text-danger">
                        {{$message}}
                    </div>
                @enderror


                </div>

                <div class="row">

                    <div class="col">

                        <input type="submit" id="loginSubmit" value="Login" class="btn btn-success btn-block">

                    </div>

                    <div class="col">

                        <a href="{{ route('auth.create') }}" class="btn btn-light btn-block">Don't have an account? Register</a>

                    </div>

                </div>

            </form>

        </div>



    </div>

</div>
@endsection
