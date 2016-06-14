@extends('auth.partial')

@section('title', 'Registrieren')

@section('auth-content')
    <form style="margin: 25px;" method="POST" action="register">
        {{ csrf_field() }}

        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
            <label class="control-label" for="first_name">Vorname</label>
            <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Vorname" required>
            <span class="help-block">{{ $errors->first('first_name') }}</span>
        </div>

        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
            <label for="last_name">Nachname</label>
            <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Nachname" required>
            <span class="help-block">{{ $errors->first('last_name') }}</span>
        </div>

        <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
            <label for="age">Alter</label>
            <input id="age" name="age" type="number" class="form-control" placeholder="Alter" required>
            <span class="help-block">{{ $errors->first('age') }}</span>
        </div>

        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
            <label for="gender">Geschlecht</label>
            <br>
            <input id="gender" name="gender" type="checkbox" data-on-text="Weiblich" data-off-text="Männlich" checked>
            <span class="help-block">{{ $errors->first('gender') }}</span>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-6" style="text-align: left;">
                    <a href="/">
                        <img src="img/svg/arrow_back.svg" width="25%" class="hvr-grow">
                    </a>
                </div>
                <div class="col-xs-6" style="text-align: right;">
                    <input type="image" src="img/svg/savedata_green.svg" alt="Submit" width="25%" class="hvr-grow">
                </div>
            </div>
        </div>
    </form>
@endsection