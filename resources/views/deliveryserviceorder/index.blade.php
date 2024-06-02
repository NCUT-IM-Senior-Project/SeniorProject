@extends('layouts.app')
@section('title', '管理配送單')

@section('page-content')

    <!-- 廠商資訊總覽 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">配送單總覽</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-auto px-2 py-4 sm:px-2 sm:py-8 lg:px-8">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto ">
                    <div class="p-1 min-w-full inline-block align-middle ">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700 ">
                            <form action="{{ route('deliveryserviceorder.search') }}" method="GET">
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
                                </div>
                            </form>
                        </div>
                            <div class="overflow-hidden overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">編號</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">主旨</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">車輛編號</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">司機姓名</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">出車日期</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">回廠時間</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">訂單狀態</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">創建者</th>
                                        <th scope="col" class="px-5 py-3 text-start text-xs font-medium text-gray-500 uppercase">操作功能</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700 overflow-y-auto">
                                    @foreach($deliveryserviceorders as $deliveryserviceorder)
                                        <tr>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">#{{ $deliveryserviceorder -> id }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> keynote }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> car_number }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> driver_name }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> departure_at }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> return_at }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> plan_status }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{ $deliveryserviceorder -> user_name }}</td>
                                            <td class="px-5 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <div class="flex items-center">
                                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-gray-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deliveryorderDate-modal-{{ $deliveryserviceorder->id }}">
                                                        檢視
                                                    </button>
                                                    <span class="mx-2">|</span>
                                                    <a href="{{ route('deliveryserviceorder.edit', $deliveryserviceorder) }}" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">編輯</a>
                                                    <span class="mx-2">|</span>
                                                    <button type="button" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryserviceorder -> deliveryseviceorder_id }}">
                                                        刪除
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- 刪除送貨單資料彈出視窗 -->
                                        <div id="deleteDeliveryorder-modal-{{ $deliveryserviceorder -> deliveryorder_id }}" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto [--overlay-backdrop:static] flex items-center">
                                            <div class="hs-overlay-open:mt-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
                                                    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
                                                        <h3 class="font-bold text-gray-800 dark:text-white">
                                                            送貨單資料刪除確認
                                                        </h3>
                                                        <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryserviceorder -> deliveryorder_id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 overflow-y-auto">
                                                        <p class="text-gray-800 dark:text-gray-200 font-bold ">
                                                            送貨單 {{ $deliveryserviceorder -> order_number }} 的資料將會被刪除，確定要刪除嗎？
                                                        </p>
                                                    </div>
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t dark:border-gray-700">
                                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-overlay="#deleteDeliveryorder-modal-{{ $deliveryserviceorder -> deliveryserviceorder_id }}">
                                                            取 消
                                                        </button>
                                                        <form action="{{ route('deliveryorder.update', $deliveryserviceorder) }}" method="POST">
                                                            @csrf
                                                            @method('patch')
                                                            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                                確認刪除
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    <!-- 填充表身高度 -->
                                    @if($deliveryserviceorders->count() != 9)
                                        @php
                                            $val = (9 - $deliveryserviceorders->count()) * 8;
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
                                    <a href="{{ $deliveryserviceorders-> previousPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="{{ $deliveryserviceorders-> nextPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>

                                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                    <div>
                                        <p class="text-sm text-gray-700 dark:text-gray-200">
                                            顯示第
                                            <span class="font-medium">{{ $deliveryserviceorders->firstItem() ?:0}}</span>
                                            至
                                            <span class="font-medium">{{ $deliveryserviceorders->lastItem() ?:0}} </span>
                                            筆資料，共
                                            <span class="font-medium">{{ $deliveryserviceorders->total() }}</span>
                                            筆資料
                                        </p>
                                    </div>

                                    <div>
                                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                                            <a href="{{ $deliveryserviceorders-> previousPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                                <span class="sr-only">上一頁</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ $deliveryserviceorders-> nextPageUrl() }}" class="p-2.5 inline-flex items-center gap-x-2 text-sm rounded-full text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
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


