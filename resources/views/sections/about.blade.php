<!-- about area start -->
<section id="{{ \App\Support\LocalizedRoute::sectionId('about') }}" class="rs-about-area rs-about-six">
    <div class="rs-about-shape-one">
        <img src="{{ asset('assets/images/shape/about-shape-01.png') }}" alt="image">
    </div>
    <div class="rs-about-shape-two">
        <img src="{{ asset('assets/images/shape/about-shape-02.png') }}" alt="image">
    </div>
    <div class="container has-large">
        <div class="row">
            <div class="col-xl-12">
                <h2 class="rs-about-title">{{ $settings['about_subtitle'] ?? 'About Teknokimya' }}</h2>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-xl-12">
                <div class="rs-about-wrapper">
                    <div class="rs-about-thumb rs-image scroll_reveal reveal_left reveal-active">
                        <img decoding="async" src="{{ asset($settings['about_home_image'] ?? 'assets/images/about/about-thumb-08.png') }}" alt="image">
                    </div>
                    <div class="rs-about-content-wrapper">
                        <div class="rs-section-title-wrapper">
                            <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                                {{ $settings['about_subtitle'] ?? 'About Teknokimya' }}
                            </span>
                            <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade mb-30">
                                {{ $settings['about_title'] ?? 'We design and build some of the most powerful facilities in the world.' }}
                            </h2>
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
                                        <p>{{ $settings['about_history'] ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-item-two" role="tabpanel" aria-labelledby="pills-item-two-tab" tabindex="0">
                                    <div class="rs-about-tab-content">
                                        <p>{{ $settings['about_mission'] ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-item-three" role="tabpanel" aria-labelledby="pills-item-three-tab" tabindex="0">
                                    <div class="rs-about-tab-content">
                                        <p>{{ $settings['about_vision'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rs-about-btn">
                            <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ \App\Support\LocalizedRoute::page('about') }}">{{ __('Know More') }}
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
</section>
<!-- about area end -->
