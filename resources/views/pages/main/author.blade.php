@extends('layouts.default')
@section('title')
    Author
@endsection
@section('keywords')
    blog, home, posts, nature, mindfulness, author, nikolina, pivalica
@endsection
@section('description')
    This is a blog home page where you can read about nature and mindfulness.
    And this is author's page.
@endsection

@section('content')
<div class="row d-flex justify-content-center my-3">
    <div class="col-md-8 ">
        <div class="card w-100" style="width: 18rem;">
            <img src="{{ asset('assets/img/author.png') }}" class="card-img-top" alt="Nikolina Pivalica">
            <div class="card-body">
                <h4 class="card-title">Nikolina Pivalica 9/17</h4>
                <p class="card-text">This was one of my projects for Visoka ICT, check out <span><a target="blank" href="https://github.com/npivalica" target="_blank">github</a></span> for other projects</p>
                <p>You can contact me on <a href="https://www.linkedin.com/in/nikolina-pivalica/" target="_blank">LinkedIn</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
