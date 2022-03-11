@extends('layouts.default')

@section('title') Edit {{ $post->title }} @endsection
@section('description') Edit a post. @endsection
@section('keywords') blog, online, edit, post @endsection

@section('content')
<div class="container mb-3 min-vh-100">
    <div class="card mt-4">
        <div class="card-body">
            <h3 class="card-title">Edit a post</h3>
            <hr />
            @include('pages.posts.form', ["action" => "posts.update"])
        </div>
    </div>
</div>
@endsection
