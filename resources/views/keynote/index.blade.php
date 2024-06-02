@extends('layouts.app')
@section('title', '注意事項')

@section('page-content')

    <!-- 注意事項 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">注意事項</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-full px-2 py-4 sm:px-2 sm:py-8 lg:px-8">
            <a href="{{ route('keynote.edit', '1') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-gray-300 text-gray-800 hover:bg-gray-400 dark:bg-slate-600 dark:text-gray-400 dark:hover:bg-slate-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                編輯
            </a>
            <div class="prose max-w-none">
                {!! $keyNotes->description !!}
            </div>


            最後更新時間：{{ $keyNotes->updated_at }}

        </div>
    </div>
@endsection

