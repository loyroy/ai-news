<!-- Footer -->
<div id="featured">
    <div class="container">
        <div class="row">
            @foreach($featuredArticles as $key => $featuredArticle)

                <div class="4u">
                    <h2>{{ $featuredArticle['title'] }}</h2>
                    <a href="{{ $featuredArticle['url'] }}" class="image full">
                        <img src="{{ $featuredArticle['image'] }}" alt="" width="314" height="144">
                    </a>
                    <p>
                        {{ $featuredArticle['title'] }}
                    </p>
                    <p>
                        <a href="{{ $featuredArticle['url'] }}" class="button">More Details</a>
                    </p>
                </div>
                @if(($key + 1) % 3 === 0)
                    </div><div class="row">
               @endif
            @endforeach
        </div>
    </div>
</div>
