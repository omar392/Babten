@extends('frontend.layouts.index')
@section('content')
        <!-- Start Main Banner Area -->
        <div class="home-area home-slides owl-carousel owl-theme">
            @foreach ($banners as $item)
            <div class="banner-section" style="background-image: url('{{  asset('dashboard/banners/' . $item->image) }}')">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                                <h1 class="sub-title">{{ $item->title }}</h1>
                                <p>{!! $item->description !!}</p>

                                <div class="btn-box">
                                    <a href="{{ route('front.quote') }}" class="default-btn">{{ __('site.quote') }}<span></span></a>
                                    <a href="{{ route('front.contact') }}" class="optional-btn">{{ __('site.contact') }} <span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <!-- End Main Banner Area -->


        <!-- Start About Area -->
        <section class="about-area ptb-100 bg-f8f8f8">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-title">
                            <span>{{ __('site.about') }}</span>
                            <h2>{{ $setting->name }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-text">
                            <p>{!! $about->about !!}</p>

                            <a href="{{ route('front.about') }}" class="read-more-btn">{{ __('site.more') }}<i class="flaticon-right-chevron"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Area -->

        <!-- Start Services Area -->
        <section class="services-area bg-f8f8f8 pb-70">
            <div class="container">
                <div class="services-slides owl-carousel owl-theme">


                    @foreach ($services as $item)
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-insurance"></i>

                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/icon-bg1.png') }}" alt="image">
                                <img src="{{ asset('frontend/assets/img/icon-bg2.png') }}" alt="image">
                            </div>
                        </div>

                        <h3><a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}">{{ $item->title }}</a></h3>

                        {{-- <p>{!! $item->description !!}</p> --}}
                        {!! Str::limit($item->description, 100) !!}

                        <a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}" class="read-more-btn">{{ __('site.more') }}</a>

                        <div class="box-shape">
                            <img src="{{ asset('frontend/assets/img/box-shape1.png') }}" alt="image">
                            <img src="{{ asset('frontend/assets/img/box-shape2.png') }}" alt="image">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Services Area -->

        <!-- Start Partner Area -->
        <section class="partner-area">
            <div class="container">
                <div class="partner-title">
                    <h2>{{ __('site.partners') }}</h2>
                </div>

                <div class="partner-slides owl-carousel owl-theme">
                    @foreach ($partners as $item)
                    <div class="single-partner-item">
                        <a>
                            <img src="{{ asset('dashboard/partners/' . $item->image) }}" alt="image">
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Partner Area -->


        <!-- Start Quote Area -->
        <section class="quote-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="quote-content">
                            <h2>{{ __('site.quote') }}</h2>
                            <p>{{ __('site.quote_q') }}</p>

                            <div class="image">
                                <img src="{{ asset('dashboard/' . $cover->image_faqs) }}" alt="image">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="tab quote-list-tab">
                            {{-- <ul class="tabs">
                                <li><a>{{ __('site.home') }}</a></li>
                                <li><a>{{ __('site.business') }}</a></li>
                                <li><a>{{ __('site.health') }}</a></li>
                                <li><a>{{ __('site.car') }}</a></li>
                                <li><a>{{ __('site.life') }}</a></li>
                            </ul> --}}

                            <div class="tab_content">
                                <div class="tabs_item">
                                    <p>{{ __('site.exp') }}</p>
                                    <form  action="{{route('email.offer')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" placeholder="{{ __('site.name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="" class="form-control" name="email" placeholder="{{ __('site.email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" placeholder="{{ __('site.phone') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <select name="type" required>
                                                <option value="without">--{{ __('site.type') }}--</option>
                                                @foreach ($services as $item)
                                                <option value="{{ $item->title }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="default-btn">{{ __('site.quote') }} <span></span></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Quote Area -->



        <!-- Start Our Achievements Area -->
        <section class="achievements-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="achievements-content">
                            <div class="title">

                                <h2>{{ __('site.achieve') }}</h2>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                                    <div class="single-funfact">
                                        <i class="flaticon-flag"></i>
                                        <h3><span class="odometer" dir="ltr" data-count="{{ $counter->input2 }}"></span></h3>
                                        <p>{{ __('site.input2') }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-6 col-sm-4">
                                    <div class="single-funfact">
                                        <i class="flaticon-group"></i>
                                        <h3><span class="odometer" dir="ltr" data-count="{{ $counter->input0 }}"></span> <span class="sign-icon"></span></h3>
                                        <p>{{ __('site.input0') }}</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-12 col-sm-4">
                                    <div class="single-funfact">
                                        <i class="flaticon-medal"></i>
                                        <h3><span class="odometer" dir="ltr" data-count="{{ $counter->input3 }}"></span></h3>
                                        <p>{{ __('site.input3') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-dot"><img src="{{ asset('frontend/assets/img/bg-dot.png') }}" alt="image"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="divider"></div>
                        <div class="achievements-image-slides owl-carousel owl-theme">
                            @foreach ($banners as $item)
                            <div class="single-achievements-image" style="background-image: url('{{  asset('dashboard/banners/' . $item->image) }}')">
                                <img src="{{  asset('dashboard/banners/' . $item->image) }}" alt="image">
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Our Achievements Area -->

        <!-- Start Blog Area -->
        <section class="blog-area ptb-100 pb-0">
            <div class="container">
                <div class="section-title">
                    <h2 class="sub-title">{{ __('site.blog') }}</h2>
                </div>

                <div class="row">
                    @foreach ($blogers as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}"><img src="{{ asset('dashboard/blogs/' . $item->image) }}" alt="image"></a>

                                <div class="date"><i class="flaticon-timetable"></i>{{ $item->created_at->format('d-F-Y') }}</div>
                            </div>

                            <div class="post-content">
                                <h3><a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}">{{ $item->title }}</a></h3>
                                <p>{!! Str::limit($item->description, 30) !!}</p>

                                <a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}" class="default-btn">Read More <span></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-lg-12 col-md-12">
                        <div class="blog-notes">
                            {{-- <p>Insights to help you do what you do better, faster and more profitably. <a href="#">Read Full Blog</a></p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Blog Area -->


@endsection
