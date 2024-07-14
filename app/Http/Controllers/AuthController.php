<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return [
                'error' => $validator->errors()
            ];
        }

        $credentials = $request->only('email', 'password');

        if(Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            $user->isOnline = true;
            $user->save();
            return redirect()->route('dashboard');
        }

    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return [
                'error' => $validator->errors()
            ];
        }

        User::create([
            'fullname' => $request->input('firstname') . ' ' . $request->input('lastname'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return [
            'message' => 'User created'
        ];
    }

    public function logout() {
        $user = Auth::user();
        $user->isOnline = false;
        $user->last_seen = Carbon::now()->timestamp;
        $user->save();
        Auth::logout();
        return redirect()->route('login');
    }

}
