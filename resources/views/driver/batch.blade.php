@extends('layouts.app')
@section('title', '管理司機資料')



@section('page-form')
    <!-- 判斷是否有進入編輯表單路由 -->
    @if(isset($editDriver))
        @include('driver.edit', compact('editDriver'))
    @else
    @endif

@endsection

@section('page-content')
    @php
        $currentPage = 'driverexcel'; // 用實際的頁面標識替換 'your_value_here'
    @endphp
    @include('components.uploadexcel', ['currentPage' => $currentPage])
    <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
        <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            批次匯入
        </button>
        <a href="{{ route('driver.index') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-300 text-gray-800 hover:bg-gray-400 dark:bg-slate-600 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
            取消
        </a>
    </div>
    <!-- 司機資訊總覽 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">司機資料批次匯入</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-full px-2 py-4 sm:px-2 sm:py-8 lg:px-8">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1 min-w-full inline-block align-middle">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                            <div class="overflow-hidden overflow-x-auto">
                                <table id="myTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width:  2%; height: 40px;">#編號</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 10%; height: 40px;">姓名</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 12%; height: 40px;">連絡電話</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 13%; height: 40px;">帳號</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 13%; height: 40px;">密碼</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 30%; height: 40px;">備註</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width:  1%; height: 40px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td class="px-6 py-3">
                                                {{ sprintf('%03d', $i) }}
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="name[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="phone[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="account[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="password[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="remark[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-2 py-3">
                                                <button class="delete-row px-3 py-1 rounded-md bg-red-600 text-white">-</button>
                                            </td>
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>

                                <!-- JavaScript代碼 -->
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        // 新增行
                                        $('#myTable tbody').on('click', 'tr:last-child', function() {
                                            var lastRow = $(this);
                                            var lastRowNumber = parseInt($('#myTable tbody tr:last-child td:first-child').text());
                                            var newRowNumber = isNaN(lastRowNumber) ? 1 : lastRowNumber + 1;

                                            var newRow = '<tr>' +
                                                '<td class="px-6 py-3">' + ('000' + newRowNumber).slice(-3) + '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="name[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="phone[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="account[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="password[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="remark[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-2 py-3"><button class="delete-row px-3 py-1 rounded-md bg-red-600 text-white">-</button></td>' +  // 添加刪除按鈕
                                                '</tr>';
                                            lastRow.after(newRow);
                                        });
                                        // 刪除行
                                        $('#myTable tbody').on('click', 'button.delete-row', function() {
                                            $(this).closest('tr').remove();
                                            // 更新編號
                                            $('#myTable tbody tr').each(function(index) {
                                                $(this).find('td:first-child').text(('000' + (index + 1)).slice(-3));
                                            });
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

