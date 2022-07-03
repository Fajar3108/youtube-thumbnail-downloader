@extends('layouts.main-layout')

@section('content')

@php
    if (session()->has('thumbnails')) $thumbnails = session()->get('thumbnails');
@endphp

<main>
    <header>
        Total Usage : {{ App\Models\History::all()->count() }}
    </header>
    <section class="hero @if (!isset($thumbnails)) h-100 @endif">
        <h1><span>Youtube</span> Thumbnail<br>Downloader</h1>
        <form class="search-bar" method="GET" action="{{ route('youtube.thumbnail') }}">
            <input type="text" name="video_url" placeholder="Paste Youtube Video URL here..." required>
            <button class="btn">Search</button>
        </form>
        @error('video_url')
        <div class="alert alert-error">
            {{ $message }}
        </div>
        @enderror
    </section>

    @if (isset($thumbnails))
    <section id="thumbnails">
        @foreach ($thumbnails as $thumbnail)
        <div class="thumbnail">
            <img src="{{ $thumbnail['url'] }}" alt="Thumbnail {{ $thumbnail['quality'] }}">
            <a class="btn btn-download" href="{{ $thumbnail['url'] }}" download="thumbnail" target="_blank">Download {{ strtoupper($thumbnail['quality']) }} Quality</a>
        </div>
        @endforeach
    </section>
    @endif
</main>

