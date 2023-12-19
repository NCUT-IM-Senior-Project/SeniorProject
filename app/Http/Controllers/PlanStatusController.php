<?php

namespace App\Http\Controllers;

use App\Models\PlanStatus;
use App\Http\Requests\StorePlanStatusRequest;
use App\Http\Requests\UpdatePlanStatusRequest;

class PlanStatusController extends Controller
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
    public function store(StorePlanStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PlanStatus $planStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PlanStatus $planStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanStatusRequest $request, PlanStatus $planStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PlanStatus $planStatus)
    {
        //
    }
}
