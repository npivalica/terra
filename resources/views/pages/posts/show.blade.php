@extends('layouts.default')
@section('title')
    {{ $post->title }}
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, trees
@endsection
@section('description')
    This is a post page for blog - terra about nature and mindfulness.
@endsection
@section('content')
<div class="row">
    <div class="col-12">
    <h1 class="mt-4 mb-3">{{ $post->title }}
        <small>by
          <span class="text-primary">{{ $post->user->first_name }}</span>
        </small>
      </h1>
    </div>
</div>
{{-- <div class="container"> --}}
<div class="row">

    <!-- Post Content Column -->

      <!-- Preview Image -->

      <!-- Date/Time -->
      <div class="col-6">
      <p class="py-3 mt-3 border-top border-bottom border-secondary">Posted on {{ date("F, d Y h:i", strtotime($post->created_at)) }}</p>

      <!-- Post Content -->
      <p class="lead">{{ $post->content }}</p>
    </div>
    <div class="col-6">
        <img class="img-fluid rounded" src="{{ asset('assets/img/'.$post->image) }}" alt="{{ $post->title }}">
          </div>
{{-- </div> --}}
@if (session()->has('admin') || session()->get('user')->id == $post->user_id)
<a href="{{ route('posts.edit', $post) }}" class="btn btn-dark">Edit</a>
@endif

</div>
@endsection
