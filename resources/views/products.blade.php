@extends('layouts.app')

@section('title', ($activeProduct ? $activeProduct->t('title') . ' || ' : '') . __('Products') . ' || ' . ($settings['site_title'] ?? 'Teknokimya'))

@push('styles')
<style>
    /* Products Page Styling */
    .rs-products-page {
        background-color: #f8fafc;
    }
    
    /* Sidebar Category List */
    .rs-products-page .widget-categories-two .list ul {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .rs-products-page .widget-categories-two .list ul li a {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 18px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        font-size: 14.5px;
        font-weight: 600;
        color: #1e293b;
        transition: all 0.25s ease;
        text-decoration: none;
    }
    .rs-products-page .widget-categories-two .list ul li a:hover,
    .rs-products-page .widget-categories-two .list ul li a.active {
        background: #002D72 !important;
        border-color: #002D72 !important;
        color: #ffffff !important;
        transform: translateX(4px);
        box-shadow: 0 4px 14px rgba(0, 45, 114, 0.15);
    }
    .rs-products-page .widget-categories-two .list ul li a.active i,
    .rs-products-page .widget-categories-two .list ul li a:hover i {
        color: #ea5501 !important;
    }
    
    /* Quick Jump Links */
    .tk-process-jump-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #ffffff;
        border: 1px solid #cbd5e1;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13.5px;
        font-weight: 600;
        color: #002D72;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .tk-process-jump-link:hover {
        background: #002D72;
        color: #ffffff;
        border-color: #002D72;
    }
    .tk-process-jump-link .bullet-dot {
        color: #ea5501;
        font-size: 16px;
        line-height: 1;
    }
    .tk-process-jump-link:hover .bullet-dot {
        color: #ffffff;
    }

    /* Process Table */
    .tk-chemical-table {
        border-collapse: separate;
        border-spacing: 0;
        background: #ffffff;
    }
    .tk-chemical-table thead th {
        background: #002D72 !important;
        color: #ffffff !important;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 14px 20px;
        border: none;
    }
    .tk-chemical-table tbody td {
        padding: 16px 20px;
        border-bottom: 1px solid #f1f5f9;
        font-size: 14.5px;
        color: #334155;
        vertical-align: middle;
    }
    .tk-chemical-table tbody tr:hover td {
        background-color: #f8fafc;
    }
    .tk-code-badge {
        display: inline-block;
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
        font-weight: 700;
        font-size: 13.5px;
        color: #002D72;
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        padding: 5px 12px;
        border-radius: 4px;
        letter-spacing: 0.3px;
        white-space: nowrap;
    }

    /* Search highlight */
    .tk-match-highlight {
        background: #fef08a;
        padding: 0 2px;
        border-radius: 2px;
    }
