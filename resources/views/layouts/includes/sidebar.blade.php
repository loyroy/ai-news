@php
    $sidebarArticles = [
        [
            'date'          => 'August 11, 2002',
            'commentCount'  => 10,
            'image'         => 'images/pic04.jpg',
            'link'          => '#',
            'subtitle'      => 'Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.'
        ],
        [
            'date'          => 'August 11, 2002',
            'commentCount'  => 10,
            'image'         => 'images/pic05.jpg',
            'link'          => '#',
            'subtitle'      => 'Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.'
        ],
        [
            'date'          => 'August 11, 2002',
            'commentCount'  => 10,
            'image'         => 'images/pic06.jpg',
            'link'          => '#',
            'subtitle'      => 'Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.'
        ],
        [
            'date'          => 'August 11, 2002',
            'commentCount'  => 10,
            'image'         => 'images/pic01.jpg',
            'link'          => '#',
            'subtitle'      => 'Nullam non wisi a sem eleifend. Donec mattis libero eget urna. Pellentesque viverra enim.'
        ],
    ];
@endphp
<!-- Sidebar -->
<div id="sidebar" class="4u">
    <section>
        <header>
            <h2>Have you seen these?</h2>
        </header>
        <ul class="style">
            @foreach($sidebarArticles as $sidebarArticle)
                <li>
                    <p class="posted">{{ $sidebarArticle['date'] }} | ({{ $sidebarArticle['commentCount']  }}) Comments</p>
                    <img src="{{ $sidebarArticle['image'] }}" alt="" width="70" height="70">
                    <p class="text">
                        {{ $sidebarArticle['subtitle'] }}
                    </p>
                </li>
            @endforeach
        </ul>
    </section>
</div>
