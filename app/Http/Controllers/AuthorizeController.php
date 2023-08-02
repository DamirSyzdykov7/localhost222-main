<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SignIn;
use Illuminate\Support\Facades\Auth;

class AuthorizeController extends Controller
{
    public function showLoginForm()
    {
        return view('regist');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $user = SignIn::where('login', $credentials['login'])->first();

        if ($user && $user->password == $credentials['password']) {
            Auth::login($user);
            return redirect('/main');
        } else {
            return back()->withErrors('Неверные данные');
        }
    }

    public function ShowRegistForm() {
        return view('signup');
    }

    public function registration(Request $request) {
        $request->validate([
            'login' => 'required|unique:SignIn',
            'password' => 'required',
        ]);

        $user = new SignIn();
        $user->login = $request->input('login');
        $user->password = $request->input('password');
        $user->save();

        return redirect('/');
    }
}
