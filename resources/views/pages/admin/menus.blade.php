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
    Menus
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
        @foreach ($menus as $item)
            <tr class="text-center">

            <th scope="row">{{ $item->id }}</th>

            <td>{{ $item->name }}</td>

            <td>{{ $item->route }}</td>

            <td>{{  date("F, d Y h:i", strtotime($item->created_at)) }}</td>

            <td>
                <form action="{{ route('menus.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <tr>
        @endforeach
    </tbody>
  </table>
  <h3>Add a  menu item</h3>
  <form class="col-6" action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="title" name="name" />
        @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="route">Route</label>
        <input type="text" class="form-control" id="route" name="route" />
        @error('route')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </div>
@endsection
