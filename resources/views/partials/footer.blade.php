<!-- footer area start -->
<footer id="contact">
    <div class="rs-footer-area rs-footer-two has-theme-light-blue position-relative overflow-hidden">
        <div class="rs-footer-stars-watermark" aria-hidden="true"></div>
        <div class="container position-relative" style="z-index: 2;">
            <div class="rs-footer-top">
                <div class="row g-5">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="rs-footer-widget footer-2-col-1">
                            <div class="rs-footer-widget-logo mb-25">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="Teknokimya" style="max-height: 82px; width: auto;"></a>
                            </div>
                            <div class="rs-footer-widget-content">
                                <p class="rs-footer-widget-description">
                                    {{ $settings['footer_description'] ?? 'Teknokimya endüstriyel kimya ve laboratuvar çözümlerinde yüksek kalite standartlarıyla hizmet vermektedir.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="rs-footer-widget footer-2-col-2">
                            <h5 class="rs-footer-widget-title">{{ __('Useful Links') }}</h5>
                            <div class="rs-footer-widget-content">
                                <div class="rs-footer-widget-links has-theme-light-blue">
                                    <ul>
                                        @forelse($menuItems ?? [] as $item)
                                            <li>
                                                <a href="{{ $item->localizedUrl() }}" target="{{ $item->target }}">{{ $item->t('title') }}</a>
                                            </li>
                                        @empty
                                            <li><a href="{{ \App\Support\LocalizedRoute::page('about') }}">{{ __('About') }}</a></li>
                                            <li><a href="{{ \App\Support\LocalizedRoute::page('services') }}">{{ __('Services') }}</a></li>
                                            <li><a href="{{ \App\Support\LocalizedRoute::page('products') }}">{{ __('Products') }}</a></li>
                                            <li><a href="{{ \App\Support\LocalizedRoute::page('blog') }}">{{ __('Blog') }}</a></li>
                                            <li><a href="{{ \App\Support\LocalizedRoute::page('contact') }}">{{ __('Contact') }}</a></li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="rs-footer-widget footer-2-col-3">
                            <h5 class="rs-footer-widget-title">{{ __('Office Address') }}</h5>
                            <div class="rs-footer-widget-content">
                                <div class="rs-footer-widget-meta">
                                    <div class="rs-footer-widget-address mb-20">
                                        <a target="_blank" href="https://www.google.com/maps">{{ $settings['contact_address'] ?? 'İOSB Cila ve Nikelajcılar Sanayi Sitesi A-Blok No:19/1-2 Başakşehir, İstanbul' }}</a>
                                    </div>
                                    <h5 class="rs-footer-widget-title mb-10">{{ __('Email Address') }}</h5>
                                    <p class="mb-5 text-muted small">{{ __('Bizimle çalışmak ister misiniz?') }}</p>
                                    <div class="rs-footer-widget-email">
                                        <a href="mailto:{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}">{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="rs-footer-widget footer-2-col-4">
                            <h5 class="rs-footer-widget-title">{{ __('Phone Number') }}</h5>
                            <div class="rs-footer-widget-content">
                                <div class="rs-footer-widget-contact-info mb-20">
                                    <div class="rs-footer-widget-number">
                                        <span>
                                            <a href="tel:{{ preg_replace('/[^\d+]/', '', $settings['contact_phone'] ?? '02126191907') }}">{{ $settings['contact_phone'] ?? '+90 (212) 619 19 07' }}</a>
                                        </span>
                                    </div>
                                </div>
                                <h5 class="rs-footer-widget-title mb-15">{{ __('Follow Us') }}</h5>
                                <div class="rs-footer-widget-social">
                                    <div class="rs-theme-social has-theme-light-blue d-flex gap-2">
                                        <a href="{{ $settings['social_twitter'] ?? '#' }}"><i class="ri-twitter-x-line"></i></a>
                                        <a href="{{ $settings['social_facebook'] ?? '#' }}"><i class="ri-facebook-fill"></i></a>
                                        <a href="{{ $settings['social_linkedin'] ?? '#' }}"><i class="ri-linkedin-fill"></i></a>
                                        <a href="{{ $settings['social_instagram'] ?? '#' }}"><i class="ri-instagram-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs-footer-copyright-area rs-copyright-one position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="rs-footer-copyright text-center py-2">
                        <p class="mb-0" style="color: #ffffff; font-size: 15px; font-weight: 500;">© <span id="year">{{ date('Y') }}</span> {{ app()->getLocale() === 'ar' ? 'تكنوكيميا' : 'Teknokimya' }}. {{ __('All Rights Reserved.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .rs-footer-two {
        position: relative;
        overflow: hidden;
        background-color: #0b1e33 !important; /* Deep navy industrial background */
        color: #cbd5e1 !important;
    }
    .rs-footer-two .rs-footer-top {
        padding: 70px 0 60px;
    }
    .rs-footer-two .rs-footer-widget-title {
        color: #ffffff !important;
        font-weight: 700;
        margin-bottom: 20px;
        position: relative;
    }
    .rs-footer-two .rs-footer-widget-description {
        color: #94a3b8 !important;
        line-height: 1.7;
        font-size: 14.5px;
    }
    .rs-footer-two .rs-footer-widget-links ul li {
        list-style: none;
        margin-bottom: 10px;
    }
    .rs-footer-two .rs-footer-widget-links ul li a {
        color: #cbd5e1 !important;
        font-size: 14.5px;
        transition: all 0.25s ease;
        text-decoration: none;
        display: inline-block;
    }
    .rs-footer-two .rs-footer-widget-links ul li a:hover {
        color: var(--rs-theme-orange, #ea5501) !important;
        transform: translateX(4px);
    }
    .rs-footer-two .rs-footer-widget-address a {
        color: #cbd5e1 !important;
        line-height: 1.6;
        font-size: 14.5px;
        text-decoration: none;
        display: inline-block;
    }
    .rs-footer-two .rs-footer-widget-address a:hover {
        color: var(--rs-theme-orange, #ea5501) !important;
    }
    .rs-footer-two .rs-footer-widget-meta p {
        color: #94a3b8 !important;
    }
    .rs-footer-two .rs-footer-widget-email a {
        color: #cbd5e1 !important;
        text-decoration: none;
        font-size: 14.5px;
        transition: color 0.2s ease;
    }
    .rs-footer-two .rs-footer-widget-email a:hover {
        color: var(--rs-theme-orange, #ea5501) !important;
    }
    .rs-footer-two .rs-footer-widget-number span a {
        color: #ffffff !important;
        font-weight: 700;
        font-size: 18px;
        text-decoration: none;
    }
    .rs-footer-two .rs-theme-social a {
        width: 38px;
        height: 38px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #ffffff !important;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
        font-size: 15px;
    }
    .rs-footer-two .rs-theme-social a:hover {
        background: var(--rs-theme-orange, #ea5501) !important;
        border-color: var(--rs-theme-orange, #ea5501) !important;
        color: #ffffff !important;
        transform: translateY(-3px);
    }
    .rs-footer-copyright-area.rs-copyright-one {
        background-color: #071524 !important;
        background-image: none !important;
        border-top: 1px solid rgba(255, 255, 255, 0.08) !important;
        padding: 16px 0;
    }
    .rs-copyright-bg-thumb {
        display: none !important;
    }
    .rs-footer-stars-watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 680px;
        max-width: 90%;
        height: 220px;
        background-image: url('{{ asset('assets/images/shape/footer-stars.png') }}');
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
        opacity: 0.07;
        pointer-events: none;
        z-index: 1;
    }
    @media (max-width: 767px) {
        .rs-footer-stars-watermark {
            width: 320px;
            height: 110px;
            opacity: 0.05;
        }
    }
</style>
<!-- footer area end -->
