@foreach($requests as $request)
    <div class="well">
        <div class="row">
            <div class="col-sm-9">
                <span class="label label-primary">
                    {{ Carbon::diffForHumans($request->created_at) }}
                </span>

                <br>

                <a href="/admin/user/{{ $request->user->id }}">
                    {{ $request->user->name() }}
                </a>
                möchte die Aufgabe
                <a href="/task/{{ $request->task->id }}">
                    {{ $request->task->level->title }} ({{ $request->task->difficultyName() }})
                </a>
                in der Kategorie
                <a href="/category/{{ $request->task->level->category->name }}">
                    {{ $request->task->level->category->name }}
                </a>
                abgeben
            </div>

            <hr class="visible-xs-block">

            <div class="col-sm-3">
                <button type="button" class="btn btn-primary pull-left">
                    <i class="fa fa-check"></i>
                </button>

                <button type="button" class="btn btn-default pull-right">
                    <i class="fa fa-remove"></i>
                </button>
            </div>
        </div>
    </div>
@endforeach