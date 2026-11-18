<!-- testimonial area start -->
<section class="rs-testimonial-area section-space-bottom rs-testimonial-four rs-swiper">
    <div class="container has-large">
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-section-subtitle-wrapper">
                    <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                        {{ __('Testimonials') }}
                    </span>
                    <div class="rs-section-border-line"></div>
                </div>
            </div>
        </div>
        <div class="row g-5 section-title-space align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="rs-section-title-wrapper">
                    <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade">{{ __('What client say about industrie') }}</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="rs-testimonial-btn">
                    <a class="rs-btn has-theme-light-blue has-icon has-bg" href="#contact">{{ __('View More Reviews') }}
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
        <div class="row">
            <div class="rs-testimonial-slider-wrapper">
                <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="1500"
                    data-autoplay="false" data-dots-dynamic="false" data-center-mode="true"
                    data-hover-pause="true" data-effect="false" data-delay="1500" data-item="3" data-item-xl="3"
                    data-item-lg="3" data-item-md="2" data-item-sm="1" data-item-xs="1" data-item-mobile="1"
                    data-margin="30" data-margin-xl="30" data-margin-lg="30" data-margin-md="30"
                    data-margin-sm="30" data-margin-xs="30" data-margin-mobile="30">
                    <div class="swiper-wrapper">
                        @foreach($testimonials ?? [] as $testimonial)
                            <div class="swiper-slide">
                                <div class="rs-testimonial-item">
                                    <div class="rs-testimonial-quote">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="39" viewBox="0 0 96 39" fill="none">
                                            <g opacity="0.06">
                                                <path d="M0 29.2815H21.4286L7.14275 0.190567H28.5713L42.8572 29.2815V72.918H0V29.2815Z" fill="#023B4A"></path>
                                                <path d="M52.8574 72.918V29.2815H74.286L60.0002 0.190567H81.4288L95.7146 29.2815V72.918H52.8574Z" fill="#023B4A"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="rs-testimonial-content">
                                        <div class="rs-testimonial-top">
                                            <div class="rs-testimonial-avater-wrapper">
                                                <div class="rs-testimonial-avater-thumb">
                                                    <img src="{{ asset($testimonial->avatar) }}" alt="{{ $testimonial->t('client_name') }}">
                                                </div>
                                                <div class="rs-testimonial-avater-info">
                                                    <h5 class="rs-testimonial-title">{{ $testimonial->t('title') }}</h5>
                                                    <div class="rs-testimonial-rating">
                                                        <div class="rs-rating">
                                                            @for($i = 0; $i < $testimonial->rating; $i++)
                                                                <span><i class="ri-star-fill"></i></span>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="rs-testimonial-description">
                                            <p>{{ $testimonial->t('comment') }}</p>
                                        </div>
                                        <div class="rs-testimonial-desig-info">
                                            <h6 class="rs-testimonial-avater-title">{{ $testimonial->t('client_name') }}</h6>
                                            <div class="rs-testimonial-separator">/</div>
                                            <span class="rs-testimonial-avater-designation">{{ $testimonial->t('client_designation') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-pagination rs-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial area end -->
