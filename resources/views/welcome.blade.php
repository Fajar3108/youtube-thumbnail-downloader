@extends('layouts.main-layout')

@section('content')

<main>
    <section class="hero">
        <h1><span>Youtube</span> Thumbnail<br>Downloader</h1>
        <form class="search-bar" method="GET">
            <input type="text" placeholder="Paste Youtube Video URL here...">
            <button class="btn">Search</button>
        </form>
    </section>

    <section id="thumbnails">
        <div class="thumbnail">
            <img src="https://i.ytimg.com/vi/wy-sWNXEgg8/maxresdefault.jpg" alt="maxres">
            <a class="btn btn-download" href="https://i.ytimg.com/vi/wy-sWNXEgg8/maxresdefault.jpg" download>Download HD</a>
        </div>
    </section>
</main>

