@extends('layouts.admin')

@section('title', $new ? 'Neue Kategorie' : 'Kategorie bearbeiten')

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            @if(!$new)
                <h1>{{ $category->name }}</h1>
            @endif

            <form method="POST" action="/admin/category">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $category->id }}">
                @endif

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="control-label" for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name" required
                           value="{{ $category->name }}">
                    <span class="help-block">{{ $errors->first('name') }}</span>
                </div>

                <div class="checkbox">
                    <label>
                        <input type="hidden" name="active" value="0">
                        <input type="checkbox" name="active" value="1" {{ $category->active || $new ? 'checked' : '' }}>
                        Aktiv
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>

                <button type="button" class="btn btn-danger pull-right" data-delete="{{ $category->id }}"
                        data-model="category"
                        data-redirect="/admin/levels" {{ $new || $levels->count() > 0 ? 'disabled' : '' }}>
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
        @if(!$new)
            <div class="col-xs-12 col-sm-6">
                <h2>Level</h2>

                @if($levels->count() === 0)
                    <div class="alert alert-warning">
                        Es wurde noch kein Level für diese Kategorie erstellt!<br>
                        <strong>
                            <a href="/admin/level" class="alert-link">Level erstellen</a>
                        </strong>
                    </div>
                @endif

                <div class="list-group">
                    @foreach($levels as $level)
                        <a href="/admin/level/{{ $level->id }}" class="list-group-item">{{ $level->title }}</a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection