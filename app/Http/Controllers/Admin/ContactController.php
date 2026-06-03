<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    // Danh sách liên hệ
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    // Xem chi tiết liên hệ
    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contacts.show', compact('contact'));
    }

    // Xóa liên hệ
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect('/admin/contacts')
            ->with('success', 'Xóa liên hệ thành công');
    }
public function sendReply(Request $request, $id)
{
    $contact = Contact::findOrFail($id);

    Mail::to($contact->email)->send(
        new ContactReplyMail(
            $request->subject,
            $request->message
        )
    );

    $contact->update([
        'is_replied' => true
    ]);

    return back()->with(
        'success',
        'Đã gửi email thành công'
    );
}
}
?>