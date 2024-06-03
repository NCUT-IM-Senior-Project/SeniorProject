<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Client;
use App\Models\DeliveryOrder;
use App\Models\DeliveryPlanDetails;
use App\Models\DeliveryServiceOrder;
use App\Http\Requests\StoreDeliveryServiceOrderRequest;
use App\Http\Requests\UpdateDeliveryServiceOrderRequest;
use App\Models\Logistic;
use App\Models\User;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryServiceOrderController extends Controller
{
    public function deliveryServiceOrders()
    {
        $deliveryserviceorders = DeliveryServiceOrder::with('car', 'user', 'planStatus')->paginate(9);
        $deliveryserviceorders -> each(function($deliveryserviceorder){
            $deliveryserviceorder->car_number = $deliveryserviceorder->car->number;
            $deliveryserviceorder->car_id = $deliveryserviceorder->car->id;
            $deliveryserviceorder->driver_name = $deliveryserviceorder->user->name;
            $deliveryserviceorder->plan_status = $deliveryserviceorder->planStatus->name;
            $deliveryserviceorder->user_name = User::where('id',$deliveryserviceorder->created_by)->first()->name;

            // 格式化 return_at 和 plan_status
            $deliveryserviceorder->departure_at = Carbon::parse($deliveryserviceorder->departure_at)->format('Y-m-d');
            $deliveryserviceorder->return_at = Carbon::parse($deliveryserviceorder->return_at)->format('Y-m-d');
        });

         return $deliveryserviceorders;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryserviceorders = $this->deliveryServiceOrders();
        $deliveryorders = DeliveryOrder::all();

        return view('deliveryserviceorder.index', compact('deliveryserviceorders', 'deliveryorders'));
    }

    public function route()
    {
        $deliveryserviceorders = $this->deliveryServiceOrders();

        return view('route.index', compact('deliveryserviceorders'));
    }

    public function routeSearch(Request $request)
    {
        $users = User::all();

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $driverName = $request->input('driver_name');

        // 構建查詢
        $query = DeliveryServiceOrder::query();

        // 根據日期範圍進行搜索
        if ($startDate && $endDate) {
            $query->whereBetween('departure_at', [$startDate, $endDate]);
        }

        if ($driverName) {
            // 获取 driver_id 对应的用户
            $driver = User::where('name', $driverName)->where('permission_id', 2)->first();
            if ($driver) {
                $query->where('driver_id', $driver->id);
            }
        }

        $deliveryserviceorders = $query->with('user')->paginate(9);

        // 格式化日期
        $deliveryserviceorders->each(function($deliveryserviceorder) {
            $deliveryserviceorder->departure_at = Carbon::parse($deliveryserviceorder->departure_at)->format('Y-m-d');
        });

        return view('route.index', compact('deliveryserviceorders', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 獲取不在 delivery_service_orders 表中的 DeliveryOrder
        $newDeliveryServiceOrders = DeliveryOrder::whereNotIn('id', function ($query) {
            $query->select('id')->from('delivery_service_orders');
        })->get();

        // 從 car 資料表中抓取車輛編號
        $carNumbers = Car::select('id', 'number')->get();

        // 從 user 資料表中抓取 permission_id=2 的使用者名稱
        $drivers = User::where('permission_id', 2)->select('id', 'name')->get();

        return view('deliveryserviceorder.create', compact('newDeliveryServiceOrders', 'carNumbers', 'drivers'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliveryServiceOrderRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();

        // 在已驗證的數據中添加欄位
        $validatedData['created_by'] = Auth::id();
        $validatedData['plan_id'] = 1;

        // 創建送貨單並儲存資料
        $deliveryServiceOrder = DeliveryServiceOrder::create($validatedData);

        // 处理表格内的送货单数据
        if ($request->has('delivery_orders')) {
            foreach ($request->input('delivery_orders') as $orderData) {
                if (!empty($orderData['delivery_order_id'])) {
                    DeliveryPlanDetails::create([
                        'delivery_service_id' => $deliveryServiceOrder->id,
                        'delivery_order_id' => $orderData['delivery_order_id'],
                        'plans_details_status_id' => 7,
                    ]);
                }
            }
        }

        // 資料保存後轉跳回廠商總表
        return redirect(route('deliveryserviceorder.index'))->with([
            'success' => '送貨單新增成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryServiceOrder $deliveryServiceOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryServiceOrder $deliveryServiceOrder)
    {
        $deliveryserviceorders = DeliveryServiceOrder::where('id',$deliveryServiceOrder)->with('car', 'user', 'planStatus')->paginate(9);
        $deliveryserviceorders -> each(function($deliveryserviceorder){
            $deliveryserviceorder->car_number = $deliveryserviceorder->car->number;
            $deliveryserviceorder->driver_name = $deliveryserviceorder->user->name;
            $deliveryserviceorder->plan_status = $deliveryserviceorder->planStatus->name;
            $deliveryserviceorder->user_name = User::where('id',$deliveryserviceorder->created_by)->first()->name;

            // 格式化 return_at 和 plan_status
            $deliveryserviceorder->departure_at = Carbon::parse($deliveryserviceorder->departure_at)->format('Y-m-d');
            $deliveryserviceorder->return_at = Carbon::parse($deliveryserviceorder->return_at)->format('Y-m-d');
        });
        return view('deliveryserviceorder.index', compact('deliveryserviceorders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryServiceOrderRequest $request, DeliveryServiceOrder $deliveryServiceOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryServiceOrder $deliveryServiceOrder)
    {
        $deliveryServiceOrder->delete();

        return redirect(route('deliveryserviceorder.index'))->with([
            'success' => '送貨單刪除成功！',
            'type' => 'success',
        ]);
    }
}
