<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $general = General::first();
        return view('admin.settings.general.index',compact('general'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required',
            'site_email' => 'required | email',
            'site_phone' => 'required',
            'site_address' => 'required',
            'site_country' => 'required',
            'site_state' => 'required',
            'site_city' => 'required',
            'site_postal' => 'required',
        ]);

        $general = General::first();
        $general->site_name = $request->site_name;
        $general->site_email = $request->site_email;
        $general->site_phone = $request->site_phone;
        $general->site_address = $request->site_address;
        $general->site_country = $request->site_country;
        $general->site_state = $request->site_state;
        $general->site_city = $request->site_city;
        $general->site_postal_code = $request->site_postal;
        if(isset($request->site_logo)){
        $general->site_logo = 'dfg';
        }
        if(isset($request->site_favicon)){
            $general->site_favicon = 'gfhgf';
        }
        $general->update();
        return redirect()->back()->with('success', 'General settings has been updated successfully');
    }
}
