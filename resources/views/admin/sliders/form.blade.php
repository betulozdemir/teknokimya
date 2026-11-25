@extends('admin.layouts.app')

@section('title', $slider->exists ? 'Slider Düzenle' : 'Yeni Slider Ekle')
@section('page_title', $slider->exists ? 'Slider Düzenle' : 'Yeni Slider Ekle')
@section('page_subtitle', 'Ana sayfa hero slider bilgilerini 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $slider->exists ? 'Slider Bilgilerini Güncelle' : 'Yeni Slider Oluştur' }}</h6>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $slider->exists ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}" enctype="multipart/form-data">
                @csrf
                @if($slider->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Üst Başlık (Subtitle - TR)</label>
                                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $slider->subtitle) }}" placeholder="Teknokimya'ya Hoş Geldiniz">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Ana Başlık (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required placeholder="Tekno Kimya">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Vurgulu Alt Kelime (Stroke Text - TR)</label>
                                <input type="text" name="highlight_text" class="form-control" value="{{ old('highlight_text', $slider->highlight_text) }}" placeholder="Kaplama Kimyasalları">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">🇹🇷 Açıklama Metni (TR)</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $slider->description) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Dönen Buton Yazısı (TR)</label>
                                <input type="text" name="button_text" class="form-control" value="{{ old('button_text', $slider->button_text) }}">
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">🇬🇧 Subtitle (EN)</label>
                                <input type="text" name="translations[en][subtitle]" class="form-control" value="{{ old('translations.en.subtitle', $slider->getTranslation('en', 'subtitle')) }}" placeholder="Welcome to Teknokimya">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇬🇧 Main Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $slider->getTranslation('en', 'title')) }}" placeholder="Tekno Chemistry">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇬🇧 Highlight / Stroke Text (EN)</label>
                                <input type="text" name="translations[en][highlight_text]" class="form-control" value="{{ old('translations.en.highlight_text', $slider->getTranslation('en', 'highlight_text')) }}" placeholder="Coating Chemicals">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">🇬🇧 Description (EN)</label>
                                <textarea name="translations[en][description]" rows="3" class="form-control">{{ old('translations.en.description', $slider->getTranslation('en', 'description')) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇬🇧 Rotating Button Text (EN)</label>
                                <input type="text" name="translations[en][button_text]" class="form-control" value="{{ old('translations.en.button_text', $slider->getTranslation('en', 'button_text')) }}" placeholder="Explore More - Explore More -">
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">🇸🇦 العنوان الفرعي (Subtitle - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][subtitle]" class="form-control" value="{{ old('translations.ar.subtitle', $slider->getTranslation('ar', 'subtitle')) }}" placeholder="مرحباً بكم في تكنوكيميا">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇸🇦 العنوان الرئيسي (Main Title - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $slider->getTranslation('ar', 'title')) }}" placeholder="تكنو كيميا">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇸🇦 الكلمة البارزة (Stroke Text - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][highlight_text]" class="form-control" value="{{ old('translations.ar.highlight_text', $slider->getTranslation('ar', 'highlight_text')) }}" placeholder="كيماويات الطلاء">
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">🇸🇦 الوصف (Description - AR)</label>
                                <textarea dir="rtl" name="translations[ar][description]" rows="3" class="form-control">{{ old('translations.ar.description', $slider->getTranslation('ar', 'description')) }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">🇸🇦 نص الزر الدوار (Button Text - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][button_text]" class="form-control" value="{{ old('translations.ar.button_text', $slider->getTranslation('ar', 'button_text')) }}" placeholder="اكتشف المزيد - اكتشف المزيد -">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Arka Plan Fotoğrafı *</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper">
                                    <img id="slider-photo-preview" src="{{ $slider->imageUrl() }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="background_image_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="background_image_file" name="background_image_file" class="d-none photo-file-input" accept="image/*" data-preview="#slider-photo-preview" data-filename="#slider-file-name">
                                        <span id="slider-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="text-secondary small mb-2">PNG, JPG veya WEBP formatında (Maks. 5MB) yüksek çözünürlüklü bir görsel yükleyebilir veya aşağıdan mevcut dosya yolunu kullanabilirsiniz.</div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="background_image" class="form-control" value="{{ old('background_image', $slider->background_image) }}" placeholder="assets/images/bg/banner-bg-09.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Buton Linki / Video URL</label>
                        <input type="text" name="button_url" class="form-control" value="{{ old('button_url', $slider->button_url) }}" placeholder="#contact">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $slider->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif Göster</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
