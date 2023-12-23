<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 派遣管理後台</title>

    <!-- css, js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-slate-900">
<!-- header -->
@include('layouts.partials.header')

<!-- Navigation -->
@include('layouts.partials.navigation')

<!-- Content -->
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 ">

    <main>
        <!-- Toast Component -->
        @include('components.toasts')

        @yield('page-content')
    </main>

</div>
<!-- End Content -->

</body>
</html>
