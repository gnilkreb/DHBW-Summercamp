@extends('layouts.admin')

@section('title', $new ? 'Neues Level' : $level->title)

@section('content')
    <a href="/admin/levels" class="btn btn-default">
        <i class="fa fa-arrow-left"></i>
        Level Übersicht
    </a>

    <hr>

    @if(!$new)
        <h1>{{ $level->title }}</h1>
    @endif

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <form method="POST" action="/admin/level">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label class="control-label" for="title">Titel</label>
                    <input id="title" name="title" type="text" class="form-control" placeholder="Titel" required value="{{ $level->first_name }}">
                    <span class="help-block">{{ $errors->first('title') }}</span>
                </div>

                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category_id">Kategorie</label>
                    <select id="category_id" name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $level->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="help-block">{{ $errors->first('category_id') }}</span>
                </div>

                <div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
                    <label for="order">Reihenfolge</label>
                    <input id="order" name="order" type="number" class="form-control" placeholder="Reihenfolge" required value="{{ $level->order }}">
                    <span class="help-block">{{ $errors->first('order') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-check"></i>
                    Speichern
                </button>
            </form>
        </div>
    </div>
@endsection