@extends('frontend.layouts.index')
@section('title', __('site.gallery-'))
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_gallery) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ __('site.gallery') }}</h2>
                            <ul>
                                <li><a href="{{ route('front.gallery') }}">{{ __('site.home') }}</a></li>
                                <li>{{ __('site.gallery') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Case Study Details Area -->
		<section class="case-study-details-area ptb-100">
            <div class="container">
                <div class="row">


                    @foreach ($gallery as $item)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="case-study-details-image">
                            <img src="{{ asset('dashboard/galleries/' . $item->image) }}" alt="projects" style="width: 700px;height:550px;">

                            <a href="{{ asset('dashboard/galleries/' . $item->image) }}" class="popup-btn"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
		<!-- End Case Study Details Area -->
@endsection
