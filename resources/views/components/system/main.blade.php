<!DOCTYPE html>
<html lang="pt-br">

@include('components.system.head')

<body class="font-custom min-h-screen">
    @yield('header')
    @yield('content')
    @include('components.system.footer')
    <script type="text/javascript" src="{{ env('ROOT_PATH') }}/node_modules/tw-elements/dist/js/tw-elements.umd.min.js">
    </script>
    <script src="{{ env('ROOT_PATH') }}/public/assets/js/js.js"></script>
    @yield('scripts_in_page')
</body>

</html>
