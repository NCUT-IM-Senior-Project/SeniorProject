@extends('layouts.app')
@section('title', '首頁')
@section('page-content')

    <div>
        <p class="text-gray-600 text-sm dark:text-gray-200">當日快捷資訊</p>

        <dl class="mt-5 grid grid-cols-1 gap-4 sm:grid-cols-5">
            <div class="overflow-hidden rounded-sm bg-white dark:bg-gray-800 px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-200">當日取件</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900 dark:text-gray-200">{{ $quickInformation['sameDayPickup']}}</dd>
            </div>
            <div class="overflow-hidden rounded-sm bg-white dark:bg-gray-800 px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-200">當日送件</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-fuchsia-700">{{ $quickInformation['sameDayDelivery']}}</dd>
            </div>
            <div class="overflow-hidden rounded-sm bg-white dark:bg-gray-800 px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-200">委外派遣</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-blue-900">{{ $quickInformation['outSourcedDispatch']}}</dd>
            </div>
            <div class="overflow-hidden rounded-sm bg-white dark:bg-gray-800 px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-200">已完成車趟</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-green-700">{{ $quickInformation['completedCarTrip'] }}</dd>
            </div>
            <div class="overflow-hidden rounded-sm bg-white dark:bg-gray-800 px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500 dark:text-gray-200">未完成車趟</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-red-500">{{ $quickInformation['uncompletedCarTrip'] }}</dd>
            </div>
        </dl>
    </div>

    <div>
        <p class="text-gray-600 text-sm dark:text-gray-200">快捷選單</p>
        <div class="mt-5  ">
            <div class="col-span-2  shadow h-[700px] bg-white dark:bg-gray-800 ">
               <!-- -->
                <div class="divide-y divide-gray-200 overflow-hidden  sm:grid sm:grid-cols-3 sm:gap-px sm:divide-y-0">

                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class=" flex flex-col bg-white border h-40 border-t-4 border-t-blue-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-blue-600 ">
                                    注意事項
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    描述排程注意事項以方便管理人員遵循規範。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('keynote.index') }}">

                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-fuchsia-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-fuchsia-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-fuchsia-600 ">
                                    管理司機資料
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    所有駕駛員資料，用於人員管理及人員派遣。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-fuchsia-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('driver.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-fuchsia-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-fuchsia-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-fuchsia-600 ">
                                    管理車輛資料
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    所有車輛資料，用於車輛管理及車輛派遣。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-fuchsia-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('car.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-red-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-red-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-red-600 ">
                                    設置輪值廠商
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    安排須輪班廠商及其人員輪班時間。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('rotationlist.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-fuchsia-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-fuchsia-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-fuchsia-600 ">
                                    管理客戶資料
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    所有客戶資訊，便於排程設置。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-fuchsia-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('client.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-fuchsia-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-fuchsia-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-fuchsia-600 ">
                                    管理廠商資料
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    所有合作廠商資訊，便於排程設置。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-fuchsia-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('vendor.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class=" flex flex-col bg-white h-40 border border-t-4 border-t-orange-400 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-orange-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-orange-600 ">
                                    管理送貨單
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    管理所有以建立的送貨單資料。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-orange-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="{{ route('deliveryorder.index') }}">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-green-600 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-green-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-green-600 ">
                                    管理配送單
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    管理所有以建立的配送單資料。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="#">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group relative bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                        <div class="flex flex-col bg-white h-40 border border-t-4 border-t-yellow-300 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:border-t-blue-500 dark:shadow-neutral-700/70">
                            <div class="p-4 md:p-5">
                                <h2 class="text-2xl font-bold text-yellow-300 ">
                                    管理排程表
                                </h2>
                                <p class="mt-2 text-gray-500 dark:text-neutral-400">
                                    管理所有以建立的排程表資料。
                                </p>
                                <a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-yellow-300 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400" href="#">
                                    進入
                                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- -->
            </div>
        </div>
    </div>


@endsection


