<!-- Header area start -->
@php
    $currentLocale = app()->getLocale();
@endphp
<header>
    <div class="rs-header-area rs-header-four has-theme-light-blue">
        <div class="container-fluid g-0">
            <!-- top start -->
            <div class="rs-header-top rs-header-top-two">
                <div class="rs-header-info-wrapper">
                    <div class="rs-header-info-item">
                        <div class="rs-header-contact-item">
                            <span>{{ __('Email.') }}</span>
                            <h6><a href="mailto:{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}">{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}</a></h6>
                        </div>
                    </div>
                    <div class="rs-header-info-item">
                        <div class="rs-header-contact-item">
                            <span>{{ __('Call.') }}</span>
                            <h6><a href="tel:{{ $settings['contact_phone'] ?? '+902125550102' }}">{{ $settings['contact_phone'] ?? '+90 (212) 555 01 02' }}</a></h6>
                        </div>
                    </div>
                </div>
                <div class="rs-header-info-item d-flex align-items-center gap-3">
                    <div class="rs-header-contact-item">
                        <span>{{ __('Schedule.') }}</span>
                        <h6>{{ $settings['contact_schedule'] ?? 'Mon - Sat 10.00 - 18.00' }}</h6>
                    </div>
                </div>
            </div>
            <!-- top end -->
        </div>
        <div class="container-fluid">
            <div class="rs-header-inner rs-sticky-header" id="rs-sticky-header">
                <div class="rs-header-left">
                    <div class="rs-header-logo-wrapper">
                        <div class="rs-header-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo-light-blue.png') }}" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <div class="rs-header-menu">
                    <div class="rs-theme-social has-transparent has-theme-blue">
                        <a href="{{ $settings['social_twitter'] ?? '#' }}"><i class="ri-twitter-x-line"></i></a>
                        <a href="{{ $settings['social_facebook'] ?? '#' }}"><i class="ri-facebook-fill"></i></a>
                        <a href="{{ $settings['social_linkedin'] ?? '#' }}"><i class="ri-linkedin-fill"></i></a>
                        <a href="{{ $settings['social_instagram'] ?? '#' }}"><i class="ri-instagram-line"></i></a>
                    </div>
                    <nav id="mobile-menu" class="main-menu">
                        <ul class="multipage-menu">
                            @forelse($menuItems ?? [] as $item)
                                <li>
                                    <a href="{{ $item->localizedUrl() }}" target="{{ $item->target }}">{{ $item->t('title') }}</a>
                                </li>
                            @empty
                                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('about') }}">{{ __('About') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::sectionUrl('services') }}">{{ __('Services') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::sectionUrl('products') }}">{{ __('Products') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('blog') }}">{{ __('Blog') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('contact') }}">{{ __('Contact') }}</a></li>
                            @endforelse
                        </ul>
                    </nav>
                </div>
                <div class="rs-header-right">
                    <!-- Language Switcher Dropdown -->
                    @include('partials.language-dropdown')

                    <!-- search area start -->
                    <div class="rs-header-search-wrapper">
                        <div class="rs-header-search-icon has-theme-light-blue">
                            <i class="ri-close-fill has-close"></i>
                            <i class="ri-search-line has-search"></i>
                        </div>
                        <form class="rs-header-search-inner rs-stickys-form" action="#" method="GET">
                            <div class="rs-header-search">
                                <input type="text" placeholder="{{ __('Searching...') }}">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- search area end -->
                    <div class="rs-header-btn">
                        <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ asset('assets/pdf/teknokimya-urun-katalogu-2025.pdf') }}" target="_blank" rel="noopener noreferrer">
                            <i class="ri-file-pdf-line me-1" style="font-size: 16px;"></i>
                            <span>{{ __('Katalog') }}</span>
                            <span class="icon-box">
                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                                </svg>
                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="rs-header-hamburger has-theme-light-blue">
                        <div class="sidebar-toggle">
                            <a class="bar-icon" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path d="M8.55566 11H1.55566C1.29045 11 1.03609 11.1054 0.848557 11.2929C0.661021 11.4804 0.555664 11.7348 0.555664 12V19C0.555664 19.2652 0.661021 19.5196 0.848557 19.7071C1.03609 19.8946 1.29045 20 1.55566 20H8.55566C8.82088 20 9.07523 19.8946 9.26277 19.7071C9.45031 19.5196 9.55566 19.2652 9.55566 19V12C9.55566 11.7348 9.45031 11.4804 9.26277 11.2929C9.07523 11.1054 8.82088 11 8.55566 11ZM7.55566 18H2.55566V13H7.55566V18ZM19.5557 0H12.5557C12.2904 0 12.0361 0.105357 11.8486 0.292893C11.661 0.48043 11.5557 0.734784 11.5557 1V8C11.5557 8.26522 11.661 8.51957 11.8486 8.70711C12.0361 8.89464 12.2904 9 12.5557 9H19.5557C19.8209 9 20.0752 8.89464 20.2628 8.70711C20.4503 8.51957 20.5557 8.26522 20.5557 8V1C20.5557 0.734784 20.4503 0.48043 20.2628 0.292893C20.0752 0.105357 19.8209 0 19.5557 0ZM18.5557 7H13.5557V2H18.5557V7ZM19.5557 11H12.5557C12.2904 11 12.0361 11.1054 11.8486 11.2929C11.661 11.4804 11.5557 11.7348 11.5557 12V19C11.5557 19.2652 11.661 19.5196 11.8486 19.7071C12.0361 19.8946 12.2904 20 12.5557 20H19.5557C19.8209 20 20.0752 19.8946 20.2628 19.7071C20.4503 19.5196 20.5557 19.2652 20.5557 19V12C20.5557 11.7348 20.4503 11.4804 20.2628 11.2929C20.0752 11.1054 19.8209 11 19.5557 11ZM18.5557 18H13.5557V13H18.5557V18ZM8.55566 0H1.55566C1.29045 0 1.03609 0.105357 0.848557 0.292893C0.661021 0.48043 0.555664 0.734784 0.555664 1V8C0.555664 8.26522 0.661021 8.51957 0.848557 8.70711C1.03609 8.89464 1.29045 9 1.55566 9H8.55566C8.82088 9 9.07523 8.89464 9.26277 8.70711C9.45031 8.51957 9.55566 8.26522 9.55566 8V1C9.55566 0.734784 9.45031 0.48043 9.26277 0.292893C9.07523 0.105357 8.82088 0 8.55566 0ZM7.55566 7H2.55566V2H7.55566V7Z" fill="#616161"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs-header-area rs-header-four has-theme-light-blue">
        <div class="container-fluid">
            <div class="rs-header-inner">
                <div class="rs-header-left">
                    <div class="rs-header-logo-wrapper">
                        <div class="rs-header-logo">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo-light-blue.png') }}" alt="logo"></a>
                        </div>
                    </div>
                </div>
                <div class="rs-header-menu">
                    <div class="rs-theme-social has-transparent has-theme-blue">
                        <a href="{{ $settings['social_twitter'] ?? '#' }}"><i class="ri-twitter-x-line"></i></a>
                        <a href="{{ $settings['social_facebook'] ?? '#' }}"><i class="ri-facebook-fill"></i></a>
                        <a href="{{ $settings['social_linkedin'] ?? '#' }}"><i class="ri-linkedin-fill"></i></a>
                        <a href="{{ $settings['social_instagram'] ?? '#' }}"><i class="ri-instagram-line"></i></a>
                    </div>
                    <nav id="mobile-menu-two" class="main-menu">
                        <ul class="multipage-menu">
                            @forelse($menuItems ?? [] as $item)
                                <li>
                                    <a href="{{ $item->localizedUrl() }}" target="{{ $item->target }}">{{ $item->t('title') }}</a>
                                </li>
                            @empty
                                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('about') }}">{{ __('About') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::sectionUrl('services') }}">{{ __('Services') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::sectionUrl('products') }}">{{ __('Products') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('blog') }}">{{ __('Blog') }}</a></li>
                                <li><a href="{{ \App\Support\LocalizedRoute::page('contact') }}">{{ __('Contact') }}</a></li>
                            @endforelse
                        </ul>
                    </nav>
                </div>
                <div class="rs-header-right">
                    <!-- Language Switcher Dropdown -->
                    @include('partials.language-dropdown')

                    <!-- search area start -->
                    <div class="rs-header-search-wrapper">
                        <div class="rs-header-search-icon has-theme-light-blue">
                            <i class="ri-close-fill has-close"></i>
                            <i class="ri-search-line has-search"></i>
                        </div>
                        <form class="rs-header-search-inner rs-stickys-form" action="#" method="GET">
                            <div class="rs-header-search">
                                <input type="text" placeholder="{{ __('Searching...') }}">
                                <button type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>
                    <!-- search area end -->
                    <div class="rs-header-btn">
                        <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ asset('assets/pdf/teknokimya-urun-katalogu-2025.pdf') }}" target="_blank" rel="noopener noreferrer">
                            <i class="ri-file-pdf-line me-1" style="font-size: 16px;"></i>
                            <span>{{ __('Katalog') }}</span>
                            <span class="icon-box">
                                <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                                </svg>
                                <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                    <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                                </svg>
                            </span>
                        </a>
                    </div>
                    <div class="rs-header-hamburger has-theme-light-blue">
                        <div class="sidebar-toggle">
                            <a class="bar-icon" href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                                    <path d="M8.55566 11H1.55566C1.29045 11 1.03609 11.1054 0.848557 11.2929C0.661021 11.4804 0.555664 11.7348 0.555664 12V19C0.555664 19.2652 0.661021 19.5196 0.848557 19.7071C1.03609 19.8946 1.29045 20 1.55566 20H8.55566C8.82088 20 9.07523 19.8946 9.26277 19.7071C9.45031 19.5196 9.55566 19.2652 9.55566 19V12C9.55566 11.7348 9.45031 11.4804 9.26277 11.2929C9.07523 11.1054 8.82088 11 8.55566 11ZM7.55566 18H2.55566V13H7.55566V18ZM19.5557 0H12.5557C12.2904 0 12.0361 0.105357 11.8486 0.292893C11.661 0.48043 11.5557 0.734784 11.5557 1V8C11.5557 8.26522 11.661 8.51957 11.8486 8.70711C12.0361 8.89464 12.2904 9 12.5557 9H19.5557C19.8209 9 20.0752 8.89464 20.2628 8.70711C20.4503 8.51957 20.5557 8.26522 20.5557 8V1C20.5557 0.734784 20.4503 0.48043 20.2628 0.292893C20.0752 0.105357 19.8209 0 19.5557 0ZM18.5557 7H13.5557V2H18.5557V7ZM19.5557 11H12.5557C12.2904 11 12.0361 11.1054 11.8486 11.2929C11.661 11.4804 11.5557 11.7348 11.5557 12V19C11.5557 19.2652 11.661 19.5196 11.8486 19.7071C12.0361 19.8946 12.2904 20 12.5557 20H19.5557C19.8209 20 20.0752 19.8946 20.2628 19.7071C20.4503 19.5196 20.5557 19.2652 20.5557 19V12C20.5557 11.7348 20.4503 11.4804 20.2628 11.2929C20.0752 11.1054 19.8209 11 19.5557 11ZM18.5557 18H13.5557V13H18.5557V18ZM8.55566 0H1.55566C1.29045 0 1.03609 0.105357 0.848557 0.292893C0.661021 0.48043 0.555664 0.734784 0.555664 1V8C0.555664 8.26522 0.661021 8.51957 0.848557 8.70711C1.03609 8.89464 1.29045 9 1.55566 9H8.55566C8.82088 9 9.07523 8.89464 9.26277 8.70711C9.45031 8.51957 9.55566 8.26522 9.55566 8V1C9.55566 0.734784 9.45031 0.48043 9.26277 0.292893C9.07523 0.105357 8.82088 0 8.55566 0ZM7.55566 7H2.55566V2H7.55566V7Z" fill="#616161"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->
