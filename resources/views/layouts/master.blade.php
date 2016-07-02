<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - Summercamp</title>

        @include('includes/styles')
    </head>
    @yield('body')
</html>