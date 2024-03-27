<?php

namespace App\Http\Controllers\Admin;

use App;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['vendors'] = Vendor::orderByDesc('id')->simplePaginate(10);
        return view('admin.vendor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);
        $vendor = new Vendor();
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->name = $request->first_name." ".$request->last_name;
        $vendor->phone = $request->phone;
        $vendor->email = $request->email;
        $vendor->address = $request->address;
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        $vendor->status = '0';
        $vendor->password = bcrypt($request->password);
        $vendor->save();
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor Created Successfully');
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
        $data['vendor'] = Vendor::find($id);
        return view('admin.vendor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        if($request->password)
        {
            $request->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ]);
        }
        $vendor = Vendor::find($id);
        $vendor->first_name = $request->first_name;
        $vendor->last_name = $request->last_name;
        $vendor->name = $request->first_name." ".$request->last_name;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->country = $request->country;
        $vendor->city = $request->city;
        if($request->password)
        {
            $vendor->password = bcrypt($request->password);
        }
        $vendor->update();
        return redirect()->route('admin.vendors.index')->with('success', 'Vendor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();
        return redirect()->route('admin.vendors.index')->with('error', 'Vendor Deleted Successfully');
    }

    public function change_status(Request $request)
    {
        $vendor = Vendor::find($request->id);
        $vendor->status = $request->status;
        $vendor->update();
        return response()->json(['status' => 'Vendor Status Updated Successfully']);
    }
}
