@extends('layouts.main')

@section('content')
    <section>
        <a class="no-link-styling" href="{{ $homeArticle['url'] }}">
            <header>
                <h2>{{ $homeArticle['title'] }}</h2>
                <span class="byline">{!! $homeArticle['subtitle'] !!}</span>
            </header>
        </a>
        <a href="{{ $homeArticle['url'] }}" class="image full">
            <img src="{{ $homeArticle['image'] }}" alt=""
                width="700" height="260">
        </a>
        <p>
            {!! $homeArticle['synopsis'] !!}
        </p>
    </section>
@endsection




