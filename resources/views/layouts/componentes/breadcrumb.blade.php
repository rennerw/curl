<nav aria-label="breadcrumb">

    <ol class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        @php
            $link = url('/');
        @endphp

        @foreach(request()->segments() as $segment)
            @php
                $link .= "/" . request()->segment($loop->iteration);
            @endphp
            @if(rtrim(request()->route()->getPrefix(), '/') != $segment && ! preg_match('/[0-9]/', $segment))
                @if(Str::title($segment) != 'Admin' && $segment != "home")
                    <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                        @if($loop->last)
                            {{ Str::title($segment) }}
                        @else
                            <a href="{{ $link }}">{{ Str::title($segment) }}</a>
                        @endif
                    </li>
                @endif
            @endif
        @endforeach
    </ol>
</nav>