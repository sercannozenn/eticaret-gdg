<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
//        $credentials['status'] = 1;
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember))
        {
            $user = Auth::user();
            if (!$user->hasVerifiedEmail())
            {
                Auth::logout();
                alert()->warning('Uyarı','Giriş yapabilmeniz için öncelikle mailinizi doğrulamanız gerekmektedir.');
                return redirect()->back();
            }
        }
        return redirect()->intended("/admin");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }
}
