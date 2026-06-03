<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
 public function store(Request $request)
{
    Contact::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Gửi liên hệ thành công');
}
}