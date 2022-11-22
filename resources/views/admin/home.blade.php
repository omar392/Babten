@extends('admin.layouts.master')
@section('content')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">{{ __('admin.dashboard') }}</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                                    <li class="breadcrumb-item">{{ __('admin.dashboard') }}</li>
                                </ol>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">

                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('banners.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-image-filter bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.banners') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('services.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-shape-plus bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.services') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('partners.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-message-draw bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.partners') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('employments.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-clipboard bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.employments') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('blog.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-blogger bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.blogs') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('faqs.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-information bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.faqs') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('gallery.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-camera-iris bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.gallery') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <a href="{{ route('locations.index') }}">
                            <div class="card">
                                <div class="card-heading p-4">
                                    <div class="mini-stat-icon float-right">
                                        <i class="mdi mdi-navigation bg-primary  text-white"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-16">{{ __('admin.locations') }}</h5>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    </div>

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
@endsection
