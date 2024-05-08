<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\User;
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

        $requirement_items = $this->create();

        return view('client.index', compact('clients', 'requirement_items'));
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
        $requirement_items = RequirementItem::all();

        return $requirement_items;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {

        try {
            // 獲取已驗證的數據
            $validatedData = $request->validated();

            // 在已驗證的數據中添加欄位
            $validatedData['status'] = 0;
            $validatedData['permission_id'] = 2;

            // 驗證成功
            User::create($validatedData);

            // 資料保存後轉跳回新書總表
            return redirect(route('client.index'))->with([
                'success' => '帳號新增成功！',
                'type' => 'success',
            ]);
        } catch (QueryException $e) {
            // 檢查是否是唯一性約束違規（錯誤碼 1062）
            if ($e->errorInfo[1] == 1062) {
                // 根據需要處理重複 email 的情況
                return redirect()->back()->with([
                    'success' => '帳號新增失敗，該 email 已經存在。',
                    'type' => 'error',
                ])->withErrors(['email' => '該 email 已經存在']);
            }

            // 其他錯誤情況的處理
            return redirect()->back()->with([
                'error' => '帳號新增失敗，請稍後再試。',
                'type' => 'error',
            ]);
        }
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
        $editClient = $client;
        $clients = Client::paginate(9);
        return view('client.index', compact('clients', 'editClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $editClient)
    {
        $editClient->update($request->validated());

        return redirect(route('client.index'))->with([
            'success' => '客戶 '. $editClient-> name . ' 資料更新成功！',
            'type' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client -> delete();
        return redirect(route('client.index'))->with([
            'success' => '客戶 '. $client-> name . ' 資料刪除成功！',
            'type' => 'success',
        ]);
    }
    public function batch()
    {
        return view('client.batch');
    }
}
