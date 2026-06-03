<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/gioi-thieu', [HomeController::class, 'gioithieu']);

Route::get('/dich-vu', [ServiceController::class, 'index']);
Route::get('/dich-vu/{slug}', [ServiceController::class, 'show'])
    ->name('services.show');
Route::post('/upload-image', [UploadController::class, 'upload'])->name('upload.image');
Route::delete('/admin/banner/delete/{id}', [HomePageController::class, 'deleteBanner']);
Route::get('/admin/banner', [BannerController::class, 'index']);
Route::post('admin/banner/store', [BannerController::class, 'store']);
    Route::delete('/delete/{id}', [BannerController::class, 'destroy']);
    Route::get('/tin-tuc', [HomeController::class, 'news']);

Route::get('/tin-tuc/{slug}', [HomeController::class, 'newsDetail'])
    ->name('news.show');
Route::get('/lien-he', function () {
    return view('contact');
})->name('contact');

Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');
// Switch Language
Route::get('/lang/{locale}', function ($locale) {

    if (in_array($locale, ['vi', 'ja'])) {

        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('lang.switch');
/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    // dashboard
  Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    // homepage
    Route::get('/admin/homepage', [HomePageController::class, 'edit']);

    Route::post('/admin/homepage/update', [HomePageController::class, 'update']);

    // service
    Route::get('/admin/service', [AdminServiceController::class, 'index']);

    Route::get('/admin/service/create', [AdminServiceController::class, 'create']);

    Route::post('/admin/service/store', [AdminServiceController::class, 'store']);

    Route::get('/admin/service/edit/{id}', [AdminServiceController::class, 'edit']);

    Route::post('/admin/service/update/{id}', [AdminServiceController::class, 'update']);

    Route::delete('/admin/service/delete/{id}', [AdminServiceController::class, 'destroy']);

    Route::get('/admin/contacts', [AdminContactController::class, 'index']);
       Route::get('/admin/contacts/{id}', [AdminContactController::class, 'show']);
        
   
    Route::delete('/admin/delete/contacts/{id}', [AdminContactController::class, 'destroy']);
       
});

Route::get('/admin/news', [NewsController::class, 'index']);

Route::get('/admin/news/create', [NewsController::class, 'create']);

Route::post('/admin/news/store', [NewsController::class, 'store']);

Route::get('/admin/news/edit/{id}', [NewsController::class, 'edit']);

Route::post('/admin/news/update/{id}', [NewsController::class, 'update']);

Route::delete('/admin/news/delete/{id}', [NewsController::class, 'delete']);

Route::post(
    '/admin/contacts/send-reply/{id}',
    [AdminContactController::class, 'sendReply']
);


/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';