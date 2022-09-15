<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidationLogin;
use App\Http\Requests\RequestValidationRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function loginPost(RequestValidationLogin $request)
    {
        if(Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('welcome');
        }
        return back()->with(['errorSuccess' => 'Не верный логин или пароль']);
    }
    public function register()
    {
        return view('register');
    }
    public function registerPost(RequestValidationRegister $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return back()->with(['success' => true]);
    }

}
