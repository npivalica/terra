@extends('layouts.default')
@section('title')
    Register
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, meditation, tree, river, register
@endsection
@section('description')
    This is a register page for blog - terra about nature and mindfulness.
@endsection
@section('content')
<div class="row">

    <div class="col-md-6 mx-auto">

        <div class="card card-body bg-light mt-5">

            <h2>Create An Account</h2>

            <p>Please fill out the form to register</p>

            <form id="register" action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">

                    <label for="first_name">First name: <sup>*</sup></label>

                    <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" placeholder="John" value="{{ old('first_name') ?? ''}}">

                    @error('first_name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="last_name">Last name: <sup>*</sup></label>

                    <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" placeholder="Johnson" value="{{ old('last_name') ?? ''}}">

                    @error('last_name')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="email">Email: <sup>*</sup></label>

                    <input type="text" id="email" name="email" class="form-control form-control-lg" placeholder="your_email123@gmail.com" value="{{ old('email') ?? ''}}">

                    @error('email')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password">Password: <sup>*</sup></label>

                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="At least 6 characters">

                    @error('password')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="submit" id="regUser" value="Register" class="btn btn-success btn-block send" data-page="register">
                    </div>
                    <div class="col">
                        <a href="{{ route('auth.index') }}" class="btn btn-light btn-block">Have an account? Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
