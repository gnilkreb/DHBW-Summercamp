@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            @if($errors->has('message'))
                <div class="alert alert-warning">{{ $errors->first('message') }}</div>
            @endif

            <form method="POST" action="/login">
                {{ csrf_field() }}

                <input type="hidden" name="redirect" value="/admin">

                <div class="form-group">
                    <label class="control-label" for="user_id">Benutzer</label>
                    <select id="user_id" name="user_id" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label class="control-label" for="password">Passwort</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Passwort" required>
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Anmelden</button>
            </form>
        </div>
    </div>
@endsection