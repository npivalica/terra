<div class="card mb-4">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <a href="{{ route('posts.show', ['post' => $post]) }}">
            <img class="img-fluid rounded" src="{{ asset('assets/img/'.$post->image) }}" alt="{{ $post->title }}">
          </a>
        </div>
        <div class="col-lg-6">
          <h2 class="card-title">{{ $post->title }}</h2>
          <p class="card-text">{{ $post->description }}</p>
          <a href="{{ route('posts.show', ['post' => $post]) }}" class="btn btn-success">Read More &rarr;</a>
        </div>
      </div>
    </div>
    <div class="card-footer text-muted">
        Posted on {{ date("F, d Y h:i", strtotime($post->created_at)) }}
        <span class="text-primary">{{ $post->user->first_name.' '.$post->user->last_name }}</span>
    </div>
</div>
