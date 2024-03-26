<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:vendor')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('vendor.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('vendor')->attempt($credentials)) {
            return redirect()->intended('vendor/dashboard');
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Geçersiz kimlik bilgileri']);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('vendor')->logout();
        return redirect('/vendor/login');
    }
}
