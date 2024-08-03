<?php

namespace App\Http\Controllers;

use App\Models\RequirementData;
use App\Models\RequirementItem;
use App\Models\ContactPerson;
use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = Vendor::paginate(9);

        $vendors->each(function ($vendor) {
            // 取得聯絡人資訊
            $contactPerson = ContactPerson::where('partner_id', $vendor->partner_id)
                ->select('name', 'phone')
                ->first();

            // 將聯絡人資訊加入廠商資料
            $vendor->contactPeopleName = $contactPerson ? $contactPerson->name : null;
            $vendor->contactPeoplePhone = $contactPerson ? $contactPerson->phone : null;

            // 取得需求編號資料
            $requirementData = RequirementData::where('partner_id', $vendor->partner_id)
                ->pluck('requirement_items_id');

            // 取得需求項目名稱陣列
            $requirementItems = RequirementItem::whereIn('id', $requirementData)
                ->pluck('name')
                ->toArray();

            $vendor->requirementItems = implode(', ', $requirementItems);
        });

        $requirement_items = $this->create();

        return view('vendor.index', compact('vendors', 'requirement_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $vendors = Vendor::where('name', 'like', '%' . $search . '%')->paginate(9);

        return view('vendor.index', compact('vendors'));
    }
    public function create()
    {
        $requirement_items = RequirementItem::all();

        return $requirement_items;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendorRequest $request)
    {
        try {
            // 獲取已驗證的數據
            $validatedData = $request->validated();

            // 驗證成功
            Vendor::create($validatedData);

            // 資料保存後轉跳回廠商總表
            return redirect(route('vendor.index'))->with([
                'success' => '廠商新增成功！',
                'type' => 'success',
            ]);
        } catch (QueryException $e) {
            // 檢查是否是唯一性約束違規（錯誤碼 1062）
            if ($e->errorInfo[1] == 1062) {
                // 處理重複 partner_id 的情況
                return redirect()->back()->with([
                    'error' => '廠商新增失敗，該編號已經存在。',
                    'type' => 'error',
                ])->withErrors(['partner_id' => '該廠商編號已經存在']);
            }
            // 其他錯誤情況的處理
            return redirect()->back()->with([
                'error' => '廠商新增失敗，請稍後再試。',
                'type' => 'error',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        $editVendor = $vendor;
        $vendors = Vendor::paginate(9);
        return view('vendor.index', compact('vendors', 'editVendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendorRequest $request, Vendor $editVendor)
    {
        $editVendor -> update($request->validated());

        return redirect(route('vendor.index'))->with([
            'success' => '廠商 '. $editVendor-> name . ' 資料更新成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return redirect(route('vendor.index'))->with([
            'success' => '廠商 [編號：'. $vendor-> id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }

    public function batch()
    {
        return view('vendor.batch');
    }




    public function downloadExcelTemplate($page): BinaryFileResponse
    {
        // 根據不同頁面生成不同的 Excel 檔案路徑
        $filePath = storage_path('app/public/' . $page . '.xlsx');

        // 返回檔案作為二進制響應
        return response()->download($filePath, $page . '.xlsx');
    }
}
