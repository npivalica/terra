@extends('layouts.default')

@section('title') Home @endsection
@section('description') Create a new post @endsection
@section('keywords') post, blog, create @endsection

@section('content')
<div class="container mb-3 min-vh-100">
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Add a new post</h3>
            <hr />
            @include('pages.posts.form', ["action" => "posts.store"])
        </div>
    </div>
</div>
@endsection
