@extends('frontend.layouts.index')
@section('title', __('site.services-'))
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_service) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ __('site.services') }}</h2>
                            <ul>
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li>{{ __('site.services') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Services Area -->
        <section class="services-area ptb-100 pb-70">
            <div class="container">
                <div class="row">
                    @foreach ($services as $item)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="services-box">
                            <div class="image">
                                <img src="{{ asset('dashboard/services/' . $item->image) }}" alt="image">
                            </div>

                            <div class="content">
                                <h3><a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}">{{ $item->title }}</a></h3>

                                {!! Str::limit($item->description, 100) !!}

                                <a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}" class="read-more-btn">{{ __('site.more') }} <i class="flaticon-right-chevron"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End Services Area -->
@endsection
