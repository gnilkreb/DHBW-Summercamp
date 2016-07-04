@extends('layouts.admin')

@section('title', $new ? 'Neue Kategorie' : 'Kategorie bearbeiten')

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    @if(!$new)
        <h1>{{ $category->title }}</h1>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/category">
                {{ csrf_field() }}

                @if(!$new)
                    <input id="id" name="id" type="hidden" value="{{ $category->id }}">
                @endif

                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label class="control-label" for="name">Name</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name" required value="{{ $category->name }}">
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

                <button type="button" class="btn btn-danger pull-right">
                    <i class="fa fa-trash"></i>
                    Löschen
                </button>
            </form>
        </div>
    </div>
@endsection