@extends('frontend.layouts.index')
@section('content')
        <!-- Start Error Area -->
		<section class="error-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="error-content">
                            {{-- <img src="assets/img/404.png" alt="error"> --}}

                            <h3>{{ __('site.404') }}</h3>
                            <p>{{ __('site.not') }}</p>

                            <a href="{{ route('front.home') }}" class="default-btn">{{ __('site.home') }}<span></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Error Area -->
@endsection
