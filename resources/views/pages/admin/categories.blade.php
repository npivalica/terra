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
    Categories
@endsection
@section('content')
<table class="table table-dark table-hover">
    <thead class="thead-dark">
      <tr class="text-center">
        <th>#</th>
        <th>Name</th>
        <th>Created_at</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr class="text-center">

            <th scope="row">{{ $category->id }}</th>

            <td>{{ $category->name }}</td>

            <td>{{  date("F, d Y h:i", strtotime($category->created_at)) }}</td>

            <td>
                {{-- <a href="{{ route('categories.edit') }}" class="btn btn-dark"><i class="fas fa-post-edit"></i> Add</a> --}}
                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <tr>
        @endforeach
    </tbody>
  </table>
  <h3>Add a  category</h3>
  <form class="col-6" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="title" name="name" />
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </div>
@endsection
