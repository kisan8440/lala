<?php

namespace App\Http\Controllers;

use App\User;
use App\UserCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $cartItem = UserCart::with(['prodDetails', 'itemDetails'])->where(['UserCSL' => Auth::user()->csl, 'carttype' => 'cart'])->orderBy('csl', 'desc')->take(2)->get();
        return view('user.dashboard')->with(compact('cartItem'));
    }

    public function checkout()
    {
        return view('user.checkout');
    }

    public function attemptLogin(Request $request)
    {
        //validate request for login
        $request->validate([
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|min:8|max:20',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->with('error', 'Opps! You have entered invalid credentials.');
        
    }

    public function storeUser(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|min:2|max:191',
            'lastname' => 'required|string|min:2|max:191',
            'email' => 'required|unique:WebSiteUser|string|email|max:191',
            'password' => 'required|string|min:8|max:20|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'websiteuserpassword' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Congratulations! Your registration is successful. Please login.');
        
    }

}
