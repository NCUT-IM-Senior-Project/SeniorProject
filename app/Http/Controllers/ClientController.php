<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(9);
        return view('client.index', compact('clients'));
    }

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
        //
    }
    public function batch()
    {
        return view('client.batch');
    }
}
