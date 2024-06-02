<?php

namespace App\Http\Controllers;

use App\Models\RotationData;
use App\Http\Requests\StoreRotationDataRequest;
use App\Http\Requests\UpdateRotationDataRequest;
use Illuminate\Http\Request;
use App\Models\RotationList;
use App\Models\Vendor;

class RotationDataController extends Controller
{
    /*
    public function getRotations($vendorClientId)
    {

        $rotations = RotationList::where('vendor_client_id', $vendorClientId)->with('rotationsData')->get();
        return response()->json($rotations);
    }

    public function storeRotation(Request $request)
    {
        $rotationData = RotationData::create([
            'rotation_list_id' => $request->rotation_list_id,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'driver_id' => $request->driver_id,
        ]);
        return response()->json($rotationData);
    }
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        // 從 rotationLists 表中取得所有資料及其關聯的 vendor 資料
        $vendors = RotationList::with('vendor')->get();

        // 提取每個 rotationList 的 vendor 名稱
        $vendors->each(function ($rotationList) {
            $rotationList->name = $rotationList->vendor->name;
            $rotationList->id = $rotationList->vendor->id;
        });
        , compact('vendors'
        */
        return view('rotationData.index');
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
    public function store(StoreRotationDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RotationData $rotationData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RotationData $rotationData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotationDataRequest $request, RotationData $rotationData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RotationData $rotationData)
    {
        //
    }
}
