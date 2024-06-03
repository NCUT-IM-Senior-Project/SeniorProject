  <!-- 新增廠商資訊 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增廠商資訊</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('vendor.store') }}" method="POST" role="form">
            @method('POST')
            @csrf

            <div class="grid grid-cols-4 grid-rows-2 gap-2">
                <div class="col-span-4 sm:col-span-1">
                    <label for="partner_id" class="block text-sm font-medium mb-2 dark:text-white">廠商編號</label>
                    <input type="text" id="partner_id" name="partner_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入廠商編號...">
                    @error('partner_id')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="name" class="block text-sm font-medium mb-2 dark:text-white">廠商名稱</label>
                    <input type="text" id="name" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入廠商名稱...">
                    @error('name')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="address" class="block text-sm font-medium mb-2 dark:text-white">地址</label>
                    <input type="text" id="address" name="address" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入連絡地址...">
                    @error('address')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="land_line" class="block text-sm font-medium mb-2 dark:text-white">連絡電話</label>
                    <input type="text" id="land_line" name="land_line" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入連絡電話...">
                    @error('land_line')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="fax" class="block text-sm font-medium mb-2 dark:text-white">傳真</label>
                    <input type="text" id="fax" name="fax" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入傳真號碼...">
                    @error('fax')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row-start-2 col-span-4 sm:col-span-1">
                    <div class="relative">
                        <label for="requirementItems" class="block text-sm font-medium mb-2 dark:text-white">特殊需求</label>

                        <div class="relative">
                            <select data-hs-select='{
                              "placeholder": "Select option...",
                              "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
                              "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600",
                              "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-slate-900 dark:border-gray-700",
                              "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-slate-900 dark:hover:bg-slate-800 dark:text-gray-200 dark:focus:bg-slate-800",
                              "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"font-semibold text-gray-800 dark:text-gray-200\" data-title></div></div><div class=\"mt-1.5 text-sm text-gray-500\" data-description></div></div>"
                            }' class="hidden">
                                <option value="">Choose</option>
                                <option value="0" selected data-hs-select-option='{
                                    "description": "前往該地點無須另外準備工具",
                                    "icon": "<svg class=\"flex-shrink-0 size-4 text-gray-800 dark:text-gray-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-globe-2\"><path d=\"M21.54 15H17a2 2 0 0 0-2 2v4.54\"/><path d=\"M7 3.34V5a3 3 0 0 0 3 3v0a2 2 0 0 1 2 2v0c0 1.1.9 2 2 2v0a2 2 0 0 0 2-2v0c0-1.1.9-2 2-2h3.17\"/><path d=\"M11 21.95V18a2 2 0 0 0-2-2v0a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05\"/><circle cx=\"12\" cy=\"12\" r=\"10\"/></svg>"
                                  }'>無</option>

                                @foreach($requirement_items as $item)
                                    <option value="{{ $item->id }}" selected data-hs-select-option='{
                                    "description": "前往該地點{{ $item->name }}",
                                    "icon": "<svg class=\"flex-shrink-0 size-4 text-gray-800 dark:text-gray-200\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"lucide lucide-globe-2\"><path d=\"M21.54 15H17a2 2 0 0 0-2 2v4.54\"/><path d=\"M7 3.34V5a3 3 0 0 0 3 3v0a2 2 0 0 1 2 2v0c0 1.1.9 2 2 2v0a2 2 0 0 0 2-2v0c0-1.1.9-2 2-2h3.17\"/><path d=\"M11 21.95V18a2 2 0 0 0-2-2v0a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05\"/><circle cx=\"12\" cy=\"12\" r=\"10\"/></svg>"
                                  }'>{{ $item->name }}</option>
                                @endforeach

                            </select>

                            <div class="absolute top-1/2 end-3 -translate-y-1/2">
                                <svg class="flex-shrink-0 size-3.5 text-gray-500 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"/><path d="m7 9 5-5 5 5"/></svg>
                            </div>
                        </div>
                    </div>
                    @error('requirementItems')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row-start-2 col-span-4 sm:col-span-2">
                    <label for="description" class="block text-sm font-medium mb-2 dark:text-white">備註</label>
                    <textarea id="description" name="description" class="py-3 px-4 block resize-x w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="1" placeholder="請輸入文字..."></textarea>
                    @error('description')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
                    <a href="{{ route('vendor.batch') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        批次匯入
                    </a>
                    <button type="reset" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        重置
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        新增
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
