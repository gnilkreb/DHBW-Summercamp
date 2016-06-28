@extends('layouts.admin')

@section('title', 'Benutzer')

@section('content')
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
                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
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