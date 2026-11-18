<!-- banner area start -->
<section class="rs-banner-area rs-banner-six p-relative rs-swiper">
    <div class="rs-banner-slider-wrapper">
        <div class="swiper" data-clone-slides="false" data-loop="true" data-speed="2000" data-autoplay="true"
            data-dots-dynamic="false" data-hover-pause="true" data-effect="fade" data-delay="1000" data-item="1"
            data-item-xl="1" data-item-lg="1" data-item-md="1" data-item-sm="1" data-item-xs="1"
            data-item-mobile="1" data-margin="30" data-margin-xl="30" data-margin-lg="30" data-margin-md="30"
            data-margin-sm="30" data-margin-xs="30" data-margin-mobile="30" data-auto-height="true"
            data-observer="true" data-observe-parents="true">
            <div class="swiper-wrapper">
                @forelse($sliders ?? [] as $slider)
                    <div class="swiper-slide">
                        <div class="rs-banner-item-wrapper">
                            <div class="rs-banner-bg-thumb" data-background="{{ asset($slider->background_image) }}">
                            </div>
                            <div class="container-fluid">
                                <div class="row g-5">
                                    <div class="col-xl-10 col-lg-10">
                                        <div class="rs-banner-item">
                                            <div class="rs-banner-content">
                                                @if($slider->t('subtitle'))
                                                    <span class="rs-banner-subtitle">
                                                        <img src="{{ asset('assets/images/shape/border-line.png') }}" alt="image">
                                                        {{ $slider->t('subtitle') }}
                                                    </span>
                                                @endif
                                                <h1 class="rs-banner-title">{{ $slider->t('title') }} <br>
                                                    <img class="rs-banner-shape"
                                                        src="{{ asset('assets/images/shape/arrow-shape.png') }}" alt="image">
                                                    @if($slider->t('highlight_text'))
                                                        <span class="rs-banner-stroke-text">{{ $slider->t('highlight_text') }}</span>
                                                    @endif
                                                </h1>
                                                <div class="rs-banner-info">
                                                    @if($slider->button_url)
                                                        <div class="rs-banner-btn">
                                                            <div class="rs-rotate-btn">
                                                                <a href="{{ \App\Support\LocalizedRoute::localizeUrl($slider->button_url) }}"
                                                                    class="rs-play-btn {{ str_contains($slider->button_url, 'youtube') ? 'popup-video' : '' }} has-transparent-btn"><i
                                                                        class="fa-light fa-arrow-right-long"></i></a>
                                                                <div class="rs-circle-title gsap-rotate rs-text-circle-wrapper">
                                                                    <div class="rs-text-circle" data-rotate-degree="13.33">
                                                                        {{ $slider->t('button_text') ?: 'Keşfedin - Keşfedin -' }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    @if($slider->t('description'))
                                                        <div class="rs-banner-descrip">
                                                            <p>{{ $slider->t('description') }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide">
                        <div class="rs-banner-item-wrapper">
                            <div class="rs-banner-bg-thumb" data-background="{{ asset('assets/images/bg/banner-bg-09.png') }}"></div>
                            <div class="container-fluid">
                                <div class="row g-5">
                                    <div class="col-xl-10 col-lg-10">
                                        <div class="rs-banner-item">
                                            <div class="rs-banner-content">
                                                <span class="rs-banner-subtitle">
                                                    <img src="{{ asset('assets/images/shape/border-line.png') }}" alt="image">
                                                    Teknokimya Endüstriyel Çözümler
                                                </span>
                                                <h1 class="rs-banner-title">Tekno Kimya <br>
                                                    <img class="rs-banner-shape" src="{{ asset('assets/images/shape/arrow-shape.png') }}" alt="image">
                                                    <span class="rs-banner-stroke-text">Kaplama Kimyasalları</span>
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <!-- If we need navigation buttons -->
            <div class="rs-banner-navigation">
                <button class="swiper-button-prev rs-swiper-btn has-theme-light-blue"><i
                        class="fa-regular fa-arrow-left"></i></button>
                <button class="swiper-button-next rs-swiper-btn has-theme-light-blue"><i
                        class="fa-regular fa-arrow-right"></i></button>
            </div>
            <!-- if we need pagination -->
            <div class="rs-banner-pagination d-block d-sm-none">
                <div class="swiper-pagination rs-pagination"></div>
            </div>
        </div>
    </div>
</section>
<!-- banner area end -->
