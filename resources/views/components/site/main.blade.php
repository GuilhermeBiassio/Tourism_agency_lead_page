@extends('components.system.main')
@section('header')
    @include('components.site.header')
@endsection
@section('content')
    @include('components.system.messages')
    @yield('main')

@section('scripts_in_page')
    @yield('scripts')
@endsection
@endsection
