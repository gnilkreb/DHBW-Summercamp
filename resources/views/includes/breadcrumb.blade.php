@if($active)
    <li class="active">{{ $label }}</li>
@else
    <li>
        <a href="{{ $href }}">{{ $label }}</a>
    </li>
@endif