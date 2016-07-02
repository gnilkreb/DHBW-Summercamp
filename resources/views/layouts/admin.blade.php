@extends('layouts.master')

@section('body')
    <body class="admin-font">
    <div class="container">
        <div class="row">

            <!-- Left Column -->
            <div class="col-xs-3">
                <img class="img-responsive" src="/img/png/dhbw.png">

                <br>

                @if(Auth::guard('admin')->check())
                    <h3>Navigation</h3>

                    <ul class="nav nav-pills nav-stacked">
                        @foreach($pages as $page => $pageName)
                            <li class="{{ (Route::getCurrentRoute()->getPath() === 'admin/' . $page ? 'active' : '') }}">
                                <a href="/admin/{{ $page }}">{{ $pageName }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <hr>
                @endif

                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="/">Frontend</a>
                    </li>
                </ul>
            </div>
            <!-- Left Column -->

            <!-- Right Column -->
            <div class="col-xs-9">
                <div class="page-header">
                    <h2>
                        @yield('title')
                        <small>DHBW Summercamp {{ date('Y') }}</small>
                    </h2>
                </div>

                @yield('content')
            </div>
            <!-- Right Column -->

        </div>
    </div>

    @include('includes.scripts')
    </body>
@endsection