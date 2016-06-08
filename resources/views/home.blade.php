@extends('layouts.app')

@section('body')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-md-6 col-md-offset-3 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content content-menu">
                    <div class="row">
                        <a href="login.html"><img src="img/png/menu_login.png" width="200px" class="hvr-grow"/></a>
                    </div>
                    <div class="row">
                        <a href="register.html"><img src="img/png/menu_register.png" width="200px"
                                                     class="hvr-grow"/></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border"></div>
            </div>
        </div>
    </div>
@endsection