<!-- products area start -->
@php
    $allProducts = ($products ?? collect());
    $productsPageUrl = \App\Support\LocalizedRoute::page('products');
    $catalogPdfUrl = asset('assets/pdf/teknokimya-urun-katalogu-2025.pdf');
@endphp
<section id="{{ \App\Support\LocalizedRoute::sectionId('products') }}" class="rs-portfolio-area section-space-bottom tk-products-section">
    <div class="container has-large">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-12">
                <div class="rs-section-subtitle-wrapper">
                    <span class="rs-section-subtitle has-theme-light-blue justify-content-start">
                        {{ __('OUR PRODUCTS') }}
                    </span>
                    <div class="rs-section-border-line"></div>
                </div>
            </div>
        </div>
        <div class="row g-4 section-title-space align-items-center">
            <div class="col-xl-7 col-lg-7">
                <div class="rs-section-title-wrapper">
                    <h2 class="rs-section-title has-theme-light-blue rs-split-text-enable split-in-fade">
                        {{ __('Industrial Surface Treatment & Plating Chemicals') }}
                    </h2>
                    <p class="rs-section-descrip mt-2 text-muted" style="max-width: 620px; font-size: 15px; line-height: 1.6;">
                        {{ __('Otomotiv, savunma, metal ve mobilya sanayisine yönelik yüksek saflıkta galvano kimyasalları, banyo hammaddeleri ve koruyucu yüzey işlem prosesleri.') }}
                    </p>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="rs-services-btn d-flex flex-wrap gap-3 justify-content-lg-end">
                    <a class="rs-btn has-theme-light-blue has-icon has-bg" href="{{ $productsPageUrl }}">
                        {{ __('View All Products') }}
                        <span class="icon-box">
                            <svg class="icon-first" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                            </svg>
                            <svg class="icon-second" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                            </svg>
                        </span>
                    </a>
                    <a class="rs-btn has-theme-orange has-icon has-bg" href="{{ $catalogPdfUrl }}" target="_blank">
                        {{ __('Download Catalog') }}
                        <span class="icon-box">
                            <i class="ri-file-pdf-2-line" style="font-size: 16px;"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Category Filter Tabs -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="tk-product-filters d-flex flex-wrap gap-2">
                    <button type="button" class="tk-filter-btn active" data-filter="all">{{ __('All') }} ({{ $allProducts->count() }})</button>
                    <button type="button" class="tk-filter-btn" data-filter="kaplama">{{ __('Plating Processes') }}</button>
                    <button type="button" class="tk-filter-btn" data-filter="on-islem">{{ __('Pre-Treatments') }}</button>
                    <button type="button" class="tk-filter-btn" data-filter="pasivasyon">{{ __('Passivation & Finishes') }}</button>
                    <button type="button" class="tk-filter-btn" data-filter="temel-kimya">{{ __('Basic Chemicals') }}</button>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-4 tk-product-grid">
            @foreach($allProducts as $product)
                @php
                    $rawTitle = $product->title;
                    $catSlug = match(true) {
                        str_contains($rawTitle, 'Bakır') || str_contains($rawTitle, 'Nikel') || str_contains($rawTitle, 'Krom') || str_contains($rawTitle, 'Çinko') || str_contains($rawTitle, 'Diğer') => 'kaplama',
                        str_contains($rawTitle, 'Ön İşlem') || str_contains($rawTitle, 'Alüminyum') => 'on-islem',
                        str_contains($rawTitle, 'Pasivasyon') || str_contains($rawTitle, 'Renklendirme') || str_contains($rawTitle, 'Lak') => 'pasivasyon',
                        default => 'temel-kimya',
                    };
                    $groupCount = count($product->getLocalizedProcessGroups());
                @endphp
                <div class="col-xl-4 col-lg-6 col-md-6 tk-product-col" data-category="{{ $catSlug }}">
                    <div class="tk-product-card wow fadeInUp" data-wow-delay=".{{ 1 + ($loop->index % 3 * 2) }}s">
                        <div class="tk-product-thumb">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->t('title') }}" loading="lazy">
                            <div class="tk-product-overlay"></div>
                        </div>
                        <div class="tk-product-content">
                            <div class="tk-product-top">
                                <span class="tk-product-tag">{{ $product->t('category') ?? __('OUR PRODUCTS') }}</span>
                                @if($groupCount > 0)
                                    <span class="tk-product-count">{{ $groupCount }} {{ __('Process Groups') }}</span>
                                @endif
                            </div>
                            <div class="tk-product-bottom">
                                <h3 class="tk-product-title">
                                    <a href="{{ $product->detailUrl() }}">{{ $product->t('title') }}</a>
                                </h3>
                                @if($product->t('description'))
                                    <p class="tk-product-desc">
                                        {{ Str::limit($product->t('description'), 85) }}
                                    </p>
                                @endif
                                <a class="tk-product-btn" href="{{ $product->detailUrl() }}">
                                    <span>{{ __('View Details') }}</span>
                                    <span class="icon-box">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                            <path d="M31.71,15.29l-10-10L20.29,6.71,28.59,15H0v2H28.59l-8.29,8.29,1.41,1.41,10-10A1,1,0,0,0,31.71,15.29Z"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Catalog Banner -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="tk-product-footer-banner">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div class="tk-footer-icon">
                                <i class="ri-flask-line"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 text-white">{{ __('Our Complete Plating & Chemical Catalog') }}</h4>
                                <p class="mb-0 text-white-50">{{ __('60+ industrial formulations and plating bath chemicals across 11 main categories.') }}</p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="{{ $catalogPdfUrl }}" target="_blank" class="rs-btn has-theme-orange has-icon has-bg">
                                {{ __('Download Catalog') }}
                                <span class="icon-box">
                                    <i class="ri-download-2-line" style="font-size: 16px;"></i>
                                </span>
                            </a>
                            <a href="{{ $productsPageUrl }}" class="rs-btn has-theme-light-blue has-icon has-bg">
                                {{ __('View Catalog') }}
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

