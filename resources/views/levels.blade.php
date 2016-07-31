@extends('layouts.app')

@section('title', 'Level')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="/img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <div class="col-xs-6 col-xs-offset-3 sc-panel scratch-panel">
            <div class="row">
                <div class="col-xs-12 content-top-border-6"></div>
            </div>
            <div class="row">
                <div class="col-xs-12 content">
                    @include('includes.breadcrumbs')

                    @foreach($levels as $level)
                        <div class="col-xs-4 star-column">
                            <div>
                                <a href="/level/{{ $level->id }}" class="hvr-grow">
                                    @if($level->stars() > 0)
                                        <span class="star-text">{{ $level->stars() }}</span>
                                    @endif
                                    <img src="{{ $level->imageUrl() }}" class="img-responsive center-block star">
                                </a>
                            </div>
                            <div>
                                {{ $level->title }}

                                @if($level->hasTrophy())
                                    <i class="fa fa-trophy" data-toggle="tooltip" title="Alle Aufgaben erledigt!"></i>
                                @endif
                            </div>
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