<!-- Footer -->
<div id="featured">
    <div class="container">
        <div class="row">
            @foreach($featuredArticles as $featuredArticle)
                <div class="4u">
                    <h2>{{ $featuredArticle['title'] }}</h2>
                    <a href="{{ $featuredArticle['url'] }}" class="image full">
                        <img src="{{ $featuredArticle['image'] }}" alt="" width="314" height="144">
                    </a>
                    <p>
                        {{ $featuredArticle['synopsis'] }}
                    </p>
                    <p>
                        <a href="{{ $featuredArticle['url'] }}" class="button">More Details</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</div>
