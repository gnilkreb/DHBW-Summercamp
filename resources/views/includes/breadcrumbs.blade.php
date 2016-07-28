<ol class="breadcrumb" style="width: 80%; margin-left: 10%;">
    <li>
        <a href="/">Start</a>
    </li>

    <li>
        <a href="/login">Anmelden</a>
    </li>

    <li>
        <a href="/categories">Kategorien</a>
    </li>

    @if(isset($category))
        <li>
            <a href="/category/{{ $category->id }}">{{ $category->name }}</a>
        </li>
    @endif

    @if(isset($level))
        <li>
            <a href="/level/{{ $level->id }}">{{ $level->title }}</a>
        </li>
    @endif

    @if(isset($task))
        <li>
            <a href="/task/{{ $task->id }}">{{ $task->difficultyName() }}</a>
        </li>
    @endif
</ol>