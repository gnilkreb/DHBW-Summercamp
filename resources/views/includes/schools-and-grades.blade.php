<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('school') ? 'has-error' : '' }}">
            <label for="school">Schule</label>
            <select id="school" name="school" class="form-control" {{ $admin ? '' : 'required' }}>
                <option></option>
                @foreach($schools as $school)
                    <option value="{{ $school }}" {{ (!empty($user) && $user->school === $school) ? 'selected' : '' }}>{{ $school }}</option>
                @endforeach
            </select>
            <span class="help-block">{{ $errors->first('school') }}</span>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('grade') ? 'has-error' : '' }}">
            <label for="grade">Klasse</label>
            <select id="grade" name="grade" class="form-control" {{ $admin ? '' : 'required' }}>
                <option></option>
                @foreach($grades as $grade)
                    <option value="{{ $grade }}" {{ (!empty($user) && $user->grade == $grade) ? 'selected' : '' }}>{{ $grade }}. Klasse</option>
                @endforeach
            </select>
            <span class="help-block">{{ $errors->first('grade') }}</span>
        </div>
    </div>
</div>