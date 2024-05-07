<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
        else
        {
            return redirect()->back()->withErrors([
                'email' => "Bilgilerinizi lütfen kontrol edin."
                                                  ]);
        }

        if ($user->hasRole(['super-admin', 'category-manager','product-manager', 'order-manager', 'user-manager']))
        {
            return redirect()->route('admin.index');
        }

        return redirect()->route('order.index');
//        return redirect()->intended("/admin");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }

    public function socialite($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function socialiteVerify($driver)
    {
        $user = Socialite::driver($driver)->user();

        $checkUser = User::query()->where('email', $user->getEmail())->first();
        if ($checkUser)
        {
            Auth::login($checkUser);
            return redirect()->route('index');
        }
        $createUser = User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt(123456),
            'email_verified_at' => now()
                     ]);

        Auth::login($createUser);
        return redirect()->route('index');
    }
}
