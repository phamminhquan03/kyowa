<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePage;
use App\Models\HomepageBanner;

class HomePageController extends Controller
{
    public function edit()
    {
        $home = HomePage::first();

        $banners = HomepageBanner::all();

    return view('admin.home.edit', compact('home', 'banners'));
}
public function deleteBanner($id)
{
    $banner = HomepageBanner::findOrFail($id);

    $imagePath = public_path('uploads/' . $banner->image);

    if (file_exists($imagePath)) {

        unlink($imagePath);

    }

    $banner->delete();

    return back()->with('success', 'Đã xoá ảnh');

}
   public function update(Request $request)
{
    $home = HomePage::first();

    if (!$home) {

        $home = new HomePage();

    }

    $home->title = $request->title;

    $home->subtitle = $request->subtitle;

    $home->description = $request->description;

    // upload nhiều banner
 if ($request->hasFile('banners')) {

    $currentCount = HomepageBanner::count();
    $remaining = 3 - $currentCount;

    if ($remaining <= 0) {
        return back()->with('error', 'Chỉ tối đa 3 banner');
    }

    foreach ($request->file('banners') as $file) {

        if ($remaining <= 0) {
            break;
        }

        $filename = time() . rand(1000,9999) . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads'), $filename);

        HomepageBanner::create([
            'image' => $filename
        ]);

        $remaining--; // ⭐ giảm slot thay vì tăng count
    }
}

    // upload ảnh công ty
    if ($request->hasFile('company_image')) {

        $file = $request->file('company_image');

        $filename = time() . '_company.' . $file->getClientOriginalExtension();

        $file->move(public_path('uploads'), $filename);

        $home->company_image = $filename;
    }

    $home->save();

    return back()->with('success', 'Cập nhật thành công');
}
}