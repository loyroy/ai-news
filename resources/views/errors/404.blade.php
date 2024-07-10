@extends('layouts.main')

@section('content')
    <section>
        <header>
            <h2>404 not found</h2>
            <span class="byline">
                Did you get lost?
                <a href="{{ route('home') }}">Click here to return home</a>.
            </span>
        </header><a href="#" class="image full"><img src="images/pic07.jpg" alt=""
                width="700" height="260"></a>
@endsection
