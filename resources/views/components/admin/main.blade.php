@extends('components.system.main')

@section('header')
    @include('components.admin.header')
@endsection

@section('content')
    @include('components.admin.menu')
    @include('components.system.messages')
    <main class="min-h-screen">
        @yield('main')
    </main>

@section('scripts_in_page')
    @yield('scripts')
@endsection

@endsection
