<!-- Sidebar -->
<div id="sidebar" class="4u">
    <section>
        <header>
            <h2>Have you seen these?</h2>
        </header>
        <ul class="style">
            @foreach($sidebarArticles as $sidebarArticle)
                <li>
                    <a class="no-link-styling" href="{{ $sidebarArticle['url'] }}">
                        <p class="posted">{{ $sidebarArticle['published_at'] }}</p>
                        <img src="{{ $sidebarArticle['image'] }}" alt="" width="70" height="70">
                        <p class="text">
                            {{ $sidebarArticle['subtitle'] }}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
</div>
