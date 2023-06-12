@extends('front.layouts.master')

@section('content')
    <!-- breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <h1 class="text-center">our events</h1>
            <div class="title-breadcrumb">
                <div class="link-breadcrumb">
                    <a class="text-decoration-none me-2 text-white" href="{{ route('/') }}">home</a>|
                    <span class="ms-2">our events</span>
                </div>
            </div>
        </div>
    </div>

    <!-- section -->

    <section class="blogs-bage pt-5 pb-5 new-blog">
        <div class="container pt-5">
            <div class="owl-carousel owl-theme pt-5">
                <div class="row">
                    @foreach ($events as $event)
                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                            <div class="card card-newest">
                                <div class="image-card">
                                    <img src="{{ asset($event->image) }}" class="card-img-top" alt="no-image">
                                </div>
                                <div class="card-body">
                                    <div class="card-date1">
                                        <p>
                                            <i class="fa-solid fa-calendar-days"></i>
                                            {{ $event->created_at->format('d') }} {{ $event->created_at->format('M') }},{{ $event->created_at->format('Y') }}
                                        </p>
                                    </div>
                                    <a class="text-decoration-none" href="{{ route('event', $event->id) }}">
                                        <h4 class="card-title color-dark mt-2 mb-3">{{ $event->title[lang()] }}.</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <!-- digital platform -->
    <section class="digital-platform mt-5">
        <div class="container">
            <h1 class="text-white text-center mb-5">digital platform</h1>
            <div class="owl-carousel owl-theme">
                @foreach ($pages as $page)
                    <div class="m-3 d-flex justify-content-center">
                        <a class="text-decoration-none btn-platform">{{ $page->title[lang()] }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
