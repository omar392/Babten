

   <!-- Start Footer Area -->
        <footer class="footer-area">
            <div class="container">
                <div class="subscribe-area">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-12">
                            <div class="subscribe-content">
                                <h2>{{ __('site.newsletter') }} </h2>
                                <p>{{ __('site.sub') }}</p>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="subscribe-form">
                                <form id="emailservice" action="{{ route('email.store') }}" method="POST"
                                    novalidate="novalidate">
                                    @csrf
                                    <input type="text" class="input-newsletter" id="mail" placeholder="{{ __('site.email') }}" name="mail">
                                      <span class="text-danger error-text mail_err"></span>
                                    <button type="submit" class="btn-submittt">{{ __('site.subscripe') }}<i class="flaticon-right-chevron"></i></button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="logo">
                                <a href="{{ route('front.home') }}"><img src="{{  asset('dashboard/' . $setting->image) }}" style="width: 141px;height: 46px;" alt="image"></a>

                                <p>{!! $about->about !!}</p>
                            </div>

                            <ul class="social">
                                <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $setting->linkedin }}"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget">
                            <h3>{{ __('site.quick') }}</h3>

                            <ul class="footer-quick-links">
                                <li><a href="{{ route('front.home') }}">{{ __('site.home') }}</a></li>
                                <li><a href="{{ route('front.about') }}">{{ __('site.about') }}</a></li>
                                <li><a href="{{ route('front.contact') }}">{{ __('site.contact') }}</a></li>
                                <li><a href="{{ route('front.faqs') }}">{{ __('site.faqs') }}</a></li>
                                <li><a href="{{ route('front.blog') }}">{{ __('site.blog') }}</a></li>
                                <li><a href="{{ route('front.services') }}">{{ __('site.services') }}</a></li>
                                <li><a href="{{ route('front.quote') }}">{{ __('site.quote') }}</a></li>
                                @foreach ($files as $item)
                                <li><a href="{{ asset('dashboard/files/' . $item->file) }}" download="">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-0 offset-sm-3 offset-md-3">
                        <div class="single-footer-widget">
                            <h3>{{ __('site.services') }}</h3>

                            <ul class="footer-contact-info">
                               @foreach ($services as $item)
                                {{-- <li><span>{{ __('site.address') }}:</span> {!! $setting->address !!}</li> --}}
                                <li><a href="{{route('front.services.details',[str_replace(' ', '-', $item->url)])}}">{{ $item->title }}</a></li>

                               @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-0 offset-sm-3 offset-md-3">
                        <div class="single-footer-widget">
                            <h3>{{ __('site.info') }}</h3>

                            <ul class="footer-contact-info">
                                <li><span>{{ __('site.address') }}:</span> {!! $setting->address !!}</li>
                                <li><span>{{ __('site.email') }}:</span> <a>{{ $setting->email }}</a></li>
                                <li><span>{{ __('site.mobile') }}:</span> <a dir="ltr">{{ $setting->phone }}</a></li>
                                <li><span>{{ __('site.phone') }}:</span> <a dir="ltr">{{ $setting->mobile }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="copyright-area">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6 col-md-6">
                            <p><i class="far fa-copyright"></i> {{ $setting->footer }}  {{ now()->year }} ,, {{ __('site.designed') }} <a href="#" target="_blank">  Joud Tech</a></p>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </footer>
        <!-- End Footer Area -->
