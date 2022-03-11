<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\ActiveUser;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends BaseController
{
    public function index()
    {
        return view('pages.auth.login', $this->data);
    }

    public function create()
    {
        return view('pages.auth.register', $this->data);
    }

    public function register(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try
        {
            User::create($request->except('password') + ['password'=>Hash::make($request->password)]);
            DB::commit();
            if(request()->path() == 'admin/*'){
                return redirect()->route('admin.index')->with('success', 'User added successfully');
            }
            return redirect()->route('auth.index')->with('success', 'You can now login!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('home.index')->with('errorMessage', 'An error occurred! Try later.');
        }
    }
    public function login(UserLoginRequest $request)
    {

        $email = $request->input('email');
        $password = $request->input('password');
        try {
            $user = User::where('email',$email)->first();

            if($user) {
                if(Hash::check($password, $user->password)) {
                    ActiveUser::create([
                        'user_id' => $user->id
                    ]);

                    if($user->role_id == 1){
                        $request->session()->put('admin', $user);
                        return redirect()->route('admin.index')->with('success', 'Welcome admin!');
                    }
                    $request->session()->put('user', $user);
                    return redirect()->route('posts.index')->with('success', 'You are now logged in!');
                }
                return redirect()->route('auth.index')->with('errorMessage', 'Wrong password, try again');
            }
            return redirect()->route('auth.create')->with('errorMessage', 'No such user. You need to register first!');

        } catch (\Exception $e) {
            dd($e);
            Log::error($e->getMessage());
            return redirect()->route('home.index')->with('errorMessage', 'An error occured, try later.');
        }
    }

    public function logout()
    {
        if(session()->has('user')){
            $userSession = session()->get('user');
            ;
            $user = ActiveUser::where('user_id', $userSession->id)->first();
            $user->delete();
            session()->remove('user');
            return redirect()->route('auth.index')->with('success', 'You are logged out.');
        }
        $userSession = session()->get('admin');
        $user = ActiveUser::where('user_id', $userSession->id)->first();
        $user->delete();
        session()->remove('admin');

        return redirect()->route('auth.index')->with('success', 'You are logged out.');
    }
}
