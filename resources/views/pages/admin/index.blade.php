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
    Users
@endsection
@section('content')
<table class="table table-dark table-hover">
    <thead class="thead-dark">
      <tr class="text-center">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created_at
            <form action="{{ route('users.sort') }}" method="GET" class="d-inline">
            @csrf
            <button type="submit" class="btn text-primary p-0"><i class="fas fa-sort"></i></button>
        </form></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class="text-center">

            <th scope="row">{{ $user->id }}</th>

            <td>{{ $user->first_name.' '.$user->last_name }}</td>

            <td>{{ $user->email }}</td>

            <td>{{  date("F, d Y h:i", strtotime($user->created_at)) }}</td>

            <td>
                {{-- <a href="{{ route('users.edit', $user) }}" class="btn btn-dark"><i class="fas fa-user-edit"></i> Edit</a> --}}
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            <tr>
        @endforeach
    </tbody>
  </table>
  <h3>Active Users</h3>
  <table class="table table-dark table-hover">
    <thead class="thead-dark">
      <tr class="text-center">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Logged_in_at</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($active_users as $user)
            <tr class="text-center">

            <th scope="row">{{ $user->id }}</th>

            <td>{{ $user->user->first_name.' '.$user->user->last_name }}</td>

            <td>{{ $user->user->email }}</td>

            <td>{{  date("F, d Y h:i", strtotime($user->logged_in_at)) }}</td>
            <tr>
        @endforeach
    </tbody>
  </table>
@endsection
