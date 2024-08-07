@extends('layouts.app')

@section('title', '新增客戶送貨單細項')
@section('page-content')
    <!-- 頁籤 -->
    <div>
        <div class="sm:hidden">
            <label for="tabs" class="sr-only">Select a tab</label>
            <select id="tabs" name="tabs" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option>客戶送貨單細項總覽</option>
                <option>新增客戶送貨單細項</option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a href="{{ route('clientorderdetail.index') }}" class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">客戶送貨單細項總覽</a>
                    <a href="{{ route('clientorderdetail.create') }}" class="whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700">新增客戶送貨單細項</a>
                </nav>
            </div>
        </div>
    </div>

    <!-- 新增客戶送貨單 -->
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white mx-auto max-w-auto px-2 py-4 sm:px-2 sm:py-8 lg:px-8">
        <form id="clientOrderForm" action="{{ route('deliveryclientdetail.store') }}" method="POST" role="form">
            @method('POST')
            @csrf
            <div id="orderDetails" class="grid grid-cols-1 gap-6">
                <!-- 動態輸入框 -->
                @for ($i = 0; $i < 3; $i++)
                    <div class="grid grid-cols-7 gap-2 row" id="row-{{ $i }}">
                        <div class="col-span-1">
                            <label for="delivery_order_id_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">送貨單編號</label>
                            <select name="delivery_order_id[]" id="delivery_order_id_{{ $i }}" class="block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                                <option value="">選擇送貨單編號</option>
                                @foreach($deliveryorders as $order)
                                    @if (Str::startsWith($order->order_number, 'B'))
                                        <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('delivery_order_id.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="name_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">商品名稱</label>
                            <input type="text" id="name_{{ $i }}" name="name[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('name.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="specification_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">規格</label>
                            <input type="text" id="specification_{{ $i }}" name="specification[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('specification.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="quantity_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">數量</label>
                            <input type="text" id="quantity_{{ $i }}" name="quantity[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('quantity.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="weight_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">重量</label>
                            <input type="text" id="weight_{{ $i }}" name="weight[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('weight.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="description_{{ $i }}" class="block text-sm font-medium mb-2 dark:text-white">備註</label>
                            <input type="text" id="description_{{ $i }}" name="description[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                            @error('description.'.$i)
                            <div class="text-red-400">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1 flex items-end">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 removeRow">
                                -
                            </button>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="flex justify-end items-end space-x-2 mt-4">
                <button type="button" id="addRow" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700">
                    +
                </button>
                <button type="submit" id="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700">
                    新增
                </button>
            </div>
        </form>
    </div>

    <script>
        let rowCount = 3; // 預設行數
        const deliveryOrders = @json($deliveryorders); // 獲取送貨單數據

        // 篩選出以 "B" 開頭的送貨單
        const filteredDeliveryOrders = deliveryOrders.filter(order => order.order_number.startsWith('B'));

        // 生成送貨單編號下拉選單
        function generateDeliveryOrderOptions() {
            return filteredDeliveryOrders.map(order => `<option value="${order.id}">${order.order_number}</option>`).join('');
        }

        // 添加新的行
        document.getElementById('addRow').addEventListener('click', function () {
            if (rowCount < 10) { // 限制最多 10 行
                rowCount++;
                const orderDetails = document.getElementById('orderDetails');
                const newRow = document.createElement('div');
                newRow.classList.add('grid', 'grid-cols-7', 'gap-2', 'row');
                newRow.id = 'row-' + rowCount;

                // 新增的行 HTML
                newRow.innerHTML = `
                <div class="col-span-1">
                    <label for="delivery_order_id_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">送貨單編號</label>
                    <select name="delivery_order_id[]" id="delivery_order_id_${rowCount}" class="block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500">
                        <option value="">選擇送貨單編號</option>
                        ${generateDeliveryOrderOptions()}
                    </select>
                </div>
                <div class="col-span-1">
                    <label for="name_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">商品名稱</label>
                    <input type="text" id="name_${rowCount}" name="name[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-1">
                    <label for="specification_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">規格</label>
                    <input type="text" id="specification_${rowCount}" name="specification[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-1">
                    <label for="quantity_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">數量</label>
                    <input type="text" id="quantity_${rowCount}" name="quantity[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-1">
                    <label for="weight_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">重量</label>
                    <input type="text" id="weight_${rowCount}" name="weight[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-1">
                    <label for="description_${rowCount}" class="block text-sm font-medium mb-2 dark:text-white">備註</label>
                    <input type="text" id="description_${rowCount}" name="description[]" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
                <div class="col-span-1 flex items-end">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 removeRow">
                        -
                    </button>
                </div>
            `;

                orderDetails.appendChild(newRow);
            }
        });

        // 移除行
        document.getElementById('orderDetails').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('removeRow')) {
                const row = e.target.closest('.row');
                row.remove();
                rowCount--;
            }
        });
    </script>
@endsection
