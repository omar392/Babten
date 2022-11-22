        <!-- Sidebar Modal -->
        <div class="sidebar-modal">
            <div class="sidebar-modal-inner">
                <div class="sidebar-about-area">
                    <div class="title">
                        <h2>{{ __('site.about') }}</h2>
                        <p>{!! $about->about !!}</p>
                    </div>
                </div>

                <div class="sidebar-instagram-feed">
                    <h2>{{ __('site.gallery') }}</h2>

                    <ul>
                        @foreach ($galleries as $item)
                            <li><a ><img src="{{ asset('dashboard/galleries/' . $item->image) }}" alt="image"></a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="sidebar-contact-area">
                    <div class="sidebar-contact-info">
                        <div class="contact-info-content">
                            <h2>
                                <a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a>
                                <a href="tel:{{ $setting->mobile }}">{{ $setting->mobile }}</a>
                                <span>OR</span>
                                <a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                            </h2>

                            <ul class="social">
                                <li><a href="{{ $setting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{ $setting->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{ $setting->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="{{ $setting->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <span class="close-btn sidebar-modal-close-btn"><i class="flaticon-cross-out"></i></span>
            </div>
        </div>
        <!-- End Sidebar Modal -->
