<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomepageBanner;

class BannerController extends Controller
{
    // LIST
    public function index()
    {
        $banners = HomepageBanner::all();
        return view('admin.banner.index', compact('banners'));
    }

    // STORE
    public function store(Request $request)
    {
        if ($request->hasFile('banners')) {

            $count = HomepageBanner::count();

            foreach ($request->file('banners') as $file) {

                if ($count >= 3) break;

                $filename = time() . rand(1000,9999) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('uploads'), $filename);

                HomepageBanner::create([
                    'image' => $filename
                ]);

                $count++;
            }
        }

        return back()->with('success', 'Upload banner thành công');
    }

    // DELETE
    public function destroy($id)
    {
        $banner = HomepageBanner::findOrFail($id);

        $path = public_path('uploads/' . $banner->image);

        if (file_exists($path)) {
            unlink($path);
        }

        $banner->delete();

        return back()->with('success', 'Xoá thành công');
    }
}