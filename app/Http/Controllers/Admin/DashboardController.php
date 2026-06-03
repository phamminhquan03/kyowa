<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Service;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contact::count();
        $services = Service::count();
        $news = News::count();

        $contacts_replied = Contact::where('is_replied', 1)->count();
        $contacts_pending = Contact::where('is_replied', 0)->count();

        return view('admin.dashboard', compact(
            'contacts',
            'services',
            'news',
            'contacts_replied',
            'contacts_pending'
        ));
    }
}