@extends('layouts.master')

@section('body')
    <body class="admin-font">
    <div class="container">
        <div class="row">

            <!-- Left Column -->
            <div class="col-sm-3">
                <img class="img-responsive" src="/img/png/dhbw2.png" style="max-width: 250px">

                <br>

                @if(Auth::guard('admin')->check())
                    <h3>Navigation</h3>

                    <ul class="nav nav-pills nav-stacked">
                        @foreach($pages as $pageKey => $page)
                            <li class="{{ (Route::getCurrentRoute()->getPath() === 'admin/' . $pageKey ? 'active' : '') }}">
                                <a href="/admin/{{ $pageKey }}">
                                    <i class="{{ $page['icon'] }}" style="margin-right: 5px"></i>
                                    {{ $page['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <hr>
                @endif

                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="/">
                            <i class="fa fa-television" style="margin-right: 5px"></i>
                            Frontend
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Left Column -->

            <!-- Right Column -->
            <div class="col-sm-9">
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