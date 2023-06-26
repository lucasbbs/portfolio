@extends('layouts.master_home')
@section('home_content')
    @include('layouts.body.hero')

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Portfolio Details</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Portfolio Details</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @foreach ($slides as $slide)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($slide->image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3>{{ $portfolio->name }}</h3>
                            <ul>
                                <li><strong>Category</strong>: {{ $portfolio->tag->name }}</li>
                                <li><strong>Client</strong>: {{ $portfolio->client }}</li>
                                <li><strong>Project date</strong>: {{ $portfolio->date }}</li>
                                <li><strong>Project URL</strong>: <a href="{{ $portfolio->url }}">{{ $portfolio->url }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>{{ $portfolio->title }}</h2>
                            <p>
                                {{ $portfolio->description }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->
    </main>
@endsection
