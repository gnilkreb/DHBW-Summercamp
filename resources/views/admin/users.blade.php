@extends('layouts.admin')

@section('title', 'Benutzer')

@section('content')
    <div class="btn-group">
        <a href="/admin/user" class="btn btn-default">
            <i class="fa fa-user-plus"></i>
            Neuer Benutzer
        </a>
    </div>

    <hr>

    <h3>Benutzer</h3>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Alter</th>
            <th>Geschlecht</th>
            <th>Team</th>
            <th>Admin</th>
            <th>Login</th>
            <th>Modifiziert</th>
            <th>Registriert</th>
            <th>Löschen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="{{ $user->isAdmin() ? 'active' : '' }}">
                <td>{{ $user->id }}</td>
                <td>
                    <a href="user/{{ $user->id }}">{{ $user->name() }}</a>
                </td>
                <td>{{ $user->age }}</td>
                <td>
                    <i class="fa fa-{{ $user->genderIcon() }}"></i>
                </td>
                <td>{{ $user->teamName() }}</td>
                <td>
                    @if($user->isAdmin())
                        <i class="fa fa-check"></i>
                    @endif
                </td>
                <td>{{ Carbon::diffForHumans($user->login_at) }}</td>
                <td>{{ Carbon::diffForHumans($user->updated_at) }}</td>
                <td>{{ Carbon::diffForHumans($user->created_at) }}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-xs" data-delete="{{ $user->id }}" data-model="user" data-redirect="/admin/users">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection