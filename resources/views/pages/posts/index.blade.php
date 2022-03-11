@extends('layouts.posts')
@section('title')
    Posts
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, environment
@endsection
@section('description')
    This is a posts page for blog - terra about nature and mindfulness.
@endsection
@section('posts')
    <div class="row @if (count($posts) < 1)
    min-vh-100
    @endif ">
        @if (count($posts) < 1)
            <div class="col-6">
                <h1>No posts yet.</h1>
            </div>
        @else
            <div class="col-6">
                <h1>Posts</h1>
            </div>
        @endif
        @if (session()->has('user') || session()->has('admin'))
            <div class="col-6 text-right mt-2">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Add a post</a>
            </div>
        @endif
    </div>
    <div class="row">
        <hr/>
        @foreach ($posts as $post)
            @include('partials.post')
        @endforeach
    </div>
<!-- /.row -->

<!-- Pagination -->
    {{ $posts->links() }}
@endsection
@section('search')
    <!-- Search Widget -->
    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form action="{{ route('posts.search') }}" method="get">
                <div class="input-group">
                <input type="text" name="query" class="form-control" placeholder="Search for...">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('categories')
    <div class="card">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-6">
                        <a href="{{ route('posts.search', ['cat_id' => $item->id]) }}">{{ $item->name }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
