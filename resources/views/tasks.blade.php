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
            @foreach($tasks as $task)
                <div class="col-xs-4 star-column">
                    <a href="level_detail.html"><img src="img/png/btn_{{ $task->difficultyColor() }}_check.png" class="img-responsive center-block star hvr-grow"><br/></a>
                    Leicht
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