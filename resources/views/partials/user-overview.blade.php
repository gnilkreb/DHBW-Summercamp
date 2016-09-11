@foreach($users as $user)
    <div class="row">
        <div class="col-xs-3">
            <strong>{{ $user->name() }}</strong>
        </div>

        <div class="col-xs-3">
            <div class="progress">
                <div class="progress-bar progress-bar-danger" style="width: {{ $user->progress() }}%;">
                    {{ $user->progress() }}%
                </div>
            </div>
        </div>

        @if($user->activity)
            <div class="col-xs-4">
                <ol class="breadcrumb">
                    @if($user->activity->category)
                        <li>
                            <a href="/category/{{ $user->activity->category->id }}">
                                {{ $user->activity->category->name }}
                            </a>
                        </li>
                    @endif

                    @if($user->activity->level)
                        <li>
                            <a href="/level/{{ $user->activity->level->id }}">
                                {{ $user->activity->level->title }}
                            </a>
                        </li>
                    @endif

                    @if($user->activity->task)
                        <li>
                            <a href="/task/{{ $user->activity->task->id }}">
                                {{ $user->activity->task->difficultyName() }}
                            </a>
                        </li>
                    @endif
                </ol>
            </div>

            <div class="col-xs-2">
                <span class="label label-danger">{{ Carbon::diffForHumans($user->activity->created_at) }}</span>
            </div>
        @else
            <div class="col-xs-6">
                <span class="label label-danger">Noch keine Aktivität</span>
            </div>
        @endif

    </div>
@endforeach