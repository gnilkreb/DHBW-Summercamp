@extends('layouts.app')

@section('title', 'Kategorien')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        @foreach($categories as $index => $category)
            @if($category->active)
                <div class="col-xs-5 @if($index >= 1) col-xs-offset-2 @endif sc-panel scratch-panel">
                    <div class="row">
                        <div class="col-xs-12 content-top-border-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 content">
                            <h2>{{ $category->name }}</h2>
                            <a href="/category/{{ $category->id }}"><img src="{{ $category->image_url }}" width="222px"
                                             class="img-responsive center-block hvr-grow sc-start-image"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 content-bottom-border-6"></div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection