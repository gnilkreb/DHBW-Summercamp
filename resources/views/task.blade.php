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
                <div class="col-xs-12 content">
                    <div class="col-xs-12">
                        <h2>Ein neues Bühnenbild hinzufügen</h2>
                        <hr style="width: 0;"/>
                    </div>
                    <div class="col-xs-6">
                        <p style="text-align: left; margin-left: 25px; font-size: 2rem; letter-spacing: 0.25rem; line-height: 3rem;">
                            Die Figur ist müde und möchte eigentlich schlafen. Es sei denn die Leertaste wird gedrückt,
                            dann wacht sie auf und sagt „Hallo“ und geht ein paar Schritte. <br/>
                            Wenn du willst kannst du auch noch einen Kostümwechsel einbauen und die Katze mit ein paar
                            Abänderungen an dem Kostüm zum Schlafen bringen. <br/>
                            <br/>
                            Male einfach die Augen mit Orange aus. <br/>
                            Viel Spaß beim Ausprobieren.
                        </p>
                    </div>
                    <div class="col-xs-6">
                        <!-- https://www.youtube.com/embed/8JG4aeVreCQ?rel=0&amp;showinfo=0 -->
                        <div style="margin-right: 25px;">
                            <iframe id="ytplayer" type="text/html" width="100%" height="390"
                                    style="background-color: white;"
                                    src="http://www.youtube.com/embed/M7lc1UVf-VE?autoplay=1&origin=http://example.com"
                                    frameborder="0"
                                    scrolling="no"></iframe>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>
    </div>
@endsection