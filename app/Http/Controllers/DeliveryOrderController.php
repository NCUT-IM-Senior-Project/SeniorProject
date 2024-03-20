<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Http\Requests\StoreDeliveryOrderRequest;
use App\Http\Requests\UpdateDeliveryOrderRequest;
use App\Models\Vendor;
use App\Models\Client;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $vendors = Vendor::all();
        $deliveryorders = DeliveryOrder::with(['logistic', 'deliveryOrderStatus', 'user'])->paginate(9);

        // 返回搜尋結果視圖
        return view('deliveryorder.index', compact('deliveryorders', 'vendors', 'clients'));
    }


    public function search(Request $request)
    {
        // 接收日期範圍和合作夥伴客戶名稱
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $partnerId = $request->input('partner_id');
        $partnerType = '';

        // 獲取所有客戶和廠商
        $clients = Client::all();
        $vendors = Vendor::all();

        // 構建查詢
        $query = DeliveryOrder::query();

        // 根據日期範圍進行搜索
        if ($startDate && $endDate) {
            $query->whereBetween('shipment_at', [$startDate, $endDate]);
        }

        // 如果搜索類型為合作夥伴搜索
        if ($request->has('search_type') && $request->input('search_type') === 'partner') {
            // 確認合作夥伴 ID 存在
            if ($partnerId) {
                // 根據合作夥伴 ID 過濾送貨單
                $query->where('partner_id', $partnerId);
            }
        }

        // 檢索符合條件的送貨單
        $deliveryorders = $query->with('logistic', 'deliveryOrderStatus', 'user')->paginate(9);

        // 返回搜索結果視圖
        return view('deliveryorder.index', compact('deliveryorders', 'vendors', 'clients', 'partnerType'));
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
    public function store(StoreDeliveryOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryOrderRequest $request, DeliveryOrder $deliveryOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $deliveryOrder)
    {
        //
    }
}