@push('styles')
<style>
    /* Sharp Industrial Products Section */
    .tk-products-section {
        background: #ffffff;
    }
    
    /* Category Filter Buttons (Angular Industrial Style) */
    .tk-product-filters {
        border-bottom: 2px solid #e2e8f0;
        padding-bottom: 12px;
    }
    .tk-filter-btn {
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 0 !important;
        padding: 9px 18px;
        font-size: 13.5px;
        font-weight: 700;
        color: #0b3954;
        cursor: pointer;
        transition: all 0.25s ease;
        line-height: 1;
        text-transform: uppercase;
        letter-spacing: 0.4px;
        font-family: inherit;
    }
    .tk-filter-btn:hover {
        background: #002D72;
        border-color: #002D72;
        color: #ffffff;
    }
    .tk-filter-btn.active {
        background: #002D72 !important;
        border-color: #002D72 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(0, 45, 114, 0.2);
    }

    /* Product Cards */
    .tk-product-card {
        position: relative;
        overflow: hidden;
        height: 380px;
        border: 1px solid rgba(0, 45, 114, 0.14);
        border-radius: 0 !important;
        background: #07182e;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: border-color 0.35s ease, box-shadow 0.35s ease, transform 0.35s ease;
    }
    .tk-product-card:hover {
        border-color: #002D72;
        box-shadow: 0 16px 36px rgba(0, 45, 114, 0.18);
        transform: translateY(-4px);
    }
    .tk-product-thumb {
        position: absolute;
        inset: 0;
        z-index: 1;
        overflow: hidden;
    }
    .tk-product-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .tk-product-card:hover .tk-product-thumb img {
        transform: scale(1.08);
    }
    .tk-product-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(7, 24, 46, 0.35) 0%, rgba(7, 24, 46, 0.55) 45%, rgba(7, 24, 46, 0.95) 100%);
        z-index: 2;
        transition: background 0.35s ease;
    }
    .tk-product-card:hover .tk-product-overlay {
        background: linear-gradient(180deg, rgba(7, 24, 46, 0.2) 0%, rgba(7, 24, 46, 0.6) 40%, rgba(7, 24, 46, 0.96) 100%);
    }
    .tk-product-content {
        position: relative;
        z-index: 3;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 24px 24px 22px;
    }
    .tk-product-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
    }
    .tk-product-tag {
        background: #002D72;
        color: #ffffff;
        padding: 5px 12px;
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border-radius: 0 !important;
        border-left: 3px solid #38bdf8;
        line-height: 1;
        display: inline-block;
    }
    [dir="rtl"] .tk-product-tag {
        border-left: none;
        border-right: 3px solid #38bdf8;
    }
    .tk-product-count {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        color: #ffffff;
        padding: 4px 10px;
        font-size: 11px;
        font-weight: 600;
        border-radius: 0 !important;
        border: 1px solid rgba(255, 255, 255, 0.2);
        line-height: 1;
    }
    .tk-product-bottom {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }
    .tk-product-title {
        color: #ffffff;
        font-size: 22px;
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 8px;
        transition: color 0.25s ease;
    }
    .tk-product-title a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.25s ease;
    }
    .tk-product-card:hover .tk-product-title a {
        color: #38bdf8;
    }
    .tk-product-desc {
        color: rgba(255, 255, 255, 0.85);
        font-size: 13.5px;
        line-height: 1.5;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .tk-product-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(0, 45, 114, 0.9);
        color: #ffffff;
        padding: 9px 18px;
        font-size: 13px;
        font-weight: 700;
        border-radius: 0 !important;
        border: 1px solid rgba(255, 255, 255, 0.25);
        text-decoration: none;
        transition: all 0.25s ease;
        line-height: 1;
    }
    .tk-product-btn .icon-box {
        display: inline-flex;
        align-items: center;
        width: 14px;
        height: 14px;
        transition: transform 0.25s ease;
    }
    .tk-product-btn .icon-box svg {
        width: 100%;
        height: 100%;
        fill: #ffffff;
    }
    .tk-product-card:hover .tk-product-btn {
        background: #ffffff;
        color: #002D72;
        border-color: #ffffff;
    }
    .tk-product-card:hover .tk-product-btn .icon-box svg {
        fill: #002D72;
    }
    .tk-product-card:hover .tk-product-btn .icon-box {
        transform: translateX(3px);
    }
    [dir="rtl"] .tk-product-card:hover .tk-product-btn .icon-box {
        transform: translateX(-3px);
    }

    /* Bottom Catalog Banner */
    .tk-product-footer-banner {
        background: #07182e;
        border: 1px solid rgba(0, 45, 114, 0.3);
        border-left: 4px solid #002D72;
        border-radius: 0 !important;
        padding: 24px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }
    [dir="rtl"] .tk-product-footer-banner {
        border-left: 1px solid rgba(0, 45, 114, 0.3);
        border-right: 4px solid #002D72;
    }
    .tk-footer-icon {
        width: 48px;
        height: 48px;
        background: rgba(0, 45, 114, 0.7);
        border: 1px solid rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #38bdf8;
        font-size: 24px;
        flex-shrink: 0;
        border-radius: 0 !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterBtns = document.querySelectorAll('.tk-filter-btn');
        const productCols = document.querySelectorAll('.tk-product-col');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const filter = this.getAttribute('data-filter');

                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                productCols.forEach(col => {
                    const category = col.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        col.style.display = 'block';
                        col.style.opacity = '0';
                        setTimeout(() => {
                            col.style.transition = 'opacity 0.35s ease';
                            col.style.opacity = '1';
                        }, 20);
                    } else {
                        col.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
<!-- products area end -->
