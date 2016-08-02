@extends('layouts.app')

@section('title', 'Kategorien')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-xs-12 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border-12"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">
                    <h2>Du bist auf Rang {{ Auth::user()->getRank() }}</h2>
                    @foreach($users as $user)
                        <div class="row">
                            <div class="col-xs-1 col-xs-offset-1">
                                <span class="star-text" style="color: #9A5F29;">{{ $user->getStars() }}</span>
                                <img src="/img/png/star.png" class="img-responsive">
                            </div>
                            <div class="col-xs-9" style="text-align: left;">
                                @if($activeUserId === $user->id || Auth::user()->isAdmin())
                                    <h2>{{ $user->first_name }}</h2>
                                @else
                                    <h2 style="color: transparent; text-shadow: 0 0 25px rgba(255, 255, 255, 1);">{{ $user->getRandomName() }}</h2>
                                @endif
                            </div>
                        </div><hr style="width: 50%; border: solid 1px transparent;"/>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>

    </div>
@endsection