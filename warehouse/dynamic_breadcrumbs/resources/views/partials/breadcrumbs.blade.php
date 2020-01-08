<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach($items as $label => $url)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $url }}">{{ $label }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
