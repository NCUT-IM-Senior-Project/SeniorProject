<?php

namespace App\Http\Controllers;

use App\Models\DeliveryVendorDetail;
use App\Http\Requests\StoreDeliveryVendorDetailsRequest;
use App\Http\Requests\UpdateDeliveryVendorDetailsRequest;

class DeliveryVendorDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreDeliveryVendorDetailsRequest $request)
    {
        // 獲取已驗證的數據
        $validatedData = $request->validated();
        DeliveryVendorDetail::create($validatedData);

          //dd($validatedData);

        // 如果成功創建，返回成功響應或重定向到某個頁面
        return redirect()->route('deliveryorder.index')->with([
            'success' => '送貨單細項新增成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryVendorDetail $deliveryVendorDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryVendorDetail $deliveryVendorDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDeliveryVendorDetailsRequest $request, DeliveryVendorDetail $deliveryVendorDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryVendorDetail $deliveryVendorDetails)
    {
        //
    }
}
