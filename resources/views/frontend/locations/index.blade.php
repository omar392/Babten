@extends('frontend.layouts.index')
@section('title', __('site.locations-'))
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area" style="background-image: url('{{ asset('dashboard/' . $cover->image_contact) }}')">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ __('site.locations') }}</h2>
                        <ul>
                            <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                            <li>{{ __('site.locations') }}</li>
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
                <span class="sub-title">{{ __('site.locations') }}</span>
            </div>
            <div class="row" id="map">

            </div>
        </div>

        {{-- <div class="bg-map"><img src="{{ asset('frontend/assets/img/bg-map.png') }}" alt="image"></div> --}}
    </section>
    <!-- End Contact Area -->
@endsection
@section('scripts')
    @if (app()->getLocale() == 'ar')
        <script type="text/javascript">
            function initMap() {
                const myLatLng = {
                    lat: 24.8304385,
                    lng: 47.4020529
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 5,
                    center: myLatLng,
                });

                var data = {{ Js::from($data) }};

                var infowindow = new google.maps.InfoWindow();
                var url = '{{ URL::asset('/dashboard/locations') }}'
                var marker, i;



                for (i = 0; i < data.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(data[i]['lat'], data[i]['lang']),
                        map: map
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent('<h5>{{ __('site.address') }} : </h5>' + data[i]['description_ar'] + '<br>' + "<a target='_blank' href=" + data[i]['url'] + ">{{ __('site.directions') }}</a>" + "<br>"  + "<br>" +
                                "<img style='width: 350px;height: 150px;' src='" + url + '/' + "" + data[i][
                                    'image'
                                ] + "' >");
                            infowindow.open(map, marker);
                        }
                    })(marker, i));

                }
            }

            window.initMap = initMap;
        </script>
    @endif
    @if (app()->getLocale() == 'en')
        <script type="text/javascript">
            function initMap() {
                const myLatLng = {
                    lat: 24.8304385,
                    lng: 47.4020529
                };
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 5,
                    center: myLatLng,
                });

                var data = {{ Js::from($data) }};

                var infowindow = new google.maps.InfoWindow();

                var url = '{{ URL::asset('/dashboard/locations') }}'

                var marker, i;


                for (i = 0; i < data.length; i++) {
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(data[i]['lat'], data[i]['lang']),
                        map: map
                    });


                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent('<h5>{{ __('site.address') }} : </h5>' + data[i][
                                    'description_en'
                                ] + '<br>' + "<a target='_blank' href=" + data[i]['url'] +
                                ">{{ __('site.directions') }}</a>" + "<br>" + "<br>"+ "<img style='width: 350px;height: 150px;' src='" + url + '/' +
                                "" + data[i]['image'] + "' >");
                            infowindow.open(map, marker);
                        }
                    })(marker, i));

                }
            }

            window.initMap = initMap;
        </script>
    @endif
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>

    {{--  --}}


@endsection
