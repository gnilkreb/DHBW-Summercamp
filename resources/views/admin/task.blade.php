@extends('layouts.admin')

@section('title', $new ? 'Neue Aufgabe' : 'Aufgabe bearbeiten')

@section('content')
    <div class="btn-group">
        <a href="/admin/levels" class="btn btn-default">
            <i class="fa fa-arrow-left"></i>
            Level Übersicht
        </a>

        @if(!$new)
            <a href="/admin/level/{{ $task->level->id }}" class="btn btn-default">
                <i class="fa fa-star"></i>
                {{ $task->level->title }}
            </a>
        @endif
    </div>

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
                            <input type="radio" name="difficulty" id="difficulty_easy" value="1"
                                   required {{ $task->difficulty === 1 ? 'checked' : '' }}>
                            Einfach
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_medium"
                                   value="2" {{ $task->difficulty === 2 ? 'checked' : '' }}>
                            Mittel
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="difficulty" id="difficulty_hard"
                                   value="3" {{ $task->difficulty === 3 ? 'checked' : '' }}>
                            Schwierig
                        </label>
                    </div>
                    <span class="help-block">{{ $errors->first('difficulty') }}</span>
                </div>

                <div class="form-group {{ $errors->has('difficulty') ? 'has-error' : '' }}">
                    <label for="content" class="control-label">Inhalt</label>
                    <textarea id="content" name="content" class="form-control" placeholder="Inhalt"
                              required>{{ $task->content }}</textarea>
                    <span class="help-block">{{ $errors->first('content') }}</span>
                </div>

                <div class="form-group {{ $errors->has('youtube_url') ? 'has-error' : '' }}">
                    <label class="control-label" for="youtube_url">
                        YouTube Embed URL
                        <a href="https://support.google.com/youtube/answer/171780?hl=de" target="_blank">
                            <i class="fa fa-exclamation-circle" style="color: red" data-toggle="tooltip" data-placemenet="top" data-html="true" title="<strong>Achtung: Embed URL des Videos verwenden!</strong>"></i>
                        </a>
                    </label>
                    <input id="youtube_url" name="youtube_url" type="text" class="form-control"
                           placeholder="YouTube Embed URL"
                           value="{{ $task->youtube_url }}">
                    <span class="help-block">{{ $errors->first('youtube_url') }}</span>
                </div>

                <div class="form-group {{ $errors->has('pdf_url') ? 'has-error' : '' }}">
                    <label class="control-label" for="pdf_url">PDF URL</label>
                    <input id="pdf_url" name="pdf_url" type="text" class="form-control" placeholder="PDF URL"
                           value="{{ $task->pdf_url }}">
                    <span class="help-block">{{ $errors->first('pdf_url') }}</span>
                </div>

                <div class="form-group {{ $errors->has('finish_type') ? 'has-error' : '' }}">
                    <label class="control-label">Abgabe</label>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="self" value="{{ App\Domain\Tasks\FinishType::SELF }}"
                                   required {{ $task->finish_type === App\Domain\Tasks\FinishType::SELF ? 'checked' : '' }}>
                            Selbstprüfung
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="multiple-choice"
                                   value="{{ App\Domain\Tasks\FinishType::MULTIPLE_CHOICE }}" {{ $task->finish_type === App\Domain\Tasks\FinishType::MULTIPLE_CHOICE ? 'checked' : '' }}>
                            Multiple Choice
                        </label>
                    </div>
                    <div class="radio">
                        <label class="control-label">
                            <input type="radio" name="finish_type" id="teacher"
                                   value="{{ App\Domain\Tasks\FinishType::TEACHER }}" {{ $task->finish_type === App\Domain\Tasks\FinishType::TEACHER ? 'checked' : '' }}>
                            Lehrer
                        </label>
                    </div>
                    <span class="help-block">{{ $errors->first('finish_type') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $task->id }}"
                        data-model="task"
                        data-redirect="/admin/levels" {{ $new || $task->answers->count() > 0 ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
        @if($task->finish_type === App\Domain\Tasks\FinishType::MULTIPLE_CHOICE)
            <div class="col-xs-12 col-sm-6">
                <h3>Multiple Choice</h3>

                <div class="list-group">
                    @forelse($task->answers as $answer)
                        <button type="button"
                                class="list-group-item {{ $answer->correct ? 'list-group-item-success' : 'list-group-item-danger' }}"
                                title="Antwort löschen"
                                data-toggle="tooltip" data-placement="top" data-container="body"
                                data-delete="{{ $answer->id }}" data-model="answer" data-redirect="/admin/task/{{ $task->id }}">
                            <i class="fa {{ $answer->correct ? 'fa-check' : 'fa-times' }}"></i>
                            {{ $answer->label }}
                        </button>
                    @empty
                        <div class="list-group-item list-group-item-warning">Es wurde noch keine Antwort hinzugefügt</div>
                    @endforelse
                </div>

                <hr>

                <form method="POST" action="/admin/task/{{ $task->id }}/question">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                        <label for="question" class="control-label">Frage</label>
                        <div class="input-group">
                            <input id="question" type="text" name="question" class="form-control" placeholder="Frage" value="{{ $task->question }}" required>
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" data-toggle="tooltip" title="Frage speichern">
                                <i class="fa fa-floppy-o"></i>
                            </button>
                        </span>
                        </div>
                        <span class="help-block">{{ $errors->first('question') }}</span>
                    </div>
                </form>

                <hr>

                <form method="POST" action="/admin/answer">
                    {{ csrf_field() }}

                    <input type="hidden" name="task_id" value="{{ $task->id }}">

                    <div class="form-group {{ $errors->has('label') ? 'has-error' : '' }}">
                        <label for="label" class="control-label">Antwort</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <input type="hidden" name="correct" value="0">
                                <input type="checkbox" name="correct" value="1">
                            </span>
                            <input id="label" type="text" name="label" class="form-control" placeholder="Antwort" required>
                        </div>
                        <span class="help-block">{{ $errors->first('label') }}</span>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Antwort hinzufügen
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection