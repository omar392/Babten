@extends('frontend.layouts.index')
@section('title', __('site.about-'))
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_about) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ __('site.about') }}</h2>
                            <ul>
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li>{{ __('site.about') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start About Area -->
        <section class="about-area ptb-100 bg-f8f8f8">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <img src="{{  asset('dashboard/' . $cover->image_about_2) }}" alt="image">
                            <img src="{{  asset('dashboard/' . $cover->image_about_3) }}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-content">
                            <span>{{ __('site.about')}}</span>
                            <h2>{{ __('admin.abouts') }}</h2>
                            <p>{!! $about->about !!}</p>
                        </div>
                    </div>
                </div>

                <div class="about-inner-area">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="about-text-box">
								<h3>{{ __('site.mission') }}</h3>
                                <p>{!! $about->mission !!}</p>
							</div>
						</div>

						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="about-text-box">
								<h3>{{ __('site.vision') }}</h3>
                                <p>{!! $about->vision !!}</p>
                            </div>
						</div>

						<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 offset-sm-3 col-sm-6">
							<div class="about-text-box">
								<h3>{{ __('site.goals') }}</h3>
                                <p>{!! $about->goals !!}</p>
                            </div>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!-- End About Area -->
@endsection
