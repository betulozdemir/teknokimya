@extends('layouts.app')

@section('title', ($settings['about_subtitle'] ?? __('About')) . ' || ' . ($settings['site_title'] ?? 'Teknokimya'))

@section('content')
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
        <div class="rs-breadcrumb-bg" data-background="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8">
                    <div class="rs-breadcrumb-content-wrapper">
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">{{ $settings['about_subtitle'] ?? __('About') }}</h1>
                        </div>
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ route('home') }}">{{ __('Home') }}</a></span></li>
                                    <li><span>{{ $settings['about_subtitle'] ?? __('About') }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- about area start -->
    <section class="rs-about-area section-space rs-about-thirteen">
        <div class="container">
            <div class="row align-items-xxl-center g-5">
                <div class="col-xl-6 col-lg-5">
                    <div class="rs-about-thumb-wrapper">
                        <div class="rs-about-thumb has-large rs-image scroll_reveal reveal_left reveal-active">
                            <img decoding="async" src="{{ asset($settings['about_image_large'] ?? 'assets/images/about/about-thumb-20.png') }}" alt="{{ $settings['about_subtitle'] ?? __('About') }}">
                        </div>
                        <div class="rs-about-thumb has-small rs-image scroll_reveal reveal_right reveal-active">
                            <img decoding="async" src="{{ asset($settings['about_image_small'] ?? 'assets/images/about/about-thumb-21.png') }}" alt="{{ $settings['about_subtitle'] ?? __('About') }}">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="rs-about-wrapper">
                        <div class="rs-about-content-wrapper">
                            <div class="rs-section-title-wrapper">
                                <span class="rs-section-subtitle has-theme-orange justify-content-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15" fill="none">
                                        <path d="M3.14286 10L0 15L8.78104e-07 0L3.14286 5V10Z" fill="#002D72"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6.28571 10L3.14286 15L3.14286 10L4.71428 7.5L3.14286 5L3.14286 0L6.28571 5L6.28571 10ZM6.28571 10L7.85714 7.5L6.28571 5V0L11 7.5L6.28571 15V10Z" fill="#002D72"></path>
                                    </svg>
                                    {{ $settings['about_subtitle'] ?? __('About') }}
                                </span>
                                <h2 class="rs-section-title rs-split-text-enable split-in-fade">
                                    {{ $settings['about_title'] ?? 'We work for you since 1989. Industrial around the world' }}
                                </h2>
                                <p class="descrip">
                                    {{ $settings['about_description'] ?? __('We solve worldwide industrial every problem, the heart of global landscape the industry stands multidimensional electronic typesetting.') }}
                                </p>
                            </div>
                            <div class="rs-about-tab">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-item-one-tab" data-bs-toggle="pill" data-bs-target="#pills-item-one" type="button" role="tab" aria-controls="pills-item-one" aria-selected="true">
                                            {{ $settings['about_tab_1_title'] ?? __('Our History') }}
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-item-two-tab" data-bs-toggle="pill" data-bs-target="#pills-item-two" type="button" role="tab" aria-controls="pills-item-two" aria-selected="false">
                                            {{ $settings['about_tab_2_title'] ?? __('Our Mission') }}
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-item-three-tab" data-bs-toggle="pill" data-bs-target="#pills-item-three" type="button" role="tab" aria-controls="pills-item-three" aria-selected="false">
                                            {{ $settings['about_tab_3_title'] ?? __('Our Vision') }}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="rs-aobut-tab-content-wrapper">
                                <div class="tab-content rs-about-tab-anim" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-item-one" role="tabpanel" aria-labelledby="pills-item-one-tab" tabindex="0">
                                        <div class="rs-about-tab-content">
                                            <p>{{ $settings['about_history'] ?? 'Welcome to Teknokimya, a leading industry innovator with a rich history of excellence with a passion for precision we have been empowering industries and driving progress.' }}</p>
                                            <div class="rs-about-feature-list">
                                                <div class="rs-list-item has-theme-orange">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_1'] ?? __('Quality Control System') }}
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_2'] ?? __('Building Quality Industrial') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-item-two" role="tabpanel" aria-labelledby="pills-item-two-tab" tabindex="0">
                                        <div class="rs-about-tab-content">
                                            <p>{{ $settings['about_mission'] ?? 'Our mission is to deliver reliable, sustainable, and high-purity chemical and laboratory solutions that elevate industrial standards.' }}</p>
                                            <div class="rs-about-feature-list">
                                                <div class="rs-list-item has-theme-orange">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_1'] ?? __('Quality Control System') }}
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_2'] ?? __('Building Quality Industrial') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-item-three" role="tabpanel" aria-labelledby="pills-item-three-tab" tabindex="0">
                                        <div class="rs-about-tab-content">
                                            <p>{{ $settings['about_vision'] ?? 'Our vision is to become the most trusted global partner in chemical innovation and laboratory technology.' }}</p>
                                            <div class="rs-about-feature-list">
                                                <div class="rs-list-item has-theme-orange">
                                                    <ul>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_1'] ?? __('Quality Control System') }}
                                                        </li>
                                                        <li>
                                                            <i class="fa-regular fa-check"></i>
                                                            {{ $settings['about_check_2'] ?? __('Building Quality Industrial') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rs-about-author-info">
                                <div class="rs-about-btn">
                                    <a class="rs-btn has-theme-orange has-icon has-bg" href="{{ \App\Support\LocalizedRoute::localizeUrl($settings['about_button_url'] ?? '/iletisim') }}">
                                        {{ $settings['about_button_text'] ?? __('Get In Touch') }}
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about area end -->
@endsection
