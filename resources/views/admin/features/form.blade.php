@extends('admin.layouts.app')

@section('title', $feature->exists ? 'Özellik Düzenle' : 'Yeni Özellik Ekle')
@section('page_title', $feature->exists ? 'Özellik Düzenle' : 'Yeni Özellik Ekle')
@section('page_subtitle', 'Slider altında yer alan özellik kartı bilgilerini 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $feature->exists ? 'Özellik Bilgilerini Güncelle' : 'Yeni Özellik Oluştur' }}</h6>
            <a href="{{ route('admin.features.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $feature->exists ? route('admin.features.update', $feature) : route('admin.features.store') }}">
                @csrf
                @if($feature->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Özellik Başlığı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $feature->title) }}" required placeholder="Worldwide Manufacturing">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Kısa Açıklama (TR)</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $feature->description) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Feature Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $feature->getTranslation('en', 'title')) }}" placeholder="Worldwide Manufacturing">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Short Description (EN)</label>
                                <textarea name="translations[en][description]" rows="3" class="form-control">{{ old('translations.en.description', $feature->getTranslation('en', 'description')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 عنوان الميزة (Feature Title - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $feature->getTranslation('ar', 'title')) }}" placeholder="تصنيع عالمي">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 وصف قصير (Description - AR)</label>
                                <textarea dir="rtl" name="translations[ar][description]" rows="3" class="form-control">{{ old('translations.ar.description', $feature->getTranslation('ar', 'description')) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $feature->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $feature->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif Göster</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.features.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
