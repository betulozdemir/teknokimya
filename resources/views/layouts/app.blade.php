<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="template-version" content="1.0.8">
    <title>@yield('title', 'Tekno Kimya Galvano Kimyasalları')</title>
    <meta name="description" content="@yield('meta_description', 'Teknokimya laboratuvar ve endüstriyel kimya çözümleri')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon-light-blue.png') }}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/fontawesome-pro.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <style>
        :root {
            --rs-theme-blue: #002D72;
            --rs-theme-light-blue: #002D72;
            --rs-theme-orange: #002D72;
        }
        .rs-contact-eight .pre-circle-ripple::after {
            border-color: #002D72;
        }
        .rs-contact-ten .rs-contact-btn .rs-btn:hover {
            background: #001f4f;
            color: #ffffff;
        }
        .rs-header-four {
            background-color: #ffffff;
        }
        .rs-header-four .container-fluid {
            padding-inline: clamp(12px, 2vw, 30px) !important;
            max-width: 100% !important;
        }
        .rs-header-four .rs-header-inner {
            justify-content: space-between !important;
            width: 100% !important;
            max-width: 100% !important;
            padding-inline: 0 !important;
            gap: 15px !important;
        }
        .rs-header-four .rs-header-right {
            display: flex !important;
            align-items: center !important;
            gap: clamp(10px, 1.2vw, 20px) !important;
            padding: 12px clamp(12px, 1.5vw, 24px) !important;
            flex-shrink: 0 !important;
        }
        .rs-header-four .rs-header-hamburger {
            flex-shrink: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 44px !important;
            height: 44px !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .rs-header-four .sidebar-toggle,
        .rs-header-four .bar-icon {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            width: 44px !important;
            height: 44px !important;
            border-radius: 8px !important;
            transition: all 0.25s ease !important;
        }
        .rs-header-four .bar-icon:hover {
            background-color: rgba(0, 45, 114, 0.06) !important;
        }
        .rs-header-four .bar-icon svg {
            display: block !important;
            width: 22px !important;
            height: 22px !important;
            overflow: visible !important;
        }
        @media only screen and (max-width: 1600px) {
            .rs-header-four .main-menu li a {
                padding: 30px 12px !important;
                font-size: 14.5px !important;
            }
            .rs-header-four .rs-header-menu {
                padding: 0 15px !important;
            }
            .rs-header-four .main-menu {
                margin-inline-start: 15px !important;
                padding-inline-start: 15px !important;
            }
        }
        @media only screen and (max-width: 1366px) {
            .rs-header-four .main-menu li a {
                padding: 26px 8px !important;
                font-size: 13.5px !important;
            }
            .rs-header-four .rs-header-left .rs-theme-social {
                padding-inline-start: 20px !important;
                gap: 8px !important;
            }
        }
        .rs-header-top.rs-header-top-two {
            background-color: #ffffff !important;
            border-bottom: 1px solid rgba(0, 45, 114, 0.08) !important;
        }
        .rs-header-four .rs-header-logo-wrapper,
        .rs-header-four .rs-header-menu,
        .rs-header-four .rs-header-right,
        .rs-header-four .rs-header-logo .rs-header-logo-bg {
            background-color: #ffffff !important;
        }
        .rs-header-logo img {
            max-height: 76px;
            width: auto;
            object-fit: contain;
        }
        .main-menu ul li a {
            white-space: nowrap;
        }
        .offcanvas-logo img {
            max-height: 64px;
            width: auto;
            object-fit: contain;
        }
        .rs-footer-widget-logo img {
            max-height: 90px;
            width: auto;
            object-fit: contain;
        }
        .rs-banner-six .rs-banner-bg-thumb::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(7, 24, 46, 0.88) 0%, rgba(7, 24, 46, 0.72) 42%, rgba(7, 24, 46, 0.28) 78%, rgba(7, 24, 46, 0.12) 100%);
            z-index: 1;
            pointer-events: none;
        }
        [dir="rtl"] .rs-banner-six .rs-banner-bg-thumb::before {
            background: linear-gradient(-90deg, rgba(7, 24, 46, 0.88) 0%, rgba(7, 24, 46, 0.72) 42%, rgba(7, 24, 46, 0.28) 78%, rgba(7, 24, 46, 0.12) 100%);
        }
        .rs-banner-six .rs-banner-title {
            font-size: clamp(42px, 5.8vw, 92px);
            line-height: 1.18;
        }
        .rs-banner-six .rs-banner-stroke-text {
            white-space: nowrap;
            display: inline-block;
            font-size: clamp(32px, 4.8vw, 76px);
            padding-inline-start: 85px;
        }
        .rs-banner-six .rs-banner-shape {
            bottom: 22px;
        }
        @media only screen and (max-width: 767px) {
            .rs-banner-six .rs-banner-stroke-text {
                white-space: normal;
                padding-inline-start: 0;
            }
        }
        /* Breadcrumb Overlay Styling */
        .rs-breadcrumb-one .rs-breadcrumb-bg::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(7, 24, 46, 0.65) 0%, rgba(7, 24, 46, 0.82) 100%);
            z-index: 1;
        }
        .rs-breadcrumb-one .rs-breadcrumb-content-wrapper {
            position: relative;
            z-index: 2;
        }
        /* Theme Language Dropdown (Sharp Industrial Theme Style) */
        .tk-lang-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
        }
        .tk-lang-toggle {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1px solid #002D72;
            border-radius: 0 !important;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 700;
            color: #002D72;
            cursor: pointer;
            line-height: 1;
            transition: all 0.25s ease;
            box-shadow: none;
            font-family: inherit;
        }
        .tk-lang-toggle:hover,
        .tk-lang-dropdown:hover .tk-lang-toggle,
        .tk-lang-dropdown.is-open .tk-lang-toggle {
            background: #002D72;
            border-color: #002D72;
            color: #ffffff;
        }
        .tk-lang-flag {
            font-size: 14px;
            line-height: 1;
        }
        .tk-lang-current {
            letter-spacing: 0.5px;
        }
        .tk-arrow-icon {
            font-size: 14px;
            transition: transform 0.25s ease, color 0.25s ease;
            color: #002D72;
        }
        .tk-lang-toggle:hover .tk-arrow-icon,
        .tk-lang-dropdown:hover .tk-arrow-icon,
        .tk-lang-dropdown.is-open .tk-arrow-icon {
            transform: rotate(180deg);
            color: #ffffff;
        }

        /* Dropdown Menu */
        .tk-lang-menu {
            position: absolute;
            top: calc(100% + 4px);
            right: 0;
            min-width: 180px;
            background: #ffffff;
            border: 1px solid rgba(0, 45, 114, 0.2);
            border-top: 2px solid #002D72;
            border-radius: 0 !important;
            padding: 0;
            margin: 0;
            list-style: none;
            box-shadow: 0 10px 25px rgba(0, 45, 114, 0.12);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transform: translateY(6px);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        [dir="rtl"] .tk-lang-menu {
            right: auto;
            left: 0;
        }
        .tk-lang-dropdown:hover .tk-lang-menu,
        .tk-lang-dropdown.is-open .tk-lang-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .tk-lang-menu li {
            list-style: none;
            padding: 0;
            border-bottom: 1px solid #f1f5f9;
        }
        .tk-lang-menu li:last-child {
            border-bottom: none;
        }
        .tk-lang-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            border-radius: 0 !important;
            font-size: 13.5px;
            font-weight: 500;
            color: #334155;
            text-decoration: none;
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }
        [dir="rtl"] .tk-lang-item {
            border-left: none;
            border-right: 3px solid transparent;
        }
        .tk-lang-item:hover {
            background: #f8fafc;
            color: #002D72;
            border-left-color: #002D72;
        }
        [dir="rtl"] .tk-lang-item:hover {
            border-left-color: transparent;
            border-right-color: #002D72;
        }
        .tk-lang-item.active {
            background: #f1f5f9;
            color: #002D72;
            font-weight: 700;
            border-left-color: #002D72;
        }
        [dir="rtl"] .tk-lang-item.active {
            border-left-color: transparent;
            border-right-color: #002D72;
        }
        .tk-flag-emoji {
            font-size: 15px;
            line-height: 1;
        }
        .tk-lang-name {
            font-size: 13.5px;
        }
        .tk-lang-code-badge {
            font-size: 11px;
            font-weight: 700;
            color: #64748b;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 2px 6px;
            border-radius: 0 !important;
            letter-spacing: 0.3px;
        }
        .tk-lang-item.active .tk-lang-code-badge {
            color: #ffffff;
            background: #002D72;
            border-color: #002D72;
        }
        .tk-check-icon {
            font-size: 16px;
            color: #002D72;
            font-weight: bold;
        }
    </style>
    @stack('styles')
