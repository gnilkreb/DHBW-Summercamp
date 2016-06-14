@extends('layouts.app')

@section('title', 'Willkommen')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-xs-5 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">
                    <a href="#"><img src="img/png/cat.png" width="222px"
                                     class="img-responsive center-block hvr-grow sc-start-image"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border"></div>
            </div>
        </div>
        <div class="col-xs-5 col-xs-offset-2 sc-panel robotics-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">
                    <a href="#"><img src="img/png/robot.png" width="222px"
                                     class="img-responsive center-block hvr-grow sc-start-image"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border"></div>
            </div>
        </div>
    </div>
@endsection