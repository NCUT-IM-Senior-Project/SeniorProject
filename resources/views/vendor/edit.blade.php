<!-- 修改廠商資訊 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">修改廠商資訊</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('vendor.update', $editVendor) }}" method="POST" role="form">
            @method('PATCH')
            @csrf

            <div class="grid grid-cols-4 grid-rows-2 gap-2">
                <div class="col-span-4 sm:col-span-1">
                    <label for="partner_id" class="block text-sm font-medium mb-2 dark:text-white">廠商編號</label>
                    <input type="text" id="partner_id" name="partner_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入廠商編號..." value="{{ old('partner_id', $editVendor->partner_id) }}">
                    @error('partner_id')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="name" class="block text-sm font-medium mb-2 dark:text-white">廠商名稱</label>
                    <input type="text" id="name" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入廠商名稱..." value="{{ old('name', $editVendor->name) }}">
                    @error('name')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="address" class="block text-sm font-medium mb-2 dark:text-white">地址</label>
                    <input type="text" id="address" name="address" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入連絡地址..." value="{{ old('address', $editVendor->address) }}">
                    @error('address')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="land_line" class="block text-sm font-medium mb-2 dark:text-white">連絡電話</label>
                    <input type="text" id="land_line" name="land_line" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入連絡電話..." value="{{ old('land_line', $editVendor->land_line) }}">
                    @error('land_line')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="fax" class="block text-sm font-medium mb-2 dark:text-white">傳真</label>
                    <input type="text" id="fax" name="fax" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入傳真號碼..." value="{{ old('fax', $editVendor->fax) }}">
                    @error('fax')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row-start-2 col-span-4 sm:col-span-2">
                    <label for="description" class="block text-sm font-medium mb-2 dark:text-white">備註</label>
                    <textarea id="description" name="description" class="py-3 px-4 block resize-x w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="1" placeholder="請輸入文字...">{{ $editVendor->description }}</textarea>
                    @error('description')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
                    <a href="{{ route('vendor.index') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-300 text-gray-800 hover:bg-gray-400 dark:bg-slate-600 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        取消
                    </a>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        修改
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
