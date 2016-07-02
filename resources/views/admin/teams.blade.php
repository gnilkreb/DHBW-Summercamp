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
            <th>ID</th>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team->id }}</td>
                <td>
                    <a href="/admin/team/{{ $team->id }}">{{ $team->name }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection