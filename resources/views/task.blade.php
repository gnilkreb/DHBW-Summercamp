@extends('layouts.app')

@section('title', 'Aufgabe')

@section('content')
    @include('includes.multiple-choice-modal')

    @if(session('wrong-answer'))
        <span id="wrong-answer"></span>
    @endif

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
                    <div class="row">
                        @include('includes.breadcrumbs')
                    </div>
                    @if($task->pdf_url)
                    <div class="row" style="text-align: right; padding-right: 40px;">
                        <a href="{{ $task->pdf_url }}" target="_blank" class="btn btn-primary btn-lg hvr-pulse-grow" style="margin-bottom: 15px;"><i class="fa fa-file-pdf-o"></i> </a>
                    </div>
                    @endif
                    <div class="row">
                        <div class="@if($task->youtube_url) col-xs-6 @else col-xs-12 @endif">
                            <p style="text-align: left; margin-left: 25px; font-size: 2rem; letter-spacing: 0.25rem; line-height: 3rem;">{!! $task->content !!}</p>
                        </div>
                        @if($task->youtube_url)
                        <div class="col-xs-6">
                            <!-- https://www.youtube.com/embed/8JG4aeVreCQ?rel=0&amp;showinfo=0 -->
                            <div style="margin-right: 25px;">
                                <iframe id="ytplayer" type="text/html" width="100%" height="390"
                                        style="background-color: white;"
                                        src="{{ $task->youtube_url }}"
                                        frameborder="0"
                                        scrolling="no"></iframe>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        @if($task->finished())
                            <h3 class="animated infinite pulse">Du hast diese Aufgabe richtig gelöst, weiter so! :)</h3>
                        @else
                            @if($task->isMultipleChoice())
                                <button type="button" class="btn btn-primary btn-lg hvr-pulse-grow" style="margin-top: 15px" data-toggle="modal" data-target="#modal">
                                    Aufgabe lösen
                                </button>
                            @else
                                <form method="POST" action="/task/{{ $task->id }}/finish">
                                    {{ csrf_field() }}

                                    @if($task->teacherRequested())
                                        <h3 class="animated rubberBand">Ein Lehrer sollte gleich bei dir sein.</h3>
                                    @else
                                        <button type="submit" class="btn btn-primary btn-lg hvr-pulse-grow" style="margin-top: 15px;">
                                            {{ $task->finishButtonLabel() }}
                                        </button>
                                    @endif
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>
    </div>
@endsection