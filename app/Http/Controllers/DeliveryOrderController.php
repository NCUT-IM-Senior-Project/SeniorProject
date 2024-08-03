<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDeliveryClientDetailsRequest;
use App\Models\DeliveryClientDetail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\DeliveryOrder;
use App\Http\Requests\StoreDeliveryOrderRequest;
use App\Http\Requests\UpdateDeliveryOrderRequest;
use App\Models\Vendor;
use App\Models\Client;
use App\Models\Logistic;

use App\Models\DeliveryVendorDetail;
use Illuminate\Support\Facades\Auth;


class DeliveryOrderController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        $vendors = Vendor::all();
        $logistics = Logistic::all();

        $deliveryorders = DeliveryOrder::with('logistic', 'deliveryOrderStatus', 'user', 'deliveryVendorDetail','deliveryClientDetail')
            ->paginate(9);

        return view('deliveryorder.index', compact('deliveryorders', 'vendors', 'clients', 'logistics'));
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
        $logistics = Logistic::all();

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
        return view('deliveryorder.index', compact('deliveryorders', 'vendors', 'clients', 'partnerType','logistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createClientOrder()
    {

        // 繼續獲取其他所需的數據
        $clients = Client::all();
        $vendors = Vendor::all();
        $logistics = Logistic::all();
        $delivery_orders = DeliveryOrder::all();

        return view('deliveryorder.createclientorder', compact('vendors', 'clients', 'logistics', 'delivery_orders'));
    }
    public function createVendorOrder()
    {
        $clients = Client::all();
        $vendors = Vendor::all();
        $logistics = Logistic::all();
        $delivery_orders = DeliveryOrder::all();
        return view('deliveryorder.createvendororder', compact( 'vendors', 'clients','logistics','delivery_orders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryOrderRequest $request)
    {
            // 獲取已驗證的數據
            $validatedData = $request->validated();

            // 在已驗證的數據中添加欄位
            $validatedData['created_by'] = auth()->user() -> id;
            $validatedData['delivery_status_id'] = 1;
            //dd($validatedData);
            // 創建送貨單並儲存資料
            DeliveryOrder::create($validatedData);

        // 資料保存後轉跳回廠商總表
            return redirect(route('deliveryorder.index'))->with([
                'success' => '送貨單新增成功！',
                'type' => 'success',
            ]);

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
        $clients = Client::all();
        $vendors = Vendor::all();
        $logistics = Logistic::all();
        return view('deliveryorder.edit', compact('deliveryOrder', 'clients', 'vendors', 'logistics'));
    }

    public function update(UpdateDeliveryOrderRequest $request, DeliveryOrder $deliveryOrder)
    {

        $deliveryOrder->update($request->validated());

        return redirect(route('deliveryorder.index'))->with([
            'success' => '送貨單 '. $deliveryOrder->order_name . ' 資料修改成功！',
            'type' => 'success',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryOrder $deliveryorder)
    {
        $deliveryorder->delete();

        return redirect(route('deliveryorder.index'))->with([
            'success' => '送貨單 [單號：'. $deliveryorder-> order_number.'] 刪除成功！',
            'type' => 'success',
        ]);
    }

}
