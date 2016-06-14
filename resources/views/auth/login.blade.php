@extends('auth.partial')

@section('title', 'Anmelden')

@section('auth-content')
    <form style="margin: 25px;" method="POST" action="login">
        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label" for="user_id">Wer bist du?</label>
            <select id="user_id" name="user_id" class="form-control" required>
                <option></option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name() }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-xs-6" style="text-align: left;">
                    <a href="/"><img src="img/svg/arrow_back.svg" width="25%" class="hvr-grow"></a>
                </div>
                <div class="col-xs-6" style="text-align: right;">
                    <input type="image" src="img/svg/savedata_green.svg" alt="Submit" width="25%"
                           class="hvr-grow">
                </div>
            </div>
        </div>
    </form>
@endsection
