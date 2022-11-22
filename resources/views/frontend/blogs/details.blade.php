@extends('frontend.layouts.index')
@section('content')
        <!-- Start Page Title Area -->
        <div class="page-title-area" style="background-image: url('{{  asset('dashboard/' . $cover->image_blog) }}')">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="page-title-content">
                            <h2>{{ $blog->title }}</h2>
                            <ul>
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li>{{ $blog->title }}</li>
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
                                <img src="{{ asset('dashboard/blogs/' . $blog->image) }}" alt="image">
                                
                            </div>

                            <div class="article-content">
                                <div class="entry-meta">
                                    <ul>
                                        <li><i class="far fa-clock"></i> <a>{{ $blog->created_at->format('d-F-Y') }}</a></li>
                                    </ul>
                                </div>

                                <blockquote class="wp-block-quote">
                                    <p>{!! $blog->title !!}</p>
                                </blockquote>

                                <p>{!! $blog->description !!}</p>

                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Blog Details Area -->
@endsection
