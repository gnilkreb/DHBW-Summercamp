@extends('layouts.app')

@section('title', 'Willkommen')

@section('content')
    <div class="centered-logo">
        <object class="logoobject" data="img/svg/logo.svg" type="image/svg+xml"></object>
    </div>

    <div class="container landing-container">
        <hr/>
        <?php $second = false; ?>
        @foreach($categories as $category)
            <div class="col-xs-5 @if($second === true) col-xs-offset-2 @endif sc-panel scratch-panel">
                <div class="row">
                    <div class="col-xs-12 content-top-border-6"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 content">
                        <h2>{{ $category->name }}</h2>
                        <a href="/category/{{ $category->id }}"><img src="img/png/cat.png" width="222px"
                                         class="img-responsive center-block hvr-grow sc-start-image"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 content-bottom-border-6"></div>
                </div>
            </div>
            <?php $second = true; ?>
        @endforeach
    </div>
@endsection