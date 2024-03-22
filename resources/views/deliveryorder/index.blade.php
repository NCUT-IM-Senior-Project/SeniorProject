@extends('layouts.app')
@section('title', '管理送貨單')


@section('page-content')
    <!-- 廠商資訊總覽 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">送貨單總覽</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-full px-2 py-4 sm:px-2 sm:py-8 lg:px-8">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto ">
                    <div class="p-1 min-w-full inline-block align-middle ">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700 ">
                            <form action="{{ route('deliveryorder.search') }}" method="GET">
                                <div class="py-4 px-5 flex items-center space-x-4 ">
                                    <!-- 日期範圍選擇 -->
                                    <div class="flex items-center">
                                        <label for="start_date" class="sr-only">起始日期</label>
                                        <input type="date" name="start_date" id="start_date" class="py-2 px-3 block w-auto border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="起始日期">
                                        <label for="end_date" class="sr-only">結束日期</label>
                                        <input type="date" name="end_date" id="end_date" class="py-2 px-3 block w-auto border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="結束日期">
                                        <button type="submit" name="search_type" value="date" class="py-2 px-3 ml-2 flex items-center gap-x-3 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                            <span>按日期搜索</span>
                                        </button>
                                    </div>


                                <!-- 下拉式選單選擇廠商 -->
                                <div class="sm:col-span-5  relative flex items-center">
                                    <label for="partner_id" class="sr-only">選擇廠商/客戶</label>
                                    <select name="partner_id" id="partner_id"  data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "授尋廠商/客戶 送貨單...",
                                     "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                                      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                                      "placeholder": "選擇廠商/客戶",
                                       "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                       "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                                        "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700", "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800", "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>" }' class="block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3" id="partner_id" name="partner_id">
                                        <option value="">Choose</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{ $vendor->partner_id }}">廠商{{ $vendor->partner_id }} | {{ $vendor->name }}</option>
                                        @endforeach
                                        @foreach($clients as $client)
                                            <option value="{{ $client->partner_id }}">客戶{{ $client->partner_id }} | {{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute top-1/2 right-3 -translate-y-1/2 pointer-events-none">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                                    </div>
                                </div>
                                <!-- 提交按鈕 -->
                                    <button type="submit" name="search_type" value="partner" class="py-2 px-3 ml-2 flex items-center gap-x-3 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <span>按廠商/客戶搜索</span>
                                    </button>
                             </div>
                             </form>
                    </div>
                            <div class="overflow-hidden overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">編號</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">主旨</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">廠商客戶名稱</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">訂單編號</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">物流類型</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">預定交期</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">出貨日期</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">訂單狀態</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">創建者</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">操作功能</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 overflow-y-auto">
                                    @foreach($deliveryorders as $deliveryorder)
                                        <tr>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">#{{ $deliveryorder -> id }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryorder -> keynote }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                @php
                                                    $partnerName = '';
                                                    $partnerId = $deliveryorder->partner_id;
                                                    $vendor = $vendors->where('partner_id', $partnerId)->first();
                                                    $client = $clients->where('partner_id', $partnerId)->first();

                                                    if ($vendor) {
                                                        $partnerName = $vendor->name;
                                                    } elseif ($client) {
                                                        $partnerName = $client->name;
                                                    }
                                                @endphp
                                                {{ $partnerName }}
                                            </td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryorder -> order_number }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ optional($deliveryorder->logistic)->name }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryorder -> scheduled_at }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryorder -> shipment_at }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ optional($deliveryorder->deliveryOrderStatus)->name }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ optional($deliveryorder->user)->name }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <div class="flex items-center">
                                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deliveryorderDate-modal-{{ $deliveryorder->id }}">
                                                        檢視
                                                    </button>
                                                    <span class="mx-2">|</span>
                                                    <a href="{{ route('deliveryorder.edit', $deliveryorder) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">編輯</a>
                                                    <span class="mx-2">|</span>
                                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryorder -> deliveryorder_id }}">
                                                        刪除
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- 刪除送貨單資料彈出視窗 -->
                                        <div id="deleteDeliveryorder-modal-{{ $deliveryorder -> deliveryorder_id }}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static] flex items-center">
                                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                        <h3 class="font-bold text-gray-800 dark:text-white">
                                                            送貨單資料刪除確認
                                                        </h3>
                                                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryorder -> deliveryorder_id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 overflow-y-auto">
                                                        <p class="text-gray-800 dark:text-gray-200 font-bold ">
                                                            送貨單 {{ $deliveryorder->order_number }} 的資料將會被刪除，確定要刪除嗎？
                                                        </p>
                                                    </div>
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryorder -> deliveryorder_id }}">
                                                            取 消
                                                        </button>
                                                        <form action="{{ route('deliveryorder.destroy', $deliveryorder) }}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                                確認刪除
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- 送貨單資料彈出視窗 clientDate-modal- -->
                                        @foreach($deliveryorders as $deliveryorder)
                                            <div id="deliveryorderDate-modal-{{ $deliveryorder->id }}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static] flex items-center">
                                                <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                    <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                        <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                            <h3 class="font-bold text-gray-800 dark:text-white">
                                                                送貨單細項
                                                            </h3>
                                                            <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deliveryorderDate-modal-{{ $deliveryorder->id }}">
                                                                <span class="sr-only">Close</span>
                                                                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                            </button>
                                                        </div>
                                                        <div class="p-4 overflow-y-auto h-auto">
                                                            <p class="text-gray-800 dark:text-gray-200 font-bold">送貨單編號：{{ $deliveryorder->id }}</p>
                                                            @if($deliveryorder->deliveryVendorDetail)
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">規格：{{ $deliveryorder->deliveryVendorDetail->specification }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">數量：{{ $deliveryorder->deliveryVendorDetail->quantity }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">主要顏色：{{ $deliveryorder->deliveryVendorDetail->main_color }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">工令單號：{{ $deliveryorder->deliveryVendorDetail->work_number }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">備註：{{ $deliveryorder->deliveryVendorDetail->description }}</p>

                                                            @elseif($deliveryorder->deliveryClientDetail)
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">商品名稱：{{ $deliveryorder->deliveryClientDetail->name }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">規格：{{ $deliveryorder->deliveryClientDetail->specification }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">數量：{{ $deliveryorder->deliveryClientDetail->quantity }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">重量：{{ $deliveryorder->deliveryClientDetail->weight }}</p>
                                                                <p class="text-gray-800 dark:text-gray-200 font-bold">備註：{{ $deliveryorder->deliveryClientDetail->description }}</p>

                                                                @else
                                                                <p class="text-gray-800 dark:text-gray-200">没有相關資料。</p>
                                                            @endif
                                                        </div>
                                                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deliveryorderDate-modal-{{ $deliveryorder->id }}">
                                                                關 閉
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- End 客戶資料彈出視窗 -->

                                    @endforeach
                                    <!-- 填充表身高度 -->
                                    @if($deliveryorders->count() != 9)
                                        @php
                                            $val = (9 - $deliveryorders->count()) * 8;
                                        @endphp
                                        <tr>
                                            <td class="px-6 py-2 h-{{$val}}">   </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="py-1 px-4">
                                <!-- 分頁 -->
                                <div class="flex flex-1 justify-between sm:hidden">
                                    <a href="{{ $deliveryorders-> previousPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="{{ $deliveryorders-> nextPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700 dark:text-gray-200">
                                            顯示第
                                            <span class="font-medium">{{ $deliveryorders->firstItem() ?:0}}</span>
                                            至
                                            <span class="font-medium">{{ $deliveryorders->lastItem() ?:0}} </span>
                                            筆資料，共
                                            <span class="font-medium">{{ $deliveryorders->total() }}</span>
                                            筆資料
                                        </p>
                                    </div>

                                    <div>
                                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                            <a href="{{ $deliveryorders-> previousPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                <span class="sr-only">上一頁</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ $deliveryorders-> nextPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                <span class="sr-only">下一頁</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                        </nav>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection


