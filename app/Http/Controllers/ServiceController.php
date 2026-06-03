<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Trang tất cả dịch vụ
    public function index()
    {
        $services = Service::all();

        return view('service.index', compact('services'));
    }

    // Trang chi tiết 1 dịch vụ
 public function show($slug)
{
    $service = Service::where('slug', $slug)->firstOrFail();

    return view('service.show', compact('service'));
}
    }
