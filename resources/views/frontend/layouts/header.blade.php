        <!-- Start Header Area -->
        <header class="header-area">

            <!-- Start Top Header -->
            <div class="top-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-12">
                            <ul class="top-header-nav">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                @if ($localeCode == LaravelLocalization::getCurrentLocale())
                                @elseif($url = LaravelLocalization::getLocalizedURL($localeCode))
                                <li><a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    @if (app()->getLocale() == 'ar')
                                    English
                                    @else
                                    العربية
                                    @endif
                                </a>
                                @endif
                                @endforeach
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-10 col-md-12">
                            <div class="top-header-right-side">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="flaticon-email"></i>
                                        </div>
                                        <span>{{ __('site.email') }} : </span>
                                        <a>{{ $setting->email }}</a>
                                    </li>

                                    <li>
                                        <div class="icon">
                                           <i class="fa-solid fa-mobile-screen-button"></i>
                                        </div>
                                        <span>{{ __('site.phone') }}:</span>
                                        <a dir="ltr">{{ $setting->mobile }}</a>
                                    </li>
                                    <li>
                                        <div class="icon">
                                          <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <span>{{ __('site.mobile') }}:</span>
                                        <a dir="ltr">{{ $setting->phone }}</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('front.employmment') }}" class="default-btn">{{ __('site.join') }}<span></span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('front.quote') }}" class="default-btn">{{ __('site.quote') }}<span></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Top Header -->

            <!-- Start Navbar Area -->
            <div class="navbar-area">
                <div class="pearo-responsive-nav">
                    <div class="container">
                        <div class="pearo-responsive-menu">
                            <div class="logo black-logo">
                                <a href="{{ route('front.home') }}">
                                    <img src="{{  asset('dashboard/' . $setting->image) }}" style="width: 141px;height: 46px;" alt="logo">
                                </a>
                            </div>
                            <div class="logo white-logo">
                                <a href="{{ route('front.home') }}">
                                    <img src="{{  asset('dashboard/' . $setting->image) }}" style="width: 141px;height: 46px;" alt="logo">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pearo-nav">
                    <div class="container">
                        <nav class="navbar navbar-expand-md navbar-light">
                            <a class="navbar-brand black-logo" href="{{ route('front.home') }}">
                                <img src="{{  asset('dashboard/' . $setting->image) }}" style="width: 141px;height: 46px;" alt="logo">
                            </a>
                            <a class="navbar-brand white-logo" href="{{ route('front.home') }}">
                                <img src="{{  asset('dashboard/' . $setting->image) }}" style="width: 141px;height: 46px;" alt="logo">
                            </a>

                            <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                                @if (app()->getLocale() == 'ar')
                                <ul class="navbar-nav" style="padding-left: 80px;">
                                @endif
                                @if (app()->getLocale() == 'en')
                                <ul class="navbar-nav" style="padding-right: 80px;">
                                @endif
                                    <li class="nav-item"><a href="{{ route('front.home') }}" class="nav-link {{ URL::route('front.home') === URL::current() ? 'active' : '' }}">{{ __('site.home') }}</a></li>

                                    <li class="nav-item"><a href="{{ route('front.about') }}" class="nav-link {{ URL::route('front.about') === URL::current() ? 'active' : '' }}">{{ __('site.about') }}</a></li>


                                    <li class="nav-item"><a href="#" class="nav-link {{ URL::route('front.faqs') === URL::current() ? 'active' : '' }} {{ URL::route('front.gallery') === URL::current() ? 'active' : '' }}">{{ __('site.pages') }} <i class="flaticon-down-arrow"></i></a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item"><a href="{{ route('front.faqs') }}" class="nav-link {{ URL::route('front.faqs') === URL::current() ? 'active' : '' }}">{{ __('site.faqs') }}</a></li>
                                            <li class="nav-item"><a href="{{ route('front.gallery') }}" class="nav-link {{ URL::route('front.gallery') === URL::current() ? 'active' : '' }}">{{ __('site.gallery') }}</a></li>

                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="{{ route('front.services') }}" class="nav-link {{ URL::route('front.services') === URL::current() ? 'active' : '' }}">{{ __('site.services') }} <i class="flaticon-down-arrow"></i></a>
                                        <ul class="dropdown-menu">
                                            @foreach ($services as $item)
                                            <li class="nav-item"><a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}" class="nav-link">{{ $item->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a href="{{ route('front.blog') }}" class="nav-link {{ URL::route('front.blog') === URL::current() ? 'active' : '' }}">{{ __('site.blog') }} <i class="flaticon-down-arrow"></i></a>
                                        <ul class="dropdown-menu">
                                            @foreach ($blogs as $item)
                                            <li class="nav-item"><a href="{{route('front.blog.details',[str_replace(' ', '-', $item->url)])}}" class="nav-link">{{ $item->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a href="{{ route('front.jobs') }}" class="nav-link {{ URL::route('front.jobs') === URL::current() ? 'active' : '' }}">{{ __('site.jobs') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('front.locations') }}" class="nav-link {{ URL::route('front.locations') === URL::current() ? 'active' : '' }}">{{ __('site.locations') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('front.contact') }}" class="nav-link {{ URL::route('front.contact') === URL::current() ? 'active' : '' }}">{{ __('site.contact') }}</a></li>
                                </ul>

                                <div class="others-option">
                                    <div class="burger-menu">
                                        <i class="flaticon-menu"></i>
                                    </div>

                                    <!-- Dark/Light Toggle -->
                                    <div class="dark-version-btn">
                                        <label id="switch" class="switch">
                                            <input type="checkbox" onchange="toggleTheme()" id="slider">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End Navbar Area -->

        </header>
        <!-- End Header Area -->
