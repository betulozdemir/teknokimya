<!-- Offcanvas area start -->
@php
    $currentLocale = app()->getLocale();
@endphp
<div class="fix">
    <div class="offcanvas-area has-theme-light-blue" data-lenis-prevent>
        <div class="offcanvas-wrapper">
            <div class="offcanvas-content">
                <div class="offcanvas-top d-flex justify-content-between align-items-center mb-25">
                    <div class="offcanvas-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo/logo-light-blue.png') }}" alt="logo"></a>
                    </div>
                    <div class="offcanvas-close">
                        <button class="offcanvas-close-icon animation--flip">
                            <span class="offcanvas-m-lines">
                                <span class="offcanvas-m-line line--1"></span><span class="offcanvas-m-line line--2"></span><span class="offcanvas-m-line line--3"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="mb-20 d-flex justify-content-between align-items-center">
                    @include('partials.language-dropdown')
                    <a href="{{ asset('assets/pdf/teknokimya-urun-katalogu-2025.pdf') }}" target="_blank" rel="noopener noreferrer" class="rs-btn py-2 px-3" style="font-size: 13px; height: 36px;">
                        <i class="ri-file-pdf-line me-1"></i> {{ __('Katalog') }}
                    </a>
                </div>
                <div class="offcanvas-about mb-30 d-none d-sm-block">
                    <p>{{ $settings['footer_description'] ?? 'Teknokimya endüstriyel kimya ve laboratuvar çözümlerinde yüksek kalite standartlarıyla hizmet vermektedir.' }}</p>
                </div>
                <div class="mobile-menu">
                    <div class="rs-offcanvas-menu mb-25">
                        <nav></nav>
                    </div>
                </div>
                <div class="offcanvas-contact mb-30">
                    <h4 class="offcanvas-title-meta">{{ __('Contact') }}</h4>
                    <ul>
                        <li class="d-flex align-items-center gap-15">
                            <div class="offcanvas-contact-text">
                                <a href="#">{{ $settings['contact_address'] ?? 'Organize Sanayi Bölgesi, Kimya Cad. No:42, İstanbul' }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-15">
                            <div class="offcanvas-contact-text">
                                <a href="tel:{{ $settings['contact_phone'] ?? '+902125550102' }}">{{ $settings['contact_phone'] ?? '+90 (212) 555 01 02' }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center gap-15">
                            <div class="offcanvas-contact-text">
                                <a href="mailto:{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}">{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas-overlay"></div>
<div class="offcanvas-overlay-white"></div>
<!-- Offcanvas area end -->
