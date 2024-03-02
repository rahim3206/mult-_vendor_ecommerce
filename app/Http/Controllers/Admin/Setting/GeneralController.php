<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        return view('admin.settings.general.index');
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

            $site_logo = $request->file('site_logo');
            $ext = rand().".".$site_logo->getClientOriginalName();
            $site_logo->move("settings/site/",$ext);
            $general->site_logo = $ext;
        }
        if(isset($request->site_favicon)){
            $site_favicon = $request->file('site_favicon');
            $ext = rand().".".$site_favicon->getClientOriginalName();
            $site_favicon->move("settings/site/",$ext);
            $general->site_favicon = $ext;
        }
        $general->update();
        return redirect()->back()->with('success', 'General settings has been updated successfully');
    }

    public function logo_delete()
    {
        $general = General::first();
        $general->site_logo = null;
        $general->update();
        return redirect()->back()->with('success', 'Logo has been deleted successfully');
    }
    public function favicon_delete()
    {
        $general = General::first();
        $general->site_favicon = null;
        $general->update();
        return redirect()->back()->with('success', 'Favicon has been deleted successfully');
    }
}
