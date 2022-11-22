@extends('frontend.layouts.index')
@section('title', __('site.contact-'))
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_contact) }}')">
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
                <span class="sub-title">{{ __('site.contact') }}</span>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">
                        <form id="contactInfo" action="{{ route('contact.save') }}" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="{{ __('site.name') }}">
                                    <span class="text-danger error-text name_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="" name="email" id="email" class="form-control"
                                    placeholder="{{ __('site.email') }}">
                                    <span class="text-danger error-text email_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="" name="phone" id="phone" class="form-control"
                                    placeholder="{{ __('site.phone') }}">
                                    <span class="text-danger error-text phone_err"></span>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control"
                                    placeholder="{{ __('site.subject') }}">
                                    <span class="text-danger error-text subject_err"></span>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6"
                                    placeholder="{{ __('site.message') }}"></textarea>
                                    <span class="text-danger error-text message_err"></span>
                            </div>
                            <div class="form-group">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    <span class="text-danger error-text g-recaptcha-response_err"></span>
                            </div>

                            <button type="submit" class="default-btn btn-submit">{{ __('site.send') }} <span></span></button>
                        </form>
                        <br><br>
                    </div>
                </div>
                <br><br>
            </div>

            <div class="contact-info">
                <div class="contact-info-content">
                    <h3>{{ __('site.contact') }}</h3>
                    <h2>
                        <a dir="ltr" href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                        <a dir="ltr" href="tel:{{ $setting->mobile }}">{{ $setting->mobile }}</a>
                        <span>OR</span>
                        <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                    </h2>

                    <ul class="social">
                        <li><a href="{{ $setting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-map"><img src="{{ asset('frontend/assets/img/bg-map.png') }}" alt="image"></div>
    </section>
    <!-- End Contact Area -->
@endsection



