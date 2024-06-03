@section('title', '新增客戶送貨單')
        <p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增送貨單資訊</p>
        <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
            <div class="mx-auto max-w-auto px-2 py-4 sm:px-2 sm:py-8 lg:px-8 ">

                <!-- 新增 delivery_orders 的表單 -->
                <form id="deliveryOrderForm"  action="{{ route('deliveryserviceorder.store') }}" method="POST" role="form">
                    @method('POST')
                    @csrf
                    <div class="grid grid-cols-4 grid-rows-2 gap-2">
                        <div class="col-span-5 sm:col-span-1 ">
                                <label for="keynote" class="block text-sm font-medium mb-2 dark:text-white">主旨</label>
                                <input type="text" id="keynote" name="keynote" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入主旨...">
                                @error('keynote')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="car_id" class="block text-sm font-medium mb-2 dark:text-white">車輛編號</label>
                                <select id="client_select" name="car_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                                    <option value="">請選擇車輛編號...</option>
                                    @foreach($deliveryserviceorders as $deliveryserviceorder)
                                        <option value="{{ $deliveryserviceorder -> car_number }}">{{ $deliveryserviceorder -> car_number }}</option>
                                    @endforeach
                                </select>
                                @error('car_id')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="driver_id" class="block text-sm font-medium mb-2 dark:text-white">司機編號</label>
                                <select id="client_select" name="driver_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                                    <option value="">請選擇司機...</option>
                                    @foreach($deliveryserviceorders as $deliveryserviceorder)
                                        <option value="{{ $deliveryserviceorder -> driver_id }}">{{ $deliveryserviceorder -> driver_id }}|{{ $deliveryserviceorder -> driver_name }}</option>
                                    @endforeach
                                </select>
                                @error('driver_id')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-4 sm:col-span-1">
                                <label for="created_by" class="block text-sm font-medium mb-2 dark:text-white">創建者</label>
                                <input type="text" id="created_by" name="created_by" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="row-start-2 col-span-4 sm:col-span-2">
                                <label for="departure_at" class="block text-sm font-medium mb-2 dark:text-white">出車日期</label>
                                <input type="date" id="departure_at" name="departure_at" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('departure_at')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row-start-2 col-span-4 sm:col-span-2">
                                <label for="return_at" class="block text-sm font-medium mb-2 dark:text-white">回廠時間</label>
                                <input type="date" id="return_at" name="return_at" class="py-3 px-4 block w-auto border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('return_at')
                                <div class="text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                        <div class="col-span-4 sm:col-span-6">
                            <div class="flex justify-end items-end space-x-2">
                                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    新增送貨單
                                </button>
                                <button type="reset" id="reset" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                    重置
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


