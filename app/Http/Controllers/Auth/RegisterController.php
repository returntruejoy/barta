<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:256'],
            'last_name' => ['required', 'string', 'max:256'],
            'email' => ['required', 'email', 'max:250', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);

        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->back()->withSuccess('You have been registered.');
    }
}
