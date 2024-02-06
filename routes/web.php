<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* 需要登入才能進入的路由 */
Route::middleware('auth')->group(function () {
    //儀表板-首頁 dashboard
    Route::get('/', function () {return view('dashboard');});

    //個人檔案 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* 生管人員才能進入的路由 */
    Route::middleware('checkPermissions:1')->group(function () {

        //管理司機資料
        Route::get('driver', [DriverController::class, 'index'])->name('driver.index');
        //管理司機資料-搜尋
        Route::get('driver/search', [DriverController::class, 'search'])->name('driver.search');
        //管理司機資料-新增
        Route::post('driver', [DriverController::class, 'store'])->name('driver.store');
        //管理司機資料-編輯
        Route::get('driver/{driver}/edit', [DriverController::class, 'edit'])->name('driver.edit');
        //管理司機資料-更新
        Route::patch('driver/{editDriver}', [DriverController::class, 'update'])->name('driver.update');
        //管理司機資料-刪除
        Route::delete('driver/{driver}', [DriverController::class, 'destroy'])->name('driver.destroy');
    });

    /* 司機才能進入的路由 */
    Route::middleware('checkPermissions:2')->group(function () {

    });
});

require __DIR__.'/auth.php';
