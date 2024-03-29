<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = User::where('permission_id', 2)->paginate(9);
        //$drivers status 0:啟用 1:停用
        $drivers->map(function ($driver) {
            $driver->status = $driver->status == 0 ? '正常' : '停權';
            return $driver;
        });

        return view('driver.index', compact('drivers'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $drivers = User::where('permission_id', 2)->where('name', 'like', '%' . $search . '%')->paginate(9);
        //$drivers status 0:啟用 1:停用
        $drivers->map(function ($driver) {
            $driver->status = $driver->status == 0 ? '正常' : '停權';
            return $driver;
        });
        return view('driver.index', compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDriverRequest $request)
    {
        try {
            // 獲取已驗證的數據
            $validatedData = $request->validated();

            // 在已驗證的數據中添加欄位
            $validatedData['status'] = 0;
            $validatedData['permission_id'] = 2;

            // 驗證成功
            User::create($validatedData);

            // 資料保存後轉跳回新書總表
            return redirect(route('driver.index'))->with([
                'success' => '帳號新增成功！',
                'type' => 'success',
            ]);
        } catch (QueryException $e) {
            // 檢查是否是唯一性約束違規（錯誤碼 1062）
            if ($e->errorInfo[1] == 1062) {
                // 根據需要處理重複 email 的情況
                return redirect()->back()->with([
                    'success' => '帳號新增失敗，該 email 已經存在。',
                    'type' => 'error',
                ])->withErrors(['email' => '該 email 已經存在']);
            }

            // 其他錯誤情況的處理
            return redirect()->back()->with([
                'error' => '帳號新增失敗，請稍後再試。',
                'type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $driver)
    {
        $editDriver = $driver;
        $drivers = User::where('permission_id', 2)->paginate(9);
        //$drivers status 0:啟用 1:停用
        $drivers->map(function ($driver) {
            $driver->status = $driver->status == 0 ? '正常' : '停權';
            return $driver;
        });
        return view('driver.index', compact('drivers', 'editDriver'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDriverRequest $request, User $editDriver)
    {
        $editDriver->update($request->validated());

        return redirect(route('driver.index'))->with([
            'success' => '司機 '. $editDriver-> name . ' 資料更新成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $driver)
    {
        $driver->delete();

        return redirect(route('driver.index'))->with([
            'success' => '帳號 [編號：'. $driver-> id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }

    public function batch()
    {
        return view('driver.batch');
    }

    public function downloadExcelTemplate($page): BinaryFileResponse
    {
        // 根據不同頁面生成不同的 Excel 檔案路徑
        $filePath = storage_path('app/public/' . $page . '.xlsx');

        // 返回檔案作為二進制響應
        return response()->download($filePath, $page . '.xlsx');
    }
}
