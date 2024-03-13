<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RotationList;
use App\Http\Requests\StoreRotationListRequest;
use App\Http\Requests\UpdateRotationListRequest;

class RotationListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rotationLists =RotationList::with('client')->paginate(9);
        //$rotationLists = RotationList::all();
        $rotationLists->map(function ($rotationList) {
           $rotationList->partner_name = Client::where('partner_id', $rotationList->partner_id)->first()->name;

            return $rotationList;
        });

        //  dd($rotationLists);

        return view('rotation.index', compact('rotationLists'));

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
    public function store(StoreRotationListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RotationList $rotationList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RotationList $rotationList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRotationListRequest $request, RotationList $rotationList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RotationList $rotationList)
    {
        //
    }
}
