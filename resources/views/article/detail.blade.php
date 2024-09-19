@extends('layouts.main')

@section('content')
    <section>
        <header>
            <h2>{{ $article['title'] }}</h2>
{{--            <span class="byline">{{ $article['subtitle'] }}</span>--}}
        </header><a href="#" class="image full"><img src="{{ $article['image'] }}" alt=""
                width="700" height="260"></a>
        <p>
            {!! $article['content'] !!}
        </p>
    </section>
@endsection
