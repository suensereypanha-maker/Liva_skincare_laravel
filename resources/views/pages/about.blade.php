@extends('layouts.app')

@section('title', 'About LIVA — The Daily Edit')

@section('content')
<div id="app">
    <section class="about-page">
        <div class="about-intro container">
            <span class="eyebrow">THE LIVA POINT OF VIEW</span>
            <h1>Personal care.<br><span>Personally yours.</span></h1>
            <p>A place for hair care, body care,<br>and a little space for yourself.</p>
        </div>
        <div class="about-image">
            <img src="{{ asset('img/daily-edit-detail.webp') }}" alt="Sunlight falling across a personal care bottle and terracotta tiles" width="1536" height="1024">
        </div>
        <div class="about-body container">
            <span class="eyebrow">THE DAILY EDIT</span>
            <div>
                <h2>Everyday is<br>where it begins.</h2>
                <p>The LIVA collection brings shampoo, conditioner, shower essentials and body care into one simple edit. Explore by category, compare the details, or put together a shelf of your own.</p>
                <p>There’s no prescribed version of the perfect routine here. Start with the things you need. Make your selection personal.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">Explore the collection →</a>
            </div>
        </div>
    </section>
</div>
@endsection
