<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\FrontendController;
Use App\Http\Controllers\Backend\BrandController;
use App\Models\User;


// admin all Routes
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm' ]);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.admin_index');
})->name('dashboard');

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');


//user all route
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::get('/', [FrontendController::class, 'index']);
Route::get('/user/logout', [FrontendController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [FrontendController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [FrontendController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [FrontendController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/update/password', [FrontendController::class, 'UserUpdatePassword'])->name('user.update.password');




//Admin All brand route

Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');
});
