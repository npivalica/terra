@extends('layouts.admin')
@section('title')
    Admin
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, meditation, tree, river, admin, dashboard
@endsection
@section('description')
    This is a blog admin page.
@endsection
@section('page')
    Posts
@endsection
@section('content')
<table class="table table-dark table-hover">
    <thead class="thead-dark">
      <tr class="text-center">
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th class="d-flex justify-content-between">Created_at
            <form action="{{ route('posts.sort') }}" method="GET" class="d-inline">
            @csrf
            <button type="submit" class="btn text-primary p-0"><i class="fas fa-sort"></i></button>
        </form></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr class="text-center">

            <th scope="row">{{ $post->id }}</th>

            <td>{{ $post->title }}</td>

            <td>{{ $post->description }}</td>

            <td>{{  date("F, d Y h:i", strtotime($post->created_at)) }}</td>

            <td class="text-right">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-secondary mb-1"><i class="fas fa-post-edit"></i> Edit</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mb-1">Delete</button>
                </form>
                <form action="{{ route('posts.update', $post) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn @if ($post->editor_pick == true) btn-success @else btn-danger @endif">EditorPick</button>
                </form>
            </td>
            <tr>
        @endforeach
    </tbody>
  </table>
@endsection
