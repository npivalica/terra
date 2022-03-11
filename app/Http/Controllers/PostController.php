<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['posts'] = Post::with('categories')->with('user')->paginate(3);
        $this->data['categories'] = Category::all();
        return view('pages.posts.index', $this->data);
    }

    public function search(Request $request)
    {
        if($request->has('cat_id')) {
            $posts = Category::find($request->input('cat_id'))->posts()->paginate(3);
        }
        if($request->has('query')) {
            $posts = Post::where('title', 'LIKE', '%'.$request->input('query').'%')->paginate(3);
        }

        $this->data['posts'] = $posts->withQueryString();
        $this->data['categories'] = Category::all();
        return view('pages.posts.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] = Category::all();
        return view('pages.posts.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if(session()->has('admin')){
            $user_id = session()->get('admin')->id;
        }else{
            $user_id = session()->get('user')->id;
        }

        DB::beginTransaction();

        try
        {
            if($request->image){
                $image = Post::uploadImage($request->image);
                $post = Post::create($request->except(['image']) + ["image" => $image] + ["user_id" => $user_id]);
            }else{
                $post = Post::create($request->except('image') + ["user_id" => $user_id]);
            }
            $post->categories()->attach($request->category_id);

            DB::commit();

            return redirect()->route('posts.create')->with('success', 'Post added successfully!');
        }
        catch(Exception $e)
        {
            dd($e);
            DB::rollBack();
            return redirect()->route('posts.create')->with('errorMessage', 'An error occurred!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $this->data["post"] = $post;
        // Post::where('user_id', $post->user_id)->with('categories')->with('user')->first(); ?????
        return view('pages.posts.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->data["categories"] = Category::all();
        if(session()->has('user')){
            if($post->user_id !== session()->get('user')->id){
                return redirect()->route('posts.index')->with('errorMessage', 'You can only edit your own posts!');
            }
        }
        $this->data["post"] = $post;
        return view('pages.posts.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $referer = explode('/', request()->header('referer'));
        $referer = $referer[count($referer)-2];
        if($referer == 'admin'){
            $post = Post::find($post->id);
            $post->editor_pick = !$post->editor_pick;
            $post->save();

            return redirect()->route('admin.posts')->with('success', 'Post selected as editor\'s pick');
        }
        if(session()->has('user')){
            if($post->user_id !== session()->get('user')->id){
                return redirect()->route('posts.index')->with('errorMessage', 'You can only edit your own posts!');
            }
        }
        try
        {
            $post->update($request->except('image'));
            $post->categories()->sync($request->category_id);

            if($request->has('image')){
                Post::uploadImage($request->image);
                Post::deleteImage($post->image);
                $newImage = Post::uploadImage($request->image);
                $post->image = $newImage;
                $post->save();
            }

            DB::commit();

            return redirect()->route('posts.edit', $post->id)->with('success', 'Post edited successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('posts.edit', $post->id)->with('errorMessage', 'An error occurred!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();
        return redirect()->route('admin.posts')->with('success', 'Post deleted successfully!');
    }

    public function sort()
    {
        $sortOrder = request()->session()->get('sort', 'desc');
        $this->data['posts'] = Post::orderBy('created_at', $sortOrder)->get();
        $sortOrder = $sortOrder == 'desc' ? 'asc': 'desc';
        request()->session()->put('sort', $sortOrder);

        return view('pages.admin.posts', $this->data);
    }
}
