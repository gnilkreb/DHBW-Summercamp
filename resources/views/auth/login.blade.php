@extends('auth.partial')

@section('title', 'Anmelden')

@section('auth-content')
    <form style="margin: 25px;">
        <div class="form-group">
            <label for="user">Wer bist du?</label>
            <select id="user" name="user" class="form-control">
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
