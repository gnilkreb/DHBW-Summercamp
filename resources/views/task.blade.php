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
                    <div class="col-xs-6">
                        <p style="text-align: left; margin-left: 25px; font-size: 2rem; letter-spacing: 0.25rem; line-height: 3rem;">{!! $task->content !!}</p>
                    </div>
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
                    <div class="row">
                        <form method="POST" action="/task/{{ $task->id }}/finish">
                            @if($task->finish_type === App\Domain\Tasks\FinishType::MULTIPLE_CHOICE)
                                @foreach($task->answers as $answer)
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="answer_id" id="answer_{{ $answer->id }}" value="{{ $answer->id }}">
                                            {{ $answer->label }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                            <button type="submit" class="btn btn-primary btn-lg hvr-pulse-grow">Aufgabe lösen</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 content-bottom-border-12"></div>
            </div>
        </div>
    </div>
@endsection