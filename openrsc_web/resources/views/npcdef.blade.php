<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.header')
    <body>
    @include('includes.navbar')
	@include('includes.npcdef')
	@include('includes.footer')
    @include('includes.footerscripts')
    </body>
</html>