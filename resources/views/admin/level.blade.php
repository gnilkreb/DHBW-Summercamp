@extends('layouts.admin')

@section('title', $new ? 'Neues Level' : 'Level bearbeiten')

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            @if(!$new)
                <h1>{{ $level->title }}</h1>
            @endif

            <form method="POST" action="/admin/level">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $level->id }}">
                @endif

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="control-label" for="title">Titel</label>
                    <input id="title" name="title" type="text" class="form-control" placeholder="Titel" required
                           value="{{ $level->title }}">
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category_id">Kategorie</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option></option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $level->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                </div>

                <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                    <label for="order">Reihenfolge</label>
                    <input id="order" name="order" type="number" class="form-control" placeholder="Reihenfolge" required
                           value="{{ $level->order }}">
                    <span class="help-block">{{ $errors->first('order') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $level->id }}"
                        data-model="level" data-redirect="/admin/levels "{{ $new ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
        @if(!$new)
            <div class="col-xs-12 col-sm-6">
                <h2>Aufgaben</h2>

                @if($tasks->count() === 0)
                    <div class="alert alert-warning">
                        Es wurde noch keine Aufgabe für dieses Level erstellt!<br>
                        <strong>
                            <a href="/admin/task" class="alert-link">Aufgabe erstellen</a>
                        </strong>
                    </div>
                @endif

                <div class="list-group">
                    @foreach($tasks as $task)
                        <a href="/admin/task/{{ $task->id }}" class="list-group-item">{{ $task->difficultyName() }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection