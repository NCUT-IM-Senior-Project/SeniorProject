<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeliveryOrderController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RotationListController;
use App\Http\Controllers\SettingControlle;
use App\Http\Controllers\VendorController;
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
        Route::get('/', function () {
                return view('dashboard');
        });

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
                //管理司機資料-批次
                Route::get('driver/batch', [DriverController::class, 'batch'])->name('driver.batch');
                //管理司機資料-批次下載excel範本
                Route::get('/download-excel-template', [DriverController::class, 'downloadExcelTemplate'])->name('download-excel-template');


                //管理客戶資料
                Route::get('client', [ClientController::class, 'index'])->name('client.index');
                //管理客戶資料-搜尋
                Route::get('client/search', [ClientController::class, 'search'])->name('client.search');
                //管理客戶資料-新增
                Route::post('client', [ClientController::class, 'store'])->name('client.store');
                //管理客戶資料-編輯
                Route::get('client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
                //管理客戶資料-更新
                Route::patch('client/{editClient}', [ClientController::class, 'update'])->name('client.update');
                //管理客戶資料-刪除
                Route::delete('client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
                //管理客戶資料-批次
                Route::get('client/batch', [ClientController::class, 'batch'])->name('client.batch');
                //管理客戶資料-批次下載excel範本
                Route::get('/download-excel-template', [ClientController::class, 'downloadExcelTemplate'])->name('download-excel-template');


                //管理廠商資料
                Route::get('vendor', [VendorController::class, 'index'])->name('vendor.index');
                //管理廠商資料-搜尋
                Route::get('vendor/search', [VendorController::class, 'search'])->name('vendor.search');
                //管理廠商資料-新增
                Route::post('vendor', [VendorController::class, 'store'])->name('vendor.store');
                //管理廠商資料-編輯
                Route::get('vendor/{vendor}/edit', [VendorController::class, 'edit'])->name('vendor.edit');
                //管理廠商資料-更新
                Route::patch('vendor/{editVendor}', [VendorController::class, 'update'])->name('vendor.update');
                //管理廠商資料-刪除
                Route::delete('vendor/{vendor}', [VendorController::class, 'destroy'])->name('vendor.destroy');
                //管理廠商資料-批次
                Route::get('vendor/batch', [VendorController::class, 'batch'])->name('vendor.batch');
                //管理廠商資料-批次下載excel範本
                //   Route::get('/download-excel-template', [VendorController::class, 'downloadExcelTemplate'])->name('download-excel-template');
                Route::get('/download-excel/{page}', [VendorController::class, 'downloadExcelTemplate'])->name('download-excel-template');

                //新增輪值廠商
                Route::get('rotation', [RotationListController::class, 'index'])->name('rotation.index');
                //輪值廠商-搜尋
                Route::get('rotation/search', [RotationListController::class, 'search'])->name('rotation.search');
                //輪值廠商-新增
                Route::post('rotation', [RotationListController::class, 'store'])->name('rotation.store');
                //輪值廠商-刪除
                Route::delete('rotation/{rotationList}', [RotationListController::class, 'destroy'])->name('rotation.destroy');

                //管理送貨單資料
                Route::get('deliveryorder', [DeliveryOrderController::class, 'index'])->name('deliveryorder.index');
                //管理送貨單資料-搜尋
                Route::get('deliveryorder/search', [DeliveryOrderController::class, 'search'])->name('deliveryorder.search');
                //管理送貨單資料-新增
                Route::post('deliveryorder', [DeliveryOrderController::class, 'store'])->name('deliveryorder.store');
                //管理送貨單資料-編輯
                Route::get('deliveryorder/{deliveryorder}/edit', [DeliveryOrderController::class, 'edit'])->name('deliveryorder.edit');
                //管理送貨單資料-更新
                Route::patch('deliveryorder/{editDeliveryorder}', [DeliveryOrderController::class, 'update'])->name('deliveryorder.update');
                //管理送貨單資料-刪除
                Route::delete('deliveryorder/{deliveryorder}', [DeliveryOrderController::class, 'destroy'])->name('deliveryorder.destroy');
                //設置輪班表
                Route::get('rotation', [RotationListController::class, 'index'])->name('rotation.index');

                //系統設定
                Route::get('setting', [SettingControlle::class, 'index'])->name('setting.index');
        });

        /* 司機才能進入的路由 */
        Route::middleware('checkPermissions:2')->group(function () {
        });
});

require __DIR__ . '/auth.php';