</head>

<body class="rs-smoother-yes">

    <!-- preloader start -->
    <div id="pre-load">
        <div id="loader" class="loader">
            <div class="loader-container has-theme-light-blue">
                <div class="loader-icon"><img src="{{ asset('assets/images/favicon-light-blue.png') }}" alt=""></div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- cursor start -->
    <div id="rs-mouse">
        <div id="cursor-ball"></div>
    </div>
    <!-- cursor end -->

    @include('partials.header')

    @include('partials.offcanvas')

    <!-- Body main wrapper start -->
    <main>
        @yield('content')
    </main>
    <!-- Body main wrapper end -->

    @include('partials.footer')

    <!-- Backtotop start -->
    <div class="backtotop-wrap cursor-pointer has-theme-light-blue">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Backtotop end -->

    <!-- JS here -->
    <script src="{{ asset('assets/js/vendor/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/meanmenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/easypie.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/headding-title.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/lenis.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/gsap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/rs-anim-int.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/rs-scroll-trigger.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/rs-splitText.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.lettering.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/parallax-effect.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/chart.umd.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        // Language Dropdown Click / Touch handler
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.tk-lang-dropdown').forEach(function (dropdown) {
                const toggle = dropdown.querySelector('.tk-lang-toggle');
                if (toggle) {
                    toggle.addEventListener('click', function (e) {
                        e.stopPropagation();
                        // Close other dropdowns
                        document.querySelectorAll('.tk-lang-dropdown').forEach(function (other) {
                            if (other !== dropdown) other.classList.remove('is-open');
                        });
                        dropdown.classList.toggle('is-open');
                    });
                }
            });

            // Close on click outside
            document.addEventListener('click', function () {
                document.querySelectorAll('.tk-lang-dropdown').forEach(function (dropdown) {
                    dropdown.classList.remove('is-open');
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>

