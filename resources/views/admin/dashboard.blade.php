@extends('admin.layouts.app')

@section('title', 'Kontrol Paneli')
@section('page_title', 'Kontrol Paneli')
@section('page_subtitle', 'Ana sayfa bileşenlerinin genel durumu ve hızlı yönetim araçları (TR / EN / AR)')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="text-secondary small fw-semibold mb-1">TOPLAM SLIDER</div>
                    <h2 class="fw-bold mb-1">{{ $sliderCount }}</h2>
                    <a href="{{ route('admin.sliders.index') }}" class="small text-decoration-none" style="color: #0284c7;">
                        Sliderları Yönet <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
                <div class="stat-icon" style="background: rgba(14, 165, 233, 0.12); color: #0284c7;">
                    <i class="ri-slideshow-3-line"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="text-secondary small fw-semibold mb-1">AKTİF HİZMETLER</div>
                    <h2 class="fw-bold mb-1">{{ $serviceCount }}</h2>
                    <a href="{{ route('admin.services.index') }}" class="small text-decoration-none" style="color: #0d9488;">
                        Hizmetleri Yönet <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
                <div class="stat-icon" style="background: rgba(20, 184, 166, 0.12); color: #0d9488;">
                    <i class="ri-flask-line"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="text-secondary small fw-semibold mb-1">ÜRÜN & PORTFOLYO</div>
                    <h2 class="fw-bold mb-1">{{ $productCount }}</h2>
                    <a href="{{ route('admin.products.index') }}" class="small text-decoration-none" style="color: #4f46e5;">
                        Ürünleri Yönet <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
                <div class="stat-icon" style="background: rgba(99, 102, 241, 0.12); color: #4f46e5;">
                    <i class="ri-microscope-line"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="stat-card">
                <div>
                    <div class="text-secondary small fw-semibold mb-1">İLETİŞİM MESAJLARI</div>
                    <h2 class="fw-bold mb-1">{{ $unreadMessageCount ?? 0 }} <span class="fs-6 fw-normal text-secondary">yeni</span></h2>
                    <a href="{{ route('admin.contact-messages.index') }}" class="small text-decoration-none" style="color: #ea580c;">
                        Mesajları Gör <i class="ri-arrow-right-s-line"></i>
                    </a>
                </div>
                <div class="stat-icon" style="background: rgba(234, 88, 12, 0.12); color: #ea580c;">
                    <i class="ri-mail-unread-line"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card-modern h-100">
                <div class="card-modern-header">
                    <div>
                        <h6 class="fw-bold mb-0">Son Eklenen Ürünler</h6>
                        <span class="text-secondary small">Ana sayfa portfolyo vitrinindeki ürünler</span>
                    </div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-outline-primary rounded-3">
                        <i class="ri-add-line"></i> Yeni Ekle
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>Görsel</th>
                                <th>Ürün Adı</th>
                                <th>Kategori</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $product)
                                <tr>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="thumb-preview">
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $product->title }}</div>
                                        @if($product->is_featured)
                                            <span class="badge bg-warning bg-opacity-25 text-dark" style="font-size: 11px;">Vitrin Büyük Kart</span>
                                        @endif
                                    </td>
                                    <td><span class="text-secondary">{{ $product->category }}</span></td>
                                    <td>
                                        <span class="badge-status {{ $product->is_active ? 'badge-active' : 'badge-passive' }}">
                                            {{ $product->is_active ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-4">Henüz ürün bulunmuyor.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card-modern h-100">
                <div class="card-modern-header">
                    <div>
                        <h6 class="fw-bold mb-0">Hizmetlerimiz</h6>
                        <span class="text-secondary small">Ana sayfada listelenen laboratuvar hizmetleri</span>
                    </div>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-sm btn-outline-primary rounded-3">
                        <i class="ri-add-line"></i> Yeni Ekle
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-modern mb-0">
                        <thead>
                            <tr>
                                <th>Görsel</th>
                                <th>Başlık</th>
                                <th>Sıra</th>
                                <th>Durum</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentServices as $service)
                                <tr>
                                    <td>
                                        @if($service->image)
                                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="thumb-preview">
                                        @else
                                            <span class="text-secondary small">—</span>
                                        @endif
                                    </td>
                                    <td class="fw-semibold">{{ $service->title }}</td>
                                    <td>{{ $service->sort_order }}</td>
                                    <td>
                                        <span class="badge-status {{ $service->is_active ? 'badge-active' : 'badge-passive' }}">
                                            {{ $service->is_active ? 'Aktif' : 'Pasif' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-secondary py-4">Henüz hizmet bulunmuyor.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
