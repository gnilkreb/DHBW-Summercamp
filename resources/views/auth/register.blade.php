@extends('auth.partial')

@section('title', 'Registrieren')

@section('auth-content')
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
            <div class="row">
                <div class="col-xs-6" style="text-align: left;">
                    <a href="/"><img src="img/svg/arrow_back.svg" width="25%" class="hvr-grow"></a>
                </div>
                <div class="col-xs-6" style="text-align: right;">
                    <input type="image" src="img/svg/savedata_green.svg" alt="Submit" width="25%"
                           class="hvr-grow">
                </div>
            </div>
        </div>
    </form>
@endsection