@extends('layouts.app')
@section('title', '管理廠商資料')

@section('page-form')
    <!-- 判斷是否有進入編輯表單路由 -->
    @if(isset($editVendor))
        @include('vendor.edit', compact('editVendor'))
    @else
    @endif
@endsection

@section('page-content')
    <div class="mx-left max-w-full px-2 py-3 sm:px-2 sm:py-8 lg:px-8 flex items-center justify-start">

        <button  id="downloadExcelBtn"  type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 ml-4">
            下載 Excel 範本
        </button>

        <!-- 選擇檔案區域 -->
        <div class="flex items-center mt-0 ml-4" >
            <label class="block">
                <span class="sr-only">選擇檔案</span>
                <input type="file" class="block w-full text-sm text-gray-500
                file:me-3 file:py-2 file:px-5
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-blue-600 file:text-white
                hover:file:bg-blue-700
                file:disabled:opacity-50 file:disabled:pointer-events-none
                dark:file:bg-blue-500
                dark:hover:file:bg-blue-400 " accept=".xls, .xlsx">
            </label>
        </div>

    </div>



    <!-- 廠商資訊總覽 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">廠商資料批次匯入</p>
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
                                        <th scope="col" class="px-4 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width:  2%; height: 40px;">#編號</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width:  2%; height: 40px;">廠商編號</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 10%; height: 40px;">廠商名稱</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 10%; height: 40px;">地址</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 12%; height: 40px;">連絡電話</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 13%; height: 40px;">傳真</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width: 30%; height: 40px;">備註</th>
                                        <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase" style="width:  1%; height: 40px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <tr>
                                            <td class="px-6 py-3" >
                                                {{ sprintf('%03d', $i) }}
                                            </td>
                                            <td class="px-6 py-3" style="width:7%">
                                                <input type="text" name="partner_id[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="name[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="address[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="land_line[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="fax[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-6 py-3">
                                                <input type="text" name="description[]" class="w-full border-gray-300 rounded-md">
                                            </td>
                                            <td class="px-2 py-3">
                                                <button class="delete-row px-2 py-2 rounded-md bg-red-600 text-white text-large">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus"><path d="M5 12h14"/></svg>
                                                </button>
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
                                                '<input type="text" name="partner_id[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3 " >' +
                                                '<input type="text" name="name[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="address[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="land_line[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="fax[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-6 py-3">' +
                                                '<input type="text" name="description[]" class="w-full border-gray-300 rounded-md">' +
                                                '</td>' +
                                                '<td class="px-2 py-3">' +
                                                '<button class="delete-row px-2 py-2 rounded-md bg-red-600 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-minus"><path d="M5 12h14"/></svg></button> </td>' +  // 添加刪除按鈕
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

                                <script>
                                    document.getElementById('downloadExcelBtn').addEventListener('click', function() {
                                        window.location.href = '{{ route("download-excel-template") }}';
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

