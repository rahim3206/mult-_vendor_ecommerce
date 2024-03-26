<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest:vendor');
    }
    public function index()
    {
        return view('vendor.auth.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255|unique:vendors',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $vendor = new Vendor();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->name = $request->first_name." ".$request->last_name;
        $vendor->email = $request->email;
        $vendor->password = bcrypt($request->password);
        $vendor->save();

        return redirect()->route('vendor.login.get')->with('success', 'Registration Successful');
    }
}
