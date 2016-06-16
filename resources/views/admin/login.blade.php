@extends('layouts.admin')

@section('title', 'Login')

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="login">
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="control-label" for="admin_id">Admin</label>
                    <select id="admin_id" name="admin_id" class="form-control">
                        @foreach($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
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