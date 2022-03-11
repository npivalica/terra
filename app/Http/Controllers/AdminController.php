<?php

namespace App\Http\Controllers;

use App\Models\ActiveUser;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //users
    {
        $this->data['users'] = User::where('id', '<>', session()->get('admin')->id)->get();
        $this->data['active_users'] = ActiveUser::with('user')->get();
        return view('pages.admin.index', $this->data);
    }

    public function posts()
    {
        $this->data['posts'] = Post::all();
        return view('pages.admin.posts', $this->data);
    }

    public function categories()
    {
        $this->data['categories'] = Category::all();
        return view('pages.admin.categories', $this->data);
    }

    public function menus()
    {
        $this->data['menus'] = Menu::all();
        return view('pages.admin.menus', $this->data);
    }

    public function destroyMenu(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menus')->with('success', 'Menu item deleted successfully!');
    }

    public function destroyCategory(Category $category)
    {
        $category->posts()->detach();
        $category->delete();
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }

    public function storeCat(Request $request)
    {
         Category::validate($request);

         DB::beginTransaction();
         try
         {
             Category::create([
                 'name' => $request->input('name')
             ]);
             DB::commit();

             return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
         }
         catch(Exception $e)
         {
             DB::rollBack();
             return redirect()->route('admin.categories')->with('errorMessage', 'An error occurred!');
         }
    }

    public function storeMenu(Request $request)
    {
         Menu::validate($request);

         DB::beginTransaction();
         try
         {
             $count = count(Menu::all());
             Menu::create([
                 'name' => $request->input('name'),
                 'route' => $request->input('route'),
                 'order' => $count+1
             ]);
             DB::commit();

             return redirect()->route('admin.menus')->with('success', 'Menu item added successfully!');
         }
         catch(Exception $e)
         {
             DB::rollBack();
             return redirect()->route('admin.menus')->with('errorMessage', 'An error occurred!');
         }
    }
}
