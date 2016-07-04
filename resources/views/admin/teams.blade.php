@extends('layouts.admin')

@section('title', 'Teams')

@section('content')
    <a href="/admin/team/create" class="btn btn-default">
        <i class="fa fa-plus"></i>
        Neues Team
    </a>

    <hr>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Löschen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>
                    <a href="/admin/team/{{ $team->id }}">{{ $team->name }}</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-xs" data-delete="{{ $team->id }}" data-model="team"
                            data-redirect="/admin/teams">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection