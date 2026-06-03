<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\HomepageBanner;
use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    $home = HomePage::first();

    $banners = HomepageBanner::all();

    $services = Service::all();

    $news = News::latest()->get();

    return view('home', compact(
        'home',
        'banners',
        'services',
        'news'
    ));
}
      public function gioithieu()
    {
        $home = HomePage::first();

        return view('gioithieu', compact('home'));
    }
 public function news()
{
    $news = News::latest()->get();

    return view('news.index', compact('news'));
}
public function newsDetail($slug)
{
    $news = News::where('slug', $slug)->firstOrFail();

    return view('news.show', compact('news'));
}
}