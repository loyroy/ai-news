<!-- Header -->
<div id="header">
    <div class="container">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="#">{{ $title }}</a></h1>
            <span>{{ $subtitle }}</span>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                @foreach($links as $link)
                    <li @if($link['active']) class="active" @endif>
                        <a href="{{ $link['url'] }}">
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
