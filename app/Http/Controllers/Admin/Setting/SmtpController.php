<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\SmtpSetup;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function index()
    {
        return view('admin.settings.smtp.index');
    }
    public function update(Request $request)
    {
        $request->validate([
            'smtp_host' => 'required',
            'smtp_port' => 'required | numeric',
            'smtp_encryption' => 'required',
            'smtp_username' => 'required',
            'smtp_password' => 'required',
            'smtp_from_name' => 'required',
            'smtp_from_email' => 'required',
            'smtp_transport' => 'required',
            'status' => 'required',
        ]);
        $smtp = SmtpSetup::first();
        $smtp->smtp_from_name = $request->smtp_from_name;
        $smtp->smtp_from_email = $request->smtp_from_email;
        $smtp->smtp_transport = $request->smtp_transport;
        $smtp->smtp_host = $request->smtp_host;
        $smtp->smtp_port = $request->smtp_port;
        $smtp->smtp_encryption = $request->smtp_encryption;
        $smtp->smtp_username = $request->smtp_username;
        $smtp->smtp_password = $request->smtp_password;
        $smtp->status = $request->status;
        $smtp->update();
        return redirect()->back()->with('success', 'SMTP settings has been updated successfully');
    }
}
