<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ContactPerson;
use App\Models\RequirementData;
use App\Models\RequirementItem;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(9);

        $clients->each(function ($client) {
            // 取得聯絡人資訊
            $contactPerson = ContactPerson::where('partner_id', $client->partner_id)
                ->select('name', 'phone')
                ->first();

            // 將聯絡人資訊加入客戶資料
            $client->contactPeopleName = $contactPerson ? $contactPerson->name : null;
            $client->contactPeoplePhone = $contactPerson ? $contactPerson->phone : null;

            // 取得需求編號資料
            $requirementData = RequirementData::where('partner_id', $client->partner_id)
                ->pluck('requirement_items_id');

            //取得需求項目名稱陣列
            $requirementItems = RequirementItem::whereIn('id', $requirementData)
                ->pluck('name')
                ->toArray();

            $client->requirementItems = implode(', ', $requirementItems);

        });

        return view('client.index', compact('clients'));
    }

    /**
     * Search the specified resource in storage.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');
        $clients = Client::where('name', 'like', '%' . $search . '%')->paginate(9);

        return view('client.index', compact('clients'));
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
    public function store(StoreClientRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
    public function batch()
    {
        return view('client.batch');
    }
}
