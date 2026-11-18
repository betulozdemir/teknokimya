@extends('layouts.app')

@section('title', $service->t('title') . ' || ' . ($settings['site_title'] ?? 'Teknokimya'))

@section('content')
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
        <div class="rs-breadcrumb-bg" data-background="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8">
                    <div class="rs-breadcrumb-content-wrapper">
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">{{ $service->t('title') }}</h1>
                        </div>
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('home') }}">{{ __('Home') }}</a></span></li>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('services') }}">{{ __('Services') }}</a></span></li>
                                    <li><span>{{ $service->t('title') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- services details area start -->
    <section class="rs-services-area section-space ">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-8 col-lg-8">
                    <div class="rs-services-details-wrapper">
                        <div class="rs-services-details-thumb">
                            <img src="{{ asset('assets/images/services/details/services-details-01.png') }}" alt="{{ $service->t('title') }}">
                        </div>
                        <h3 class="rs-services-details-title">{{ $service->t('title') }}</h3>
                        <p class="mb-25 mt-15"><strong>{{ $service->t('description') }}</strong></p>
                        <p>{{ $service->t('content') ?: __('Service detail main paragraph') }}</p>
                        <h3 class="rs-services-details-title">{{ __('Planning & Strategy') }}</h3>
                        <p class="mt-20 mb-20">{{ __('Service detail strategy intro') }}</p>
                        <div class="rs-services-details-feature-list">
                            <div class="rs-list-item has-theme-orange">
                                <ul>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('Prepare Documentation') }}
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('Brand Consistency') }}
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('Industry Standard Formulation') }}
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('Quality Control System') }}
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('Periodic Bath Analysis') }}
                                    </li>
                                    <li>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                                        </svg>
                                        {{ __('On-Site Technical Support') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="rs-services-details-video rs-video-one">
                            <div class="rs-video-bg-thumb" data-background="{{ asset('assets/images/bg/video-bg-06.png') }}"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-7 col-lg-8 col-md-10">
                                        <div class="rs-video-content text-center">
                                            <div class="rs-video-play-btn">
                                                <a href="https://www.youtube.com/watch?v=go7QYaQR494" class="rs-play-btn popup-video">
                                                    <i class="fa-duotone fa-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mb-20">{{ __('Service detail video paragraph') }}</p>
                        <h3 class="rs-services-details-title mb-15">{{ __('Planning & Strategy') }}</h3>
                        <p class="mb-55">{{ __('Service detail secondary strategy paragraph') }}</p>
                        <h3 class="rs-services-details-title mb-15">{{ __('Stats & Charts') }}</h3>
                        <div class="rs-services-details-chart-wrapper">
                            <p class="mb-0">{{ __('Service detail chart paragraph') }}</p>
                            <div class="rs-services-details-chart">
                                <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                        <div class="has-border-line"></div>
                        <h3 class="rs-services-details-title mb-20">{{ __('Questions? You’re covered') }}</h3>
                        <p>{{ __('Service detail faq intro') }}</p>
                        <div class="rs-services-details-faq">
                            <div class="rs-faq-content rs-accordion-one">
                                <div class="accordion-wrapper">
                                    <div class="accordion" id="accordionExampleOne">
                                        <div class="rs-accordion-item">
                                            <h4 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    01. {{ __('FAQ Question 1') }}
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h4>
                                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">
                                                    {{ __('FAQ Answer 1') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rs-accordion-item">
                                            <h6 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                    02. {{ __('FAQ Question 2') }}
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">
                                                    {{ __('FAQ Answer 2') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rs-accordion-item">
                                            <h6 class="accordion-header" id="headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                    03. {{ __('FAQ Question 3') }}
                                                    <span class="accordion-btn"></span>
                                                </button>
                                            </h6>
                                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExampleOne">
                                                <div class="accordion-body">
                                                    {{ __('FAQ Answer 3') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="rs-services-details-cta">
                            <div class="rs-services-details-cta-bg-thumb" data-background="{{ asset('assets/images/bg/cta-bg-08.png') }}"></div>
                            <div class="rs-services-details-cta-content">
                                <h3 class="rs-services-details-title mb-40">{{ __('We are always ready to help you and answer your questions') }}</h3>
                                <div class="rs-services-details-btn">
                                    <a class="rs-btn has-theme-orange has-icon has-bg" href="{{ \App\Support\LocalizedRoute::page('contact') }}">{{ __('Explore More') }}
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
                            </div>
                            <div class="rs-services-details-cta-thumb">
                                <img src="{{ asset('assets/images/services/details/services-details-02.png') }}" alt="image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="rs-sidebar-wrapper rs-sidebar-sticky">
                        <div class="sidebar-widget widget-categories-two has-content-none mb-30">
                            <h5 class="mb-25 sidebar-widget-title">{{ __('Our Services') }}</h5>
                            <ul>
                                @foreach($services as $item)
                                    <li>
                                        <a href="{{ $item->detailUrl() }}" class="{{ $item->id === $service->id ? 'active' : '' }}">
                                            {{ $item->t('title') }}
                                            <i class="ri-arrow-right-line"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar-widget widget-cta mb-30">
                            <div class="sidebar-widget-cta-thumb" data-background="{{ asset('assets/images/bg/cta-bg-09.png') }}"></div>
                            <div class="sidebar-widget-content">
                                <h3 class="sidebar-widget-title has-large has-border">{!! __('Have a <br> project in <br> mind?') !!}</h3>
                                <div class="sidebar-widget-btn">
                                    <a class="rs-btn has-theme-orange has-icon has-bg" href="{{ \App\Support\LocalizedRoute::page('contact') }}">{{ __('Let’s Talk') }}
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
                            </div>
                        </div>
                        <div class="sidebar-widget widget-download mb-30">
                            <h5 class="mb-25 sidebar-widget-title">{{ __('Download Brochures') }}</h5>
                            <ul>
                                <li>
                                    <a href="{{ \App\Support\LocalizedRoute::page('contact') }}">
                                        <div class="left">
                                            <span><img src="{{ asset('assets/images/icon/docs.svg') }}" alt="#"></span>
                                            {{ __('Technical Catalog 2025') }}
                                        </div>
                                        <span><img src="{{ asset('assets/images/icon/download-01.svg') }}" alt="#"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ \App\Support\LocalizedRoute::page('contact') }}">
                                        <div class="left">
                                            <span><img src="{{ asset('assets/images/icon/pdf.svg') }}" alt="#"></span>
                                            {{ __('Download PDF') }}
                                        </div>
                                        <span><img src="{{ asset('assets/images/icon/download-02.svg') }}" alt="#"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services details area end -->
@endsection

