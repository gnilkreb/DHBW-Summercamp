<ol class="breadcrumb" style="width: 80%; margin-left: 10%;">
    @include('includes.breadcrumb', ['href' => '/categories', 'label' => 'Kategorien', 'active' => !isset($category)])

    @if(isset($category))
        @include('includes.breadcrumb', ['href' => '/category/' . $category->id, 'label' => $category->name, 'active' => !isset($level)])
    @endif

    @if(isset($level))
        @include('includes.breadcrumb', ['href' => '/level/' . $level->id, 'label' => $level->title, 'active' => !isset($task)])
    @endif

    @if(isset($task))
        @include('includes.breadcrumb', ['href' => '/task/' . $task->id, 'label' => $task->difficultyName(), 'active' => true])
    @endif
</ol>