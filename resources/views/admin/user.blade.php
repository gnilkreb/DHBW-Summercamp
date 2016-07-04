@extends('layouts.admin')

@section('title', $new ? 'Neuer Benutzer' : 'Benutzer bearbeiten')

@section('content')
    <a href="/admin/users" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Benutzer Übersicht
    </a>

    <hr>

    @if(!$new)
        <h1>{{ $user->name() }}</h1>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/user">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $user->id }}">
                @endif

                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label class="control-label" for="first_name">Vorname</label>
                    <input id="first_name" name="first_name" type="text" class="form-control" placeholder="Vorname"
                           required value="{{ $user->first_name }}">
                    <span class="help-block">{{ $errors->first('first_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label class="control-label" for="last_name">Nachname</label>
                    <input id="last_name" name="last_name" type="text" class="form-control" placeholder="Nachname"
                           required value="{{ $user->last_name }}">
                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('age') ? 'has-error' : '' }}">
                    <label for="age">Alter</label>
                    <input id="age" name="age" type="number" class="form-control" placeholder="Alter" required min="1"
                           max="99" value="{{ $user->age }}">
                    <span class="help-block">{{ $errors->first('age') }}</span>
                </div>

                <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label for="gender">Geschlecht</label>
                    <select id="gender" name="gender" class="form-control">
                        <option></option>
                        <option value="1" {{ $user->gender === 1 ? 'selected' : '' }}>Weiblich</option>
                        <option value="0" {{ $user->gender === 0 ? 'selected' : '' }}>Männlich</option>
                    </select>
                    <span class="help-block">{{ $errors->first('gender') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $user->id }}"
                        data-model="user"
                        data-redirect="/admin/users" {{ $new ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
    </div>
@endsection