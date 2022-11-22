<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
@include('frontend.layouts.head')

    <body>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->

        @include('frontend.layouts.header')
        @include('frontend.layouts.sidebar')


        @yield('content')


        @include('frontend.layouts.footer')
        @include('frontend.layouts.script')
    </body>
</html>
