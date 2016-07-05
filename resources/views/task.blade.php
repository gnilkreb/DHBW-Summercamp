@extends('layouts.app')

@section('title', 'Aufgabe')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="/img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-xs-12 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border-12"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">{!! $task->content !!}</div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>
    </div>
@endsection