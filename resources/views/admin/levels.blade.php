@extends('layouts.admin')

@section('title', 'Levels')

@section('content')
    <div class="btn-group">
        <a href="/admin/category" class="btn btn-default">
            <i class="fa fa-folder"></i>
            Neue Kategorie
        </a>

        <a href="/admin/level" class="btn btn-default">
            <i class="fa fa-star"></i>
            Neues Level
        </a>

        <a href="/admin/task" class="btn btn-default">
            <i class="fa fa-tasks"></i>
            Neue Aufgabe
        </a>
    </div>

    <hr>
@endsection