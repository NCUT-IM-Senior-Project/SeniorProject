@extends('layouts.app')
@section('title', '安排配送單')

@section('page-form')
    <!-- 判斷是否有進入編輯表單路由 -->
    @if
        @include('deliveryserviceorder.create',compact('deliveryserviceorders'))
    @endif

@endsection
