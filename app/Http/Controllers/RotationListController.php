<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\RotationData;
use App\Models\RotationList;
use App\Http\Requests\StoreRotationListRequest;
use App\Http\Requests\UpdateRotationListRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RotationListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rotationLists = RotationList::with('client')->paginate(9);
        $rotationLists->map(function ($rotationList) {
            $rotationList->partner_name = Client::where('partner_id', $rotationList->partner_id)->first()->name;

            return $rotationList;
        });

        $clients = $this->create();

        return view('rotation.index', compact('rotationLists', 'clients'));

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $rotationLists = RotationList::join('clients', 'rotation_lists.partner_id', '=', 'clients.partner_id')
            ->where('rotation_lists.partner_id', 'like', '%' . $search . '%')
            ->orWhere('clients.name', 'like', '%' . $search . '%')
            ->select('rotation_lists.*') // 避免列名衝突
            ->paginate(9);

        $rotationLists->map(function ($rotationList) {
            $client = Client::where('partner_id', $rotationList->partner_id)->first();
            $rotationList->partner_name = $client ? $client->name : '未知';
            return $rotationList;
        });

        $clients = $this->create();

        return view('rotation.index', compact('rotationLists', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 獲取 rotation_lists 資料表中已存在的客戶
        $clients = Client::whereNotIn('partner_id', Rotationlist::pluck('partner_id'))->get()->sortBy('partner_id');

        return $clients;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRotationListRequest $request)
    {
        // 驗證請求數據
        $validatedData = $request->validated();

        // 從驗證後的請求數據中取得 partner_id
        $partnerId = $validatedData['partner_id'];

        // 創建一個新的 RotationList 實例
        $rotationList = new RotationList();
        $rotationList->partner_id = $partnerId; // 新增的 partner_id
        $rotationList->save();

        // 重定向到目標頁面，並返回成功消息
        return redirect(route('rotation.index'))->with([
            'success' => '廠商新增成功！',
            'type' => 'success',
        ]);
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
        $rotationList->delete();

        return redirect(route('rotation.index'))->with([
            'success' => '廠商 [編號：'. $rotationList -> partner_id.'] 刪除成功！',
            'type' => 'success',
        ]);
    }
}
