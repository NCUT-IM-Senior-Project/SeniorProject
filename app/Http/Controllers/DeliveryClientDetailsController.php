<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DeliveryClientDetail;
use App\Http\Requests\StoreDeliveryClientDetailsRequest;
use App\Http\Requests\UpdateDeliveryClientDetailsRequest;
use App\Models\DeliveryOrder;
use App\Models\Logistic;
use App\Models\Vendor;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DeliveryClientDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryorders = DeliveryOrder::all();
        $clients = Client::all();
        $deliveryClientDetails = DeliveryClientDetail::paginate(9);
        //dd($deliveryorders);
        // 返回搜尋結果視圖
        return view('clientorderdetail.index', compact('deliveryClientDetails','clients','deliveryorders'));
    }

    public function search(Request $request)
    {
        // 獲取所有客戶和廠商
        $clients = Client::all();
        $vendors = Vendor::all();
        $logistics = Logistic::all();

        // 獲取選定的客戶ID
        $partnerId = $request->input('partner_id');

        // 構建查詢，關聯 delivery_orders 表
        $query = DeliveryClientDetail::query()->with('deliveryOrder');

        // 根據選定的客戶ID過濾客戶送貨單詳情
        if ($partnerId) {
            $query->whereHas('deliveryOrder', function ($query) use ($partnerId) {
                $query->where('partner_id', $partnerId);
            });
        }

        // 檢索符合條件的客戶送貨單詳情
        $deliveryClientDetails = $query->paginate(9);
        //dd($partnerId);

        // 返回搜索結果視圖
        return view('clientorderdetail.index', compact('deliveryClientDetails', 'vendors', 'clients', 'logistics'));
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
    public function store(StoreDeliveryClientDetailsRequest $request)
    {

            // 獲取已驗證的數據
            $validatedData = $request->validated();
            DeliveryClientDetail::create($validatedData);

            //  dd($validatedData);

            // 如果成功創建，返回成功響應或重定向到某個頁面
            return redirect()->route('deliveryorder.index')->with([
                'success' => '送貨單細項新增成功！',
                'type' => 'success',
            ]);

    }
    /**
     * Display the specified resource.
     */
    public function show(DeliveryClientDetail $deliveryClientDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryClientDetail $deliveryClientDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryClientDetailsRequest $request, DeliveryClientDetail $deliveryClientDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryClientDetail $deliveryClientDetails)
    {
        //
    }
}
