<?php

namespace App\Http\Controllers;

use App\Models\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function edit(User $user) //edit form
    {
        # code...
    }
    public function settings(Request $request, User $user) //update
    {

    }
    public function sort()
    {
        $sortOrder = request()->session()->get('sort', 'desc');
        $this->data['users'] = User::orderBy('created_at', $sortOrder)->get();
        $sortOrder = $sortOrder == 'desc' ? 'asc': 'desc';
        request()->session()->put('sort', $sortOrder);

        $this->data['active_users'] = ActiveUser::all();

        return view('pages.admin.index', $this->data);
    }
    public function destroy(User $user)
    {
        $user->role()->disassociate();
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully!');
    }
}
