<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- All CSS Links -->
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.rtl.min.css') }}">
    @endif
    @if (app()->getLocale() == 'en')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/dark-style.css') }}">
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rtl.css') }}">
    @endif
    <title>{{ $setting->name }} @yield('title')</title>
    {{-- <title>{{ __('website.smi') }}  @yield('title')</title> --}}
    <link rel="icon" type="image/png" href="{{  asset('dashboard/' . $setting->image) }}" style="width: 35px;height: 30px;">


{{-- seo --}}
<meta name="description" content="{{ $seo->description }}">
<meta name="keywords" content="{{ $seo->key }}">
<meta name="copyrights" content="{{ $setting->name }}">
<meta name="robots" content="noindex, nofollow">
<link rel="canonical" href="https://pharaonic.io/package/2-laravel/15-seo">
<link rel="prev" href="https://pharaonic.io/package/2-laravel/14-readable">
<link rel="next" href="https://pharaonic.io/package/2-laravel/13-auditable">
<link rel="alternate" href="{{ route('front.home') }}" hreflang="ar">
<link rel="alternate" href="{{ route('front.home') }}" hreflang="en-us">
<meta property="og:url" content="{{ route('front.home') }}">
<meta property="og:type" content="website">
<meta property="og:title" content="{{ $seo->title }}">
<meta property="og:description" content="{{ $seo->description }}">
<meta property="og:locale" content="ar">
<meta property="og:locale:alternate" content="en">
<meta property="og:locale:alternate" content="en_US">
<meta property="og:image" content="{{  asset('dashboard/' . $setting->image) }}">
<meta property="twitter:card" content="{{ $seo->title }}">
<meta property="twitter:title" content="{{ $seo->title }}">
<meta property="twitter:description" content="{{ $seo->description }}">
<meta property="twitter:image" content="{{  asset('dashboard/' . $setting->image) }}">
{{-- end seo --}}
</head>
<style type="text/css">
    #map {
      height: 400px;
    }
</style>
@toastr_css
