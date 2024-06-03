@extends('layouts.app')
@section('title', '新增客戶送貨單')

@section('page-content')
    <p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增送貨單資訊</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-auto px-2 py-4 sm:px-2 sm:py-8 lg:px-8 ">

            <!-- 新增 delivery_orders 的表單 -->
            <form id="deliveryOrderForm" action="{{ route('deliveryserviceorder.store') }}" method="POST" role="form">
                @method('POST')
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-4">
                    <div class="col-span-1">
                        <label for="keynote" class="block text-sm font-medium mb-2 dark:text-white">主旨</label>
                        <input type="text" id="keynote" name="keynote" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入主旨...">
                        @error('keynote')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="car_id" class="block text-sm font-medium mb-2 dark:text-white">車輛編號</label>
                        <select id="car_id" name="car_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                            <option value="">請選擇車輛編號...</option>
                            @foreach($carNumbers as $carNumber)
                                <option value="{{ $carNumber->id }}">{{ $carNumber->number }}</option>
                            @endforeach
                        </select>
                        @error('car_id')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="driver_id" class="block text-sm font-medium mb-2 dark:text-white">司機編號</label>
                        <select id="driver_id" name="driver_id" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" onchange="updateInput()">
                            <option value="">請選擇司機...</option>
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->id }}|{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="departure_at" class="block text-sm font-medium mb-2 dark:text-white">出車日期</label>
                        <input type="date" id="departure_at" name="departure_at" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        @error('departure_at')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="return_at" class="block text-sm font-medium mb-2 dark:text-white">回廠時間</label>
                        <input type="date" id="return_at" name="return_at" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        @error('return_at')
                        <div class="text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- 新增的表格 -->
                <div class="mt-8">
                    <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
                        <thead>
                        <tr>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2 w-20 text-center">編號</th>
                            <th class="border border-gray-300 dark:border-gray-700 px-4 py-2">送貨單</th>
                        </tr>
                        </thead>
                        <tbody id="deliveryOrdersTable">
                        @foreach (range(1, 10) as $row)
                            <tr>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2 w-20 text-center">{{ $row }}</td>
                                <td class="border border-gray-300 dark:border-gray-700 px-4 py-2">
                                    <select name="delivery_order_{{ $row }}" class="delivery-order-select py-1 px-2 w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                        <option value="">請選擇...</option>
                                        @foreach ($newDeliveryServiceOrders as $newDeliveryServiceOrder)
                                            <option value="{{ $newDeliveryServiceOrder->id }}">{{ $newDeliveryServiceOrder->keynote }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-end items-end space-x-2 mt-4">
                    <button type="reset" id="reset" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        重置
                    </button>
                    <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        新增送貨單
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selects = document.querySelectorAll('.delivery-order-select');

            function updateSelects() {
                const selectedValues = Array.from(selects)
                    .map(select => select.value)
                    .filter(value => value !== '');

                selects.forEach(select => {
                    Array.from(select.options).forEach(option => {
                        if (option.value === '') return;
                        option.style.display = selectedValues.includes(option.value) && option.value !== select.value ? 'none' : '';
                    });
                });
            }

            selects.forEach(select => {
                select.addEventListener('change', updateSelects);
            });

            updateSelects(); // Initialize on page load
        });
    </script>
@endsection
