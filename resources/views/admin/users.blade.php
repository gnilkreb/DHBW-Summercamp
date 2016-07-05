@extends('layouts.admin')

@section('title', 'Benutzer')

@section('content')
    <div class="btn-group">
        <a href="/admin/user" class="btn btn-default">
            <i class="fa fa-user-plus"></i>
            Neuer Benutzer
        </a>

        <a href="/admin/new" class="btn btn-default">
            <i class="fa fa-user-secret"></i>
            Neuer Admin
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
            <th>Modifiziert</th>
            <th>Registriert</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <a href="user/{{ $user->id }}">{{ $user->name() }}</a>
                </td>
                <td>{{ $user->age }}</td>
                <td>
                    <i class="fa fa-{{ $user->genderIcon() }}"></i>
                </td>
                <td>{{ $user->teamName() }}</td>
                <td>{{ Carbon::diffForHumans($user->updated_at) }}</td>
                <td>{{ Carbon::diffForHumans($user->created_at) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <hr>

    <h3>Admins</h3>

    <table class="table">
        <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Modifiziert</td>
            <td>Erstellt</td>
            <td>Löschen</td>
        </tr>
        </thead>
        <tbody>
        @foreach($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ Carbon::diffForHumans($admin->updated_at) }}</td>
                <td>{{ Carbon::diffForHumans($admin->created_at) }}</td>
                <td>
                    <button type="button" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection