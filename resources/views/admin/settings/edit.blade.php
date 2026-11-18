@extends('admin.layouts.app')

@section('title', 'Genel Site & İletişim Ayarları')
@section('page_title', 'Genel Site & İletişim Ayarları')
@section('page_subtitle', 'Header, Footer, İletişim bilgileri ve iç sayfa Breadcrumb görselini 3 dilde (TR / EN / AR) güncelleyin')

@section('content')
    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card-modern mb-4">
            <div class="card-modern-body pb-3">
                @include('admin.partials.lang-tabs')

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Kurumsal E-Posta (Tüm Dillerde Ortak) *</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Telefon Numarası (Tüm Dillerde Ortak) *</label>
                        <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">İç Sayfalar Breadcrumb Arka Plan Görseli</label>
                        <div class="photo-upload-card d-flex align-items-center gap-3 py-2">
                            <div class="photo-preview-wrapper" style="width: 96px; height: 54px;">
                                <img id="breadcrumbBgPreview" src="{{ asset($settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}" alt="Breadcrumb">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="breadcrumb_bg_image_file" accept="image/*" class="form-control form-control-sm photo-file-input mb-1" data-preview="#breadcrumbBgPreview">
                                <input type="text" name="breadcrumb_bg_image" class="form-control form-control-sm" value="{{ old('breadcrumb_bg_image', $settings['breadcrumb_bg_image'] ?? 'assets/images/bg/breadcrumb-bg-01.png') }}" placeholder="Görsel yolu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <!-- TURKISH TAB -->
            <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h6 class="fw-bold mb-0">🇹🇷 Türkçe — Genel Site & İletişim Bilgileri</h6>
                    </div>
                    <div class="card-modern-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Site Başlığı (Title - TR) *</label>
                                <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $settings['site_title'] ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Çalışma Saatleri (TR)</label>
                                <input type="text" name="contact_schedule" class="form-control" value="{{ old('contact_schedule', $settings['contact_schedule'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ofis / Fabrika Adresi (TR)</label>
                                <textarea name="contact_address" rows="3" class="form-control">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Footer Kısa Açıklama (TR)</label>
                                <textarea name="footer_description" rows="3" class="form-control">{{ old('footer_description', $settings['footer_description'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ENGLISH TAB -->
            <div class="tab-pane fade" id="tab-en" role="tabpanel">
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h6 class="fw-bold mb-0">🇬🇧 English — General & Contact Info</h6>
                    </div>
                    <div class="card-modern-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Site Başlığı (Title - EN)</label>
                                <input type="text" name="site_title_en" class="form-control" value="{{ old('site_title_en', $settings['site_title_en'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Çalışma Saatleri (EN)</label>
                                <input type="text" name="contact_schedule_en" class="form-control" value="{{ old('contact_schedule_en', $settings['contact_schedule_en'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ofis / Fabrika Adresi (EN)</label>
                                <textarea name="contact_address_en" rows="3" class="form-control">{{ old('contact_address_en', $settings['contact_address_en'] ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Footer Kısa Açıklama (EN)</label>
                                <textarea name="footer_description_en" rows="3" class="form-control">{{ old('footer_description_en', $settings['footer_description_en'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ARABIC TAB -->
            <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                <div class="card-modern">
                    <div class="card-modern-header">
                        <h6 class="fw-bold mb-0">🇸🇦 العربية (Arapça) — معلومات عامة والاتصال</h6>
                    </div>
                    <div class="card-modern-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Site Başlığı (Title - AR)</label>
                                <input type="text" dir="rtl" name="site_title_ar" class="form-control" value="{{ old('site_title_ar', $settings['site_title_ar'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Çalışma Saatleri (AR)</label>
                                <input type="text" dir="rtl" name="contact_schedule_ar" class="form-control" value="{{ old('contact_schedule_ar', $settings['contact_schedule_ar'] ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Ofis / Fabrika Adresi (AR)</label>
                                <textarea dir="rtl" name="contact_address_ar" rows="3" class="form-control">{{ old('contact_address_ar', $settings['contact_address_ar'] ?? '') }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Footer Kısa Açıklama (AR)</label>
                                <textarea dir="rtl" name="footer_description_ar" rows="3" class="form-control">{{ old('footer_description_ar', $settings['footer_description_ar'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-end">
            <button type="submit" class="btn-tk-primary px-4 py-2">
                <i class="ri-save-line"></i>
                <span>Genel Ayarları Kaydet</span>
            </button>
        </div>
    </form>
@endsection
