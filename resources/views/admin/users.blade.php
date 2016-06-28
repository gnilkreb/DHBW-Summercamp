@extends('layouts.admin')

@section('title', 'Benutzer')

@section('content')
    <a href="user" class="btn btn-default">
        <i class="fa fa-plus"></i>
        Neuer Benutzer
    </a>

    <hr>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Alter</th>
                <th>Geschlecht</th>
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
                    <td>{{ $user->createdAtDiff() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection