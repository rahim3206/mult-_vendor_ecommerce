<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['customers'] = User::orderByDesc('id')->simplePaginate(10);
        return view('admin.customer.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required  | email | unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'

        ]);

        $customer = new User();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->city = $request->city;
        $customer->role = '0';
        $customer->password = bcrypt($request->password);
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success', 'Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['customer'] = User::find($id);
        return view('admin.customer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if($request->password)
        {
            $request->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ]);
        }
        $customer = User::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->city = $request->city;
        if($request->password)
        {
            $customer->password = bcrypt($request->password);
        }
        $customer->update();
        return redirect()->route('admin.customers.index')->with('success', 'Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('error', 'Customer Deleted Successfully');
    }
}
