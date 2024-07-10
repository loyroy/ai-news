@php
    $featuredArticles = [
        [
            'title'     => 'Aenean elementum facilisis',
            'link'      => '#',
            'image'     => 'images/pic01.jpg',
            'synopsis'  => 'Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Donec leo, vivamus
                        fermentum nibh in augue praesent a lacus at urna congue rutrum. Quisque dictum. Pellentesque
                        viverra vulputate enim.',
        ],
        [
            'title'     => 'Fusce ultrices fringilla',
            'link'      => '#',
            'image'     => 'images/pic02.jpg',
            'synopsis'  => 'Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Donec leo, vivamus
                        fermentum nibh in augue praesent a lacus at urna congue rutrum. Quisque dictum. Pellentesque
                        viverra vulputate enim.',
        ],
        [
            'title'     => 'Etiam rhoncus volutpat erat',
            'link'      => '#',
            'image'     => 'images/pic03.jpg',
            'synopsis'  => 'Nullam non wisi a sem semper eleifend. Donec mattis libero eget urna. Donec leo, vivamus
                        fermentum nibh in augue praesent a lacus at urna congue rutrum. Quisque dictum. Pellentesque
                        viverra vulputate enim.',
        ],
    ];
@endphp

<!-- Footer -->
<div id="featured">
    <div class="container">
        <div class="row">
            @foreach($featuredArticles as $featuredArticle)
                <div class="4u">
                    <h2>{{ $featuredArticle['title'] }}</h2>
                    <a href="{{ $featuredArticle['link'] }}" class="image full">
                        <img src="{{ $featuredArticle['image'] }}" alt="" width="314" height="144">
                    </a>
                    <p>
                        {{ $featuredArticle['synopsis'] }}
                    </p>
                    <p>
                        <a href="{{ $featuredArticle['link'] }}" class="button">More Details</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
