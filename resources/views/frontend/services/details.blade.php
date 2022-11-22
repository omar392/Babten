@extends('frontend.layouts.index')
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_service) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ $service->title }}</h2>
                            <ul>
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li>{{ $service->title }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Blog Details Area -->
        <section class="blog-details-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="blog-details-desc">
                            <div class="article-image">
                                <img src="{{ asset('dashboard/services/' . $service->image) }}" alt="image" style="width: 1200px;height:350px;">
                            </div>
                            <div class="article-content">
                                <blockquote class="wp-block-quote">
                                    <p>{!! $service->title !!}</p>
                                </blockquote>
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->
@endsection
