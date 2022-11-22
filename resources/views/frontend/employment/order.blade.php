@extends('frontend.layouts.index')
@section('title', __('site.emp-'))
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_jobs_2) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ __('site.contact') }}</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                            <li>{{ __('site.contact') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">{{ __('site.join') }}</span>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">
                <form id="employmentInfo" action="{{ route('email.order') }}" method="POST" novalidate="novalidate">
                    @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="{{ __('site.name') }}">
                                    <span class="text-danger error-text name_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="" name="email" id="email" class="form-control"
                                    placeholder="{{ __('site.email') }}" >
                                    <span class="text-danger error-text email_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="" name="phone" id="phone" class="form-control"
                                    placeholder="{{ __('site.phone') }}">
                                    <span class="text-danger error-text phone_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="age" id="age" class="form-control"
                                    placeholder="{{ __('site.age') }}">
                                    <span class="text-danger error-text age_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="{{ __('site.address') }}">
                                    <span class="text-danger error-text address_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="qualifications" id="qualifications" class="form-control"
                                    placeholder="{{ __('site.qualifications') }}">
                                    <span class="text-danger error-text qualifications_err"></span>
                            </div>

                            <button type="submit" class="default-btn btn-submitt">{{ __('site.send') }} <span></span></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->
@endsection
