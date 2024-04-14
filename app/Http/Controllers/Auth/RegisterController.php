<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisterEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only('name','email', 'password');

        $user = User::create($data);
//        event(new UserRegisterEvent($user));
//
//        $remember = $request->has('remember');
//        Auth::login($user, $remember);

        alert()->info('Bilgilendirme','Lütfen mailinize gelen onay mailini onaylayın.');

        return redirect()->back();
    }

    public function verify(Request $request)
    {
        $userID = Cache::get('verify_token_' . $request->token);

        if (!$userID)
        {
            alert()->warning('Uyarı','Tokenın geçerlilik süresi dolmuş');
            return redirect()->route('register');
        }

        $user = User::findOrFail($userID);
        $user->email_verified_at = now();
        $user->save();

        Cache::forget('verify_token_' . $request->token);

        Auth::login($user);
        alert()->success('Başarılı','Hesabınız onaylandı.');
        return redirect()->route('admin.index');
    }
}
