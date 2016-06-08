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
                <div class="col-xs-12 content">
                    <form style="margin: 25px;">
                        <div class="form-group">
                            <label for="first_name">Vorname</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Vorname">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Nachname</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Nachname">
                        </div>
                        <div class="form-group">
                            <label for="age">Alter</label>
                            <input type="number" class="form-control" id="age" placeholder="Alter">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="gender" checked data-on-text="Männlich"
                                   data-off-text="Weiblich">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6" style="text-align: left;">
                                    <a href="index.html"><img src="img/svg/arrow_back.svg" width="25%" class="hvr-grow"></a>
                                </div>
                                <div class="col-xs-6" style="text-align: right;">
                                    <input type="image" src="img/svg/savedata_green.svg" alt="Submit" width="25%"
                                           class="hvr-grow">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border"></div>
            </div>
        </div>
    </div>
@endsection