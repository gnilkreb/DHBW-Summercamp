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

    @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="/admin/category/{{ $category->id }}">{{ $category->name }}</a>
                </h3>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Titel</th>
                    <th>Reihenfolge</th>
                    <th>Modifiziert</th>
                    <th>Erstellt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($levels as $level)
                    @if($level->category_id == $category->id)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>
                                <a href="/admin/level/{{ $level->id }}">{{ $level->title }}</a>
                            </td>
                            <td>{{ $level->order }}</td>
                            <td>{{ Carbon::diffForHumans($level->updated_at) }}</td>
                            <td>{{ Carbon::diffForHumans($level->created_at) }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            <div class="panel-footer">
                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $category->id }}"
                        data-model="category"
                        data-redirect="/admin/levels" {{ $category->levels->count() > 0 ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>

                <div class="checkbox" style="display: inline-block">
                    <label>
                        <input type="checkbox"
                               {{ $category->active ? 'checked' : '' }} data-set-category-active="{{ $category->id }}">
                        Aktiv
                    </label>
                </div>
            </div>
        </div>
    @endforeach
@endsection