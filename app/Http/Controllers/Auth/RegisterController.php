<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view("auth.register");
    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
//            'password' => Hash::make($request->password)
        ];
        $data = $request->only('name','email', 'password');
        $data = $request->except('email');

        dd($data);
        return User::create($data);
    }
}
