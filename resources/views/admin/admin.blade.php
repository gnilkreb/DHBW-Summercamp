@extends('layouts.admin')

@section('title', $new ? 'Neuer Admin' : 'Admin bearbeiten')

@section('content')
    <a href="/admin/users" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Benutzer Übersicht
    </a>

    <hr>

    @if(!$new)
        <h1>{{ $admin->name }}</h1>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/admin">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $admin->id }}">
                @endif

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="control-label" for="name">Vorname</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name"
                           required value="{{ $admin->name }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label class="control-label" for="password">Passwort</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Passwort" required>
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $admin->id }}"
                        data-model="admin"
                        data-redirect="/admin/users" {{ $new ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
    </div>
@endsection