@extends('frontend.layouts.index')
@section('title', __('site.faqs-'))
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_offer_single) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ __('site.faqs') }}</h2>
                            <ul>
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li>{{ __('site.faqs') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->
        <!-- Start FAQ Area -->
        <section class="faq-area ptb-100">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-lg-6 col-md-12 p-0">
                        <div class="faq-image">
                            <img src="{{ asset('dashboard/' . $cover->image_faqs_2) }}" alt="image">
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 p-0">
                        <div class="faq-accordion">
                            <span class="sub-title">{{ __('site.faq') }}</span>
                            {{-- <h2>Get Every Single Answers There if you want</h2> --}}

                            <ul class="accordion">
                                @foreach ($faqs as $item)
                                <li class="accordion-item">
                                    <a class="accordion-title" href="javascript:void(0)">
                                        <i class="fas fa-plus"></i>
                                        {{ $item->ask }}
                                    </a>

                                    <p class="accordion-content">{!! $item->answer !!}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End FAQ Area -->

        <!-- Start FAQ Contact Area -->
        <section class="faq-contact-area ptb-100 pt-0">
            <div class="container">
                <div class="section-title">
                    <span class="sub-title">{{ __('site.contact') }}</span>

                </div>

                <div class="faq-contact-form">

                    <form  action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" id="name" class="form-control"  placeholder="{{ __('site.name') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="" name="email" id="email" class="form-control"  placeholder="{{ __('site.email') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="{{ __('site.phone') }}" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="{{ __('site.subject') }}" required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="6"  placeholder="{{ __('site.message') }}" required></textarea>
                            </div>

                            <button type="submit" class="default-btn">{{ __('site.send') }} <span></span></button>
                    </form>
                </div>
            </div>

            <div class="bg-map"><img src="{{ asset('frontend/assets/img/bg-map.png') }}" alt="image"></div>
        </section>
        <!-- End FAQ Contact Area -->
@endsection
