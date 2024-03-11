<div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">

    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">

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
        <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
            <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                批次匯入
            </button>
            <a href="{{ route('vendor.index') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-300 text-gray-800 hover:bg-gray-400 dark:bg-slate-600 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                取消
            </a>
        </div>
