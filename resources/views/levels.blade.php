@extends('layouts.app')

@section('title', 'Willkommen')

@section('content')
<div class="centered-logo">
    <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
</div>

<div class="container landing-container">
    <hr/>
    <div class="col-xs-6 col-xs-offset-3 sc-panel scratch-panel">
        <div class="row">
            <div class="col-xs-12 content-top-border-6"></div>
        </div>
        <div class="row">
            <div class="col-xs-12 content">
                @foreach($levels as $level)
                    <div class="col-xs-4 star-column">
                        <a href="/level/{{ $level->id }}"><img src="img/png/star_empty.png" class="img-responsive center-block star hvr-grow"><br/></a>
                        {{ $level->title }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 content-bottom-border-6"></div>
        </div>
    </div>
</div>

@endsection