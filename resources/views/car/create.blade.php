<!-- 新增司機資訊 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增車輛資訊</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('car.store') }}" method="POST" role="form">
            @method('POST')
            @csrf
            <div class="grid grid-cols-7 grid-rows-2 gap-2">
                <div class="col-span-3 sm:col-span-1">
                    <label for="number" class="block text-sm font-medium mb-2 dark:text-white">車號</label>
                    <input type="text" id="number" name="number" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入車號...">
                    @error('number')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <label for="brand" class="block text-sm font-medium mb-2 dark:text-white">品牌</label>
                    <input type="text" id="brand" name="brand" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入品牌...">
                    @error('brand')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <label for="color" class="block text-sm font-medium mb-2 dark:text-white">顏色</label>
                    <input type="text" id="color" name="color" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入顏色...">
                    @error('color')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <label for="type" class="block text-sm font-medium mb-2 dark:text-white">類型</label>
                    <select id="type" name="type" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <option value="" disabled selected >請選擇車輛類型...</option>
                        <option value="小客車">小客車</option>
                        <option value="小貨車">小貨車</option>
                        <option value="大貨車">大貨車</option>
                    </select>
                    @error('type')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <label for="Oils" class="block text-sm font-medium mb-2 dark:text-white">油品</label>
                    <select id="Oils" name="Oils" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <option value="" disabled selected>請選擇車輛油品...</option>
                        <option value="92">92</option>
                        <option value="95">95</option>
                        <option value="98">98</option>
                        <option value="柴油">柴油</option>
                    </select>
                    @error('type')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-1 sm:col-span-1">
                    <label for="tonnage" class="block text-sm font-medium mb-2 dark:text-white">噸位數</label>
                    <input type="text" id="tonnage" name="tonnage" class="py-3 px-2 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入噸位數...">
                    @error('tonnage')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-3 sm:col-span-1">
                    <label for="tailgate" class="block text-sm font-medium mb-2 dark:text-white">尾門</label>
                    <select id="tailgate" name="tailgate" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <option value="">請選擇車輛尾門...</option>
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </div>
                <div class="row-start-2 sm:col-span-2">
                    <label for="description" class="block text-sm font-medium mb-2 dark:text-white">司機名稱</label>
                    <div>
                        <select id="client_select" name="driver_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                            <option value="">請選擇司機名稱...</option>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver -> id }}">{{ $driver -> id }} | {{ $driver -> name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
                    <a href="{{ route('car.batch') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
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
