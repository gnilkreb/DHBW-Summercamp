@extends('layouts.admin')

@section('title', 'Team bearbeiten')

@section('content')
    <a href="/admin/teams" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Team Übersicht
    </a>

    <hr>

    <h2>{{ $team->name }}</h2>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/team/{{ $team->id }}/update">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="control-label" for="name">Teamname</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Teamname" required value="{{ $team->name }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>
            </form>
        </div>
    </div>
@endsection