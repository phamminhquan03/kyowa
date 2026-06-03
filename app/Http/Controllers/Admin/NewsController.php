<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $filename = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);
        }

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename
        ]);

        return redirect('/admin/news')
            ->with('success', 'Thêm tin tức thành công');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $filename);

            $news->image = $filename;
        }

        $news->title = $request->title;

        $news->description = $request->description;

        $news->save();

        return redirect('/admin/news')
            ->with('success', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return back()->with('success', 'Xóa thành công');
    }
}