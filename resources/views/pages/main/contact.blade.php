@extends('layouts.default')
@section('title')
    Contact
@endsection
@section('keywords')
    blog, home, posts, mindfulness, nature, water, trees, wind, contact, admin
@endsection
@section('description')
    This is a blog home page where you can read about nature and mindfulness.
    You can contact admin here.
@endsection

@section('content')
<div class="container">
    <h1>Contact our admins here</h1>
<form action="{{ route('contact.sendEmail') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Your email address</label>
      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email" value="{{ old('email') ?? '' }}">
        @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">How would you rate us?</label>
      <select class="form-control" id="exampleFormControlSelect1" name="rating" selected="{{ old('rating') ?? 'Don\'t want to rate you' }}">
        <option value="0">Rate us from 1 to 5</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Send a message</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="content">{{ old('content')  ?? ''}}</textarea>
        @error('content')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
