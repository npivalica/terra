<form action="@if($action == "posts.update") {{ route($action, $post) }} @else {{ route($action) }} @endif" method="POST" enctype="multipart/form-data">
    @csrf
    @if($action == "posts.update")
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" placeholder="Max 60 characters" name="title" value="{{ $post->title ?? old('title') }}" />
        @error('title')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $post->description ?? old('description') }}" placeholder="Max 100 characters">
        @error('description')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" rows="10" name="content">{{ $post->content ?? old('content') }}</textarea>
        @error('content')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <div class="row mx-1">
            @foreach($categories as $category)
            <div class="custom-control custom-checkbox mr-5">
                <input type="checkbox" class="custom-control-input" id="category{{ $category->id }}" name="category_id[]" value="{{ $category->id }}"
                    @if(isset($post) && in_array($category->id, $post->categories()->pluck('category_id')->toArray()))
                        checked
                    @elseif(is_array(old('category_id')) && in_array($category->id, old('category_id')))
                        checked
                    @endif
                />
                <label class="custom-control-label" for="category{{ $category->id }}">{{ $category->name }}</label>
            </div>
            @endforeach
        </div>
        @error('category_id')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label class="" for="image">Choose image</label>
        <input type="file" class="form-control" id="image" name="image" />
        @error('image')
            <div class="text-danger">
                {{$message}}
            </div>
        @enderror
    </div>
    <button class="btn btn-secondary w-100" type="submit">Submit</button>
</form>

