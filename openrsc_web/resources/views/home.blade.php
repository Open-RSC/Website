<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')
    <body id="page-top">
    @include('layouts.navbar')
    @include('layouts.homebody')
    @include('layouts.footer')
    @include('layouts.footerscripts')
    </body>
</html>