</style>
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <section class="rs-breadcrumb-area rs-breadcrumb-one p-relative">
        <div class="rs-breadcrumb-bg" data-background="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-8 col-lg-8">
                    <div class="rs-breadcrumb-content-wrapper">
                        <div class="rs-breadcrumb-title-wrapper">
                            <h1 class="rs-breadcrumb-title">{{ $activeProduct ? $activeProduct->t('title') : __('Products') }}</h1>
                        </div>
                        <div class="rs-breadcrumb-menu">
                            <nav>
                                <ul>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('home') }}">{{ __('Home') }}</a></span></li>
                                    <li><span><a href="{{ \App\Support\LocalizedRoute::page('products') }}">{{ __('Products') }}</a></span></li>
                                    @if($activeProduct)
                                        <li class="active"><span>{{ $activeProduct->t('title') }}</span></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb area end -->

    <!-- products main area start -->
    <section class="rs-services-area section-space rs-products-page">
        <div class="container">
            <div class="row g-5">
                <!-- Left Sidebar -->
                <div class="col-xl-4 col-lg-4">
                    <div class="rs-sidebar-wrapper rs-sidebar-sticky">

                        <!-- Search Widget -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-search">
                                <form action="javascript:void(0);" onsubmit="return false;">
                                    <div class="sidebar-search-input">
                                        <input type="text" id="tk-product-search" placeholder="{{ __('Ürün veya Kod Ara...') }}">
                                        <button type="button"><i class="ri-search-line"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget widget-categories-two mb-30">
                            <h5 class="sidebar-widget-title">{{ __('Ürünlerimiz') }}</h5>
                            <div class="sidebar-widget-content">
                                <div class="list">
                                    <ul id="tk-cat-list">
                                        @foreach($products as $prod)
                                            @php 
                                                $isActive = ($activeProduct && $activeProduct->id === $prod->id); 
                                                $groupCount = count($prod->getLocalizedProcessGroups());
                                            @endphp
                                            <li class="tk-cat-item" data-title="{{ mb_strtolower($prod->t('title')) }}">
                                                <a href="{{ $prod->detailUrl() }}" class="{{ $isActive ? 'active' : '' }}">
                                                    <span>{{ $prod->t('title') }}</span>
                                                    <span class="d-flex align-items-center gap-1">
                                                        <span class="badge {{ $isActive ? 'bg-white bg-opacity-25 text-white' : 'bg-light text-muted' }} border-0 small px-2 py-1">
                                                            {{ $groupCount }} {{ __('Proses') }}
                                                        </span>
                                                        <i class="ri-arrow-right-line"></i>
                                                    </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Contact & Catalog Card -->
                        <div class="sidebar-widget mb-30 p-4 rounded-3 text-white shadow-xs" style="background: linear-gradient(145deg, #002D72 0%, #082142 100%);">
                            <h5 class="text-white mb-15 fw-bold" style="font-size: 18px;">{{ __('Bize Ulaşın') }}</h5>
                            <p class="small text-white-50 mb-20" style="line-height: 1.6;">
                                {{ __('Kaplama banyonuz ve endüstriyel kimyasal ihtiyaçlarınız için teknik uzmanlarımızdan bilgi alın.') }}
                            </p>
                            <div class="mb-3 d-flex align-items-center gap-2">
                                <i class="ri-phone-fill text-warning fs-5"></i>
                                <a href="tel:{{ preg_replace('/[^\d+]/', '', $settings['contact_phone'] ?? '02126191907') }}" class="text-white fw-bold text-decoration-none">
                                    {{ $settings['contact_phone'] ?? '+90 (212) 619 19 07' }}
                                </a>
                            </div>
                            <div class="mb-20 d-flex align-items-center gap-2">
                                <i class="ri-mail-fill text-warning fs-5"></i>
                                <a href="mailto:{{ $settings['contact_email'] ?? 'info@teknokimya.com' }}" class="text-white-50 small text-decoration-none">
                                    {{ $settings['contact_email'] ?? 'info@teknokimya.com' }}
                                </a>
                            </div>
                            <a href="{{ asset('assets/pdf/teknokimya-urun-katalogu-2025.pdf') }}" target="_blank" rel="noopener noreferrer" class="rs-btn has-theme-orange w-100 justify-content-center text-center py-2" style="font-size: 13.5px; height: 42px;">
                                <i class="ri-file-pdf-line me-1"></i> {{ __('Ürün Kataloğu (PDF)') }}
                            </a>
                        </div>

                        <!-- Certification & Standards -->
                        <div class="p-3 bg-white rounded-3 border d-flex align-items-center gap-3 shadow-xs">
                            <i class="ri-shield-check-fill text-primary fs-2"></i>
                            <div>
                                <h6 class="mb-0 fw-bold fs-14">ISO 9001 & REACH Uyumlu</h6>
                                <small class="text-muted">Uluslararası kalite ve çevre standartlarında üretim.</small>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Right Main Content -->
                <div class="col-xl-8 col-lg-8">
                    @if($activeProduct)
                        @php
                            $groups = $activeProduct->getLocalizedProcessGroups();
                        @endphp

                        <!-- Category Title & Header -->
                        <div class="mb-35">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-1 rounded-pill fw-semibold">
                                    <i class="ri-flask-line me-1"></i> {{ $activeProduct->t('category') ?: __('Galvano Kaplama Kimyasalları') }}
                                </span>
                            </div>
                            <h2 class="display-6 fw-bold text-dark mb-20 text-uppercase" style="letter-spacing: -0.5px;">
                                {{ $activeProduct->t('title') }}
                            </h2>

                            @if(count($groups) > 0)
                                <!-- Quick jump sub-processes list -->
                                <div class="p-3 mb-25 rounded-3 bg-white border shadow-xs">
                                    <span class="fw-bold d-block text-secondary small mb-2 text-uppercase letter-spacing-1">
                                        <i class="ri-list-check-2 me-1 text-primary"></i> {{ __('Alt Proses Grupları:') }}
                                    </span>
                                    <ul class="list-unstyled mb-0 d-flex flex-wrap gap-2">
                                        @foreach($groups as $idx => $grp)
                                            <li>
                                                <a href="#process-group-{{ $idx }}" class="tk-process-jump-link">
                                                    <span class="bullet-dot">•</span> {{ $grp['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Category Banner Image -->
                            @if($activeProduct->image)
                                <div class="mb-30 rounded-3 overflow-hidden border shadow-xs" style="max-height: 380px;">
                                    <img src="{{ asset($activeProduct->image) }}" alt="{{ $activeProduct->t('title') }}" class="w-100 h-100 object-fit-cover">
                                </div>
                            @endif

                            @if($activeProduct->t('description'))
                                <div class="mb-35 lead text-muted" style="font-size: 15.5px; line-height: 1.8;">
                                    <p>{{ $activeProduct->t('description') }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Process Tables -->
                        <div class="tk-processes-wrapper" id="tk-processes-container">
                            @foreach($groups as $idx => $grp)
                                <div class="tk-process-block mb-45" id="process-group-{{ $idx }}">
                                    <div class="tk-process-heading mb-3 d-flex align-items-center justify-content-between">
                                        <h4 class="fw-bold mb-0 text-dark text-uppercase" style="font-size: 19px;">
                                            <span class="text-primary me-2">#</span>{{ $grp['title'] }}
                                        </h4>
                                        <span class="badge bg-light text-secondary border px-2 py-1">{{ count($grp['items'] ?? []) }} {{ __('Ürün') }}</span>
                                    </div>

                                    <div class="table-responsive rounded-3 border shadow-xs">
                                        <table class="table table-hover mb-0 tk-chemical-table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 25%; min-width: 150px;">{{ __('ÜRÜN KODU') }}</th>
                                                    <th>{{ __('AÇIKLAMA') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($grp['items'] ?? [] as $item)
                                                    <tr class="tk-product-row" data-code="{{ mb_strtolower($item['code'] ?? '') }}" data-desc="{{ mb_strtolower($item['description'] ?? '') }}">
                                                        <td class="align-middle">
                                                            <span class="tk-code-badge">{{ $item['code'] ?? '-' }}</span>
                                                        </td>
                                                        <td class="align-middle" style="font-size: 14.5px; line-height: 1.6; color: #334155;">
                                                            {{ $item['description'] ?? '-' }}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="2" class="text-center text-muted py-4">
                                                            {{ __('Bu proses grubu için henüz ürün tanımlanmamış.') }}
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Bottom Consultation / CTA Box -->
                        <div class="mt-40 p-4 p-md-5 rounded-3 bg-white border shadow-xs d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-2">{{ __('Prosesleriniz için özel kimyasal çözüm mü arıyorsunuz?') }}</h5>
                                <p class="text-muted mb-0 small" style="line-height: 1.6;">
                                    {{ __('Laboratuvar ve mühendislik ekibimiz banyonuzun kurulumu, optimizasyonu ve numune testleri için sizlere destek vermeye hazırdır.') }}
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                <a href="{{ \App\Support\LocalizedRoute::page('contact') }}" class="rs-btn has-theme-orange py-2 px-4" style="height: 44px; font-size: 14px;">
                                    <i class="ri-mail-send-line"></i> {{ __('Numune / Teklif Al') }}
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-light border text-center p-5">
                            <i class="ri-flask-line display-4 text-muted mb-3 d-block"></i>
                            <h5>{{ __('Ürün veya kategori bulunamadı.') }}</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- products main area end -->
@endsection

@push('scripts')
<script>
    // Realtime search filter on products page
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('tk-product-search');
        if (!searchInput) return;

        searchInput.addEventListener('input', function () {
            const query = this.value.trim().toLowerCase();
            
            // Filter main content product rows
            const rows = document.querySelectorAll('.tk-product-row');
            let foundCount = 0;
            
            rows.forEach(function (row) {
                const code = row.getAttribute('data-code') || '';
                const desc = row.getAttribute('data-desc') || '';
                if (!query || code.includes(query) || desc.includes(query)) {
                    row.style.display = '';
                    foundCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            // Hide empty process blocks during search
            document.querySelectorAll('.tk-process-block').forEach(function (block) {
                const visibleRows = block.querySelectorAll('.tk-product-row:not([style*="display: none"])');
                if (query && visibleRows.length === 0) {
                    block.style.display = 'none';
                } else {
                    block.style.display = '';
                }
            });

            // Filter sidebar categories
            document.querySelectorAll('.tk-cat-item').forEach(function (catItem) {
                const title = catItem.getAttribute('data-title') || '';
                if (!query || title.includes(query)) {
                    catItem.style.display = '';
                } else {
                    catItem.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
