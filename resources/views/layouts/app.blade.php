<!doctype html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        @include('includes/styles')
    </head>
    <body>
        <div class="bg bg-heaven"></div>
        <div class="bg bg-clouds"></div>
        <div class="bg bg-landscape"></div>

        @yield('body')

        @include('includes/scripts')
    </body>
</html>