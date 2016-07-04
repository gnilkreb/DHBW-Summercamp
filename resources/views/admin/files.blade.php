@extends('layouts.admin')

@section('title', 'Dateien')

@section('content')
    <form method="POST" action="/admin/file" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if($errors->has('file'))
            <div class="alert alert-danger">{{ $errors->first('file') }}</div>
        @endif

        <input id="file" name="file" type="file" style="opacity: 0" required>
        <button type="button" class="btn btn-default" data-file-input="#file">
            <i class="fa fa-folder-open"></i>
            Datei auswählen
        </button>

        <button type="submit" class="btn btn-primary">
            <i class="fa fa-cloud-upload"></i>
            Hochladen
        </button>
    </form>

    <hr>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>
                URL kopieren
            </th>
            <th>
                Löschen
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($files as $file)
            <tr>
                <td>
                    <a href="{{ $file['url'] }}" target="_blank">{{ $file['name'] }}</a>
                </td>
                <td>
                    <button type="button" class="btn btn-default btn-xs" data-clipboard-text="{{ $file['url'] }}"
                            data-toggle="tooltip" title="URL kopiert!" data-placement="top" data-trigger="manual">
                        <i class="fa fa-clipboard"></i>
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-xs" data-delete-file="{{ $file['name'] }}">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection