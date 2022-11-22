@extends('frontend.layouts.index')
@section('title', __('site.blog-'))
@section('content')

        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_blog) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ __('site.blog') }}</h2>
                            <ul>
                                <li><a href="{{ route('front.blog') }}">{{ __('site.home') }}</a></li>
                                <li>{{ __('site.blog') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Start Blog Area -->
        <section class="blog-area ptb-100">
            <div class="container">
                <div class="row">

                    @foreach ($blogs as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-post">
                            <div class="post-image">
                                <a href="single-blog.html"><img src="{{ asset('dashboard/blogs/' . $item->image) }}" alt="image"></a>

                                <div class="date"><i class="flaticon-calendar"></i>{{ $item->created_at->format('d-F-Y') }}</div>
                            </div>

                            <div class="post-content">
                                <h3><a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}">{{ $item->title }}</a></h3>
                                <p>{!! Str::limit($item->description, 30) !!}</p>

                                <a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}" class="default-btn">{{ __('site.more') }}<span></span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
        <!-- End Blog Area -->
@endsection
