<!-- 修改送貨單資訊 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">修改送貨單資訊</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('deliveryorder.update', $deliveryOrder) }}" method="POST" role="form">
            @method('PATCH')
            @csrf

            <div class="grid grid-cols-6 grid-rows-2 gap-1">

                <div class="col-span-5 sm:col-span-2 ">
                    <div class="col-span-4 sm:col-span-1 ">
                        <label for="keynote" class="block text-sm font-medium mb-2 dark:text-white">主旨</label>
                        <input type="text" id="keynote" name="keynote" value="{{ old('keynote',   $deliveryOrder -> keynote ) }}" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入主旨...">
                        @error('keynote')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="grid max-w-2xl grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                    <div class="sm:col-span-3">
                        <label for="partner_id" class="block text-sm font-medium mb-2 dark:text-white">選擇客戶</label>
                        <div class="mt-2">
                            <div class="relative">
                                <select  id="partner_id" name="partner_id" data-hs-select='{
                                    "hasSearch": true,
                                    "searchPlaceholder": "授尋客戶ID...",
                                     "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                                      "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                                      "placeholder": "請選擇客戶...",
                                      "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                      "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                                      "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                                      "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                                     "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                                         }'value="{{ old('partner_id',  $deliveryOrder -> partner_id ) }}"  class="hidden" >
                                    <option value="">Choose</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->partner_id }}" {{ (old('partner_id', $deliveryOrder->partner_id) == $client->partner_id) ? 'selected' : '' }}>
                                            客戶{{ $client->partner_id }} | {{ $client->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute top-1/2 end-3 -translate-y-1/2">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                                </div>
                            </div>
                            @error('partner_id')
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-span-5 sm:col-span-2">
                    <div class="col-span-4 sm:col-span-1">
                        <label for="order_number" class="block text-sm font-medium mb-2 dark:text-white">訂單編號</label>
                        <input type="text" id="order_number" name="order_number" value="{{ old('order_number',  $deliveryOrder -> order_number ) }}" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入訂單編號...">
                        @error('order_number')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 md:col-span-2">
                    <div class="sm:col-span-3">
                        <label for="logistics_id" class="block text-sm font-medium mb-2 dark:text-white">物流類型</label>
                        <div class="col-span-4 sm:col-span-5 ">
                            <div class="relative">
                                <select  data-hs-select='{
                                  "hasSearch": true,
                                  "searchPlaceholder": "授尋物流類型...",
                                  "searchClasses": "block w-50 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3",
                                  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-slate-900",
                                  "placeholder": "選擇物流類型",
                                  "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                                  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                                  "dropdownClasses": "mt-2 max-h-[300px] pb-1 px-1 space-y-0.5 z-20 w-50 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                                  "optionClasses": "py-2 px-4 w-50 text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                                  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>"
                                  }' class="block w-50 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 py-2 px-3"
                                         value="{{ old('logistics_id',  $deliveryOrder -> logistics_id ) }}"  class="hidden" id="logistics_id" name="logistics_id">>
                                    <option value="">選擇物流類型</option>
                                    @foreach($logistics as $logistic)
                                        <option value="{{ $logistic->id }}" {{ (old('logistics_id', $deliveryOrder->logistics_id) == $logistic->id) ? 'selected' : '' }}>
                                            {{ $logistic->name }}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="absolute top-1/2 right-3 -translate-y-1/2 pointer-events-none">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                                </div>
                            </div>
                            @error('logistics_id')
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-span-5 sm:col-span-2">
                    <div class="row-start-2 col-span-4 sm:col-span-2">
                        <label for="scheduled_at" class="block text-sm font-medium mb-2 dark:text-white">預定交期</label>
                        <input type="date" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at', $deliveryOrder->scheduled_at ? \Carbon\Carbon::parse($deliveryOrder->scheduled_at)->format('Y-m-d') : '') }}" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        @error('scheduled_at')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-----
                <div class="col-span-5 sm:col-span-2">
                    <div class="col-span-4 sm:col-span-1">
                        <label for="created_by" class="block text-sm font-medium mb-2 dark:text-white">創建者</label>
                        <input type="text" id="created_by" name="created_by" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" value="{{ auth()->user()->id }}" readonly>
                    </div>
                </div>
                ------->
                <div class="col-span-5 sm:col-span-2">
                    <div class="row-start-2 col-span-4 sm:col-span-2">
                        <label for="shipment_at" class="block text-sm font-medium mb-2 dark:text-white">出貨日期</label>
                        <input type="date" id="shipment_at" name="shipment_at" value="{{ old('shipment_at', $deliveryOrder->shipment_at ? \Carbon\Carbon::parse($deliveryOrder->shipment_at)->format('Y-m-d') : '') }}" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        @error('shipment_at')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
                <a href="{{ route('deliveryorder.index') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-300 text-gray-800 hover:bg-gray-400 dark:bg-slate-600 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    取消
                </a>
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    修改
                </button>
            </div>
        </form>
    </div>
</div>
