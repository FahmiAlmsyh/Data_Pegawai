<!DOCTYPE html>
<html lang="en">
@include('backend.components.head')
@stack('head')

<body>
    @yield('main')


    @include('backend.components.script')
    @stack('script')
</body>

</html>
