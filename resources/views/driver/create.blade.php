<!-- 新增司機資訊 -->
<p class="transition duration-1000 text-gray-600 text-sm dark:text-gray-200">新增司機資訊</p>
<div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
    <div class="mx-auto max-w-full px-4 py-4 sm:px-6 sm:py-4 lg:px-8">
        <form action="{{ route('driver.store') }}" method="POST" role="form">
            @method('POST')
            @csrf
            <div class="grid grid-cols-4 grid-rows-2 gap-2">
                <div class="col-span-4 sm:col-span-1">
                    <label for="name" class="block text-sm font-medium mb-2 dark:text-white">姓名</label>
                    <input type="text" id="name" name="name" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入姓名...">
                    @error('name')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="phone" class="block text-sm font-medium mb-2 dark:text-white">連絡電話</label>
                    <input type="text" id="phone" name="phone" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入連絡電話...">
                    @error('phone')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="email" class="block text-sm font-medium mb-2 dark:text-white">帳號</label>
                    <input type="email" id="email" name="email" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入帳號...">
                    @error('email')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 sm:col-span-1">
                    <label for="password" class="block text-sm font-medium mb-2 dark:text-white">密碼</label>
                    <input type="password" id="password" name="password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" placeholder="請輸入密碼...">
                    @error('password')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row-start-2 col-span-4 sm:col-span-2">
                    <label for="description" class="block text-sm font-medium mb-2 dark:text-white">備註</label>
                    <textarea id="description" name="description" class="py-3 px-4 block resize-x w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" rows="1" placeholder="請輸入文字..."></textarea>
                    @error('description')
                    <div class="text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex sm:justify-end items-end space-x-2 sm:col-start-4 sm:row-start-2 col-span-4 row-start-6 ">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        批次匯入
                    </button>
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
