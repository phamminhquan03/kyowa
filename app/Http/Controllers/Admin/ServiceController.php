<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
   public function index()
{
    $services = Service::latest()->paginate(10);

    return view('admin.service.list', compact('services'));
}

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $service = new Service();

        $service->title = $request->title;
        $service->description = $request->description;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $service->image = $filename;
        }

        $service->save();

        return redirect('/admin/service');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->title = $request->title;
       $service->description = $request->description;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $service->image = $filename;
        }

        $service->save();

        return redirect('/admin/service');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return back();
    }
}