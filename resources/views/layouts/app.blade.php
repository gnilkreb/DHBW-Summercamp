@extends('layouts.master')

@section('body')
    <body class="app-font">
        <div class="bg bg-heaven"></div>
        <div class="bg bg-clouds"></div>
        <div class="bg bg-landscape"></div>

        @yield('content')

        @include('includes.scripts')
    </body>
@endsection