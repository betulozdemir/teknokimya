@extends('admin.layouts.app')

@section('title', $menuItem->exists ? 'Menü Öğesi Düzenle' : 'Yeni Menü Öğesi Ekle')
@section('page_title', $menuItem->exists ? 'Menü Öğesi Düzenle' : 'Yeni Menü Öğesi Ekle')
@section('page_subtitle', 'Header menü bağlantısını ve TR / EN / AR dil karşılıklarını doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $menuItem->exists ? 'Menü Öğesini Güncelle' : 'Yeni Menü Öğesi Oluştur' }}</h6>
            <a href="{{ route('admin.menu-items.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line me-1"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $menuItem->exists ? route('admin.menu-items.update', $menuItem) : route('admin.menu-items.store') }}">
                @csrf
                @if($menuItem->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH TAB -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Menü Başlığı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $menuItem->title) }}" placeholder="Örn: Ana Sayfa, Hakkımızda, İletişim" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Hedef Bağlantı / URL (TR) *</label>
                                <input type="text" name="url" class="form-control" value="{{ old('url', $menuItem->url) }}" placeholder="Örn: / veya /hakkimizda veya /iletisim" required>
                                <div class="form-text small">
                                    Örn: <code>/</code>, <code>/hakkimizda</code>, <code>/#hizmetlerimiz</code>, <code>/#urunler</code>, <code>/#ekibimiz</code>, <code>/#blog</code>, <code>/iletisim</code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH TAB -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Menu Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $menuItem->getTranslation('en', 'title')) }}" placeholder="e.g. Home, About Us, Contact">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Target URL (EN)</label>
                                <input type="text" name="translations[en][url]" class="form-control" value="{{ old('translations.en.url', $menuItem->getTranslation('en', 'url')) }}" placeholder="e.g. / or /about or /contact">
                                <div class="form-text small">
                                    Örn: <code>/</code>, <code>/about</code>, <code>/#services</code>, <code>/#products</code>, <code>/#team</code>, <code>/#blog</code>, <code>/contact</code>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC TAB -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">عنوان القائمة (AR - Arapça)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $menuItem->getTranslation('ar', 'title')) }}" placeholder="الرئيسية، من نحن، اتصل بنا">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">رابط القائمة (AR - Arapça URL)</label>
                                <input type="text" dir="ltr" name="translations[ar][url]" class="form-control" value="{{ old('translations.ar.url', $menuItem->getTranslation('ar', 'url')) }}" placeholder="Örn: / veya /من-نحن veya /اتصل-بنا">
                                <div class="form-text small">
                                    Örn: <code>/</code>, <code>/من-نحن</code>, <code>/#خدماتنا</code>, <code>/#منتجاتنا</code>, <code>/#فريقنا</code>, <code>/#المدونة</code>, <code>/اتصل-بنا</code>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4 text-secondary opacity-25">

                <div class="row g-4">
                    <div class="col-md-4">
                        <label class="form-label">Açılış Şekli *</label>
                        <select name="target" class="form-select" required>
                            <option value="_self" {{ old('target', $menuItem->target) === '_self' ? 'selected' : '' }}>Aynı Sekmede Aç (_self)</option>
                            <option value="_blank" {{ old('target', $menuItem->target) === '_blank' ? 'selected' : '' }}>Yeni Sekmede Aç (_blank)</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $menuItem->sort_order ?? 1) }}" required>
                    </div>

                    <div class="col-md-4 d-flex align-items-center pt-3">
                        <div class="form-check form-switch fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" value="1" id="isActiveSwitch" {{ old('is_active', $menuItem->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fs-6 fw-semibold ms-2" for="isActiveSwitch">Aktif</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.menu-items.index') }}" class="btn btn-light px-4 rounded-3">İptal</a>
                    <button type="submit" class="btn-tk-primary px-4">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

