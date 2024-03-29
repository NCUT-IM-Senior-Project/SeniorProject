@extends('layouts.app')
@section('title', '個人檔案')
@section('page-content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            @if( Auth::user()->permission_id == 1)
                <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

