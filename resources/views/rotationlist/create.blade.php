<!-- 新增輪值廠商 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增輪值廠商資料</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('rotationlist.store') }}" method="POST" role="form">
            @csrf
            @method('POST')
            <div class="grid grid-cols-4 grid-rows-2 gap-2">
                <div class="col-span-4 sm:col-span-1">
                    <label for="client_select" class="block text-sm font-medium mb-2 dark:text-white">廠商名稱</label>
                    <div>
                        <select id="client_select" name="partner_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                            <option value="">請選擇廠商名稱...</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->partner_id }}">{{ $client->partner_id }} | {{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('partner_id')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
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
