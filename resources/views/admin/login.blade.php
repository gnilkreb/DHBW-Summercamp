@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="login">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="user">Benutzer</label>
                    <select id="user" name="user" class="form-control">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name() }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Passwort</label>
                    <input id="password" type="password" name="password" class="form-control" placeholder="Passwort" required>
                    <span class="help-block">{{ $errors->first('password') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Anmelden</button>
            </form>
        </div>
    </div>
@endsection