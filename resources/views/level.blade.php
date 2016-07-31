@extends('layouts.app')

@section('title', $level->title)

@section('content')
    @if(session('status'))
        <span id="task-finished"></span>
    @endif

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

                    @foreach($tasks as $task)
                        <div class="col-xs-4 star-column">
                            <div>
                                <a href="/task/{{ $task->id }}" class="hvr-grow">
                                    <span class="star-text">{{ $task->difficulty }}</span>
                                    <img src="{{ $task->imageUrl() }}" class="img-responsive center-block star">
                                </a>
                            </div>
                            <div>{{ $task->difficultyName() }}</div>
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