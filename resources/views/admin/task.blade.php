@extends('layouts.admin')

@section('title', $new ? 'Neue Aufgabe' : 'Aufgabe bearbeiten')

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/task">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $task->id }}">
                @endif

                <div class="form-group {{ $errors->has('level_id') ? 'has-error' : '' }}">
                    <label for="level_id">Level</label>
                    <select id="level_id" name="level_id" class="form-control" required>
                        <option></option>
                        @foreach($levels as $level)
                            <option value="{{ $level->id }}" {{ $level->id === $task->level_id ? 'selected' : '' }}>{{ $level->title }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">{{ $errors->first('level_id') }}</span>
                </div>

                <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_easy" value="1" required>
                            Einfach
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_medium" value="2">
                            Mittel
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_hard" value="3">
                            Schwierig
                        </label>
                    </div>
                    <span class="help-block">{{ $errors->first('difficulty') }}</span>
                </div>

                <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                    <label for="content" class="control-label">Inhalt</label>
                    <textarea id="content" name="content" class="form-control" placeholder="Inhalt" required></textarea>
                    <span class="help-block">{{ $errors->first('content') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $task->id }}"
                        data-model="task"
                        data-redirect="/admin/levels" {{ $new ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
    </div>
@endsection