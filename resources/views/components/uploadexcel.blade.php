<!-- resources/views/components/uploadexcel.blade.php -->

@props(['currentPage'])

<div class="mx-left max-w-full px-2 py-3 sm:px-2 sm:py-8 lg:px-8 flex items-center justify-start">

    <button  id="downloadExcelBtn" data-page="{{ $currentPage }}" type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600 ml-4">
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


<script>
    document.getElementById('downloadExcelBtn').addEventListener('click', function() {
        var currentPage = this.getAttribute('data-page');

        // 確保 currentPage 有值
        if (currentPage) {
            // 根據當前頁面生成對應的下載連結
            var downloadLink = '/download-excel/' + currentPage;

            // 使用 JavaScript 或 AJAX 向後端發送下載 Excel 的請求
            window.location.href = downloadLink;
        } else {
            console.error('Missing currentPage value.');
        }
    });
</script>
