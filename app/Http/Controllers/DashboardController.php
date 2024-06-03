<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use App\Models\DeliveryServiceOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashBoardQuickInformation()
    {
        //當日取件
        $sameDayPickup = DeliveryOrder::whereIn('logistics_id', [1, 3, 5, 6])
            ->whereDate('shipment_at', Carbon::today())
            ->count();
        //當日送件
        $sameDayDelivery = DeliveryOrder::whereIn('logistics_id', [2, 4])
            ->whereDate('shipment_at', Carbon::today())
            ->count();
        //委外派遣
        $outSourcedDispatch = DeliveryOrder::whereIn('logistics_id', [1, 2, 5, 6])
            ->whereDate('shipment_at', Carbon::today())
            ->count();

        //已完成車趟 plan_id = 3 return_at = 今天
        $completedCarTrip = DeliveryServiceOrder::where('plan_id', 3)
            ->whereDate('return_at', Carbon::today())
            ->count();

        //未完成車趟 plan_id = 2 return_at = 今天
        $uncompletedCarTrip = DeliveryServiceOrder::where('plan_id', 2)
            ->whereDate('return_at', Carbon::today())
            ->count();

        // 確保不為空的保護
        $sameDayPickup = $sameDayPickup ?? 0;
        $sameDayDelivery = $sameDayDelivery ?? 0;
        $outSourcedDispatch = $outSourcedDispatch ?? 0;
        $completedCarTrip = $completedCarTrip ?? 0;
        $uncompletedCarTrip = $uncompletedCarTrip ?? 0;

        //存成陣列
        $quickInformation = [
            'sameDayPickup' => $sameDayPickup,
            'sameDayDelivery' => $sameDayDelivery,
            'outSourcedDispatch' => $outSourcedDispatch,
            'completedCarTrip' => $completedCarTrip,
            'uncompletedCarTrip' => $uncompletedCarTrip,
        ];


        return view('dashboard', compact('quickInformation'));
    }
}
