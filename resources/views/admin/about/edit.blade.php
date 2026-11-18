@extends('admin.layouts.app')

@section('title', 'Hakkımızda Sayfası Yönetimi')
@section('page_title', 'Hakkımızda Sayfası Yönetimi')
@section('page_subtitle', 'Hakkımızda iç sayfasındaki ve ana sayfadaki tüm görselleri, başlıkları, sekmeleri ve maddeleri 3 dilde yönetin')

@section('content')
    <form method="POST" action="{{ route('admin.about.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- GÖRSELLER KARTI -->
        <div class="card-modern mb-4">
            <div class="card-modern-header">
                <div>
                    <h6 class="fw-bold mb-0"><i class="ri-image-edit-line me-1 text-primary"></i> Hakkımızda Görselleri & Buton Linki</h6>
                    <span class="text-secondary small">İç sayfadaki çift katmanlı fotoğrafları ve ana sayfa görselini buradan değiştirebilirsiniz</span>
                </div>
                <a href="{{ route('about') }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-3">
                    <i class="ri-external-link-line me-1"></i> Hakkımızda Sayfasını Gör
                </a>
            </div>
            <div class="card-modern-body">
                <div class="row g-3">
                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">İç Sayfa — Sol Üst Büyük Görsel</label>
                        <div class="photo-upload-card d-flex align-items-center gap-3">
                            <div class="photo-preview-wrapper" style="width: 110px; height: 82px;">
                                <img id="aboutLargePreview" src="{{ asset($settings['about_image_large'] ?? 'assets/images/about/about-thumb-20.png') }}" alt="Büyük Görsel">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="about_image_large_file" accept="image/*" class="form-control form-control-sm photo-file-input mb-2" data-preview="#aboutLargePreview">
                                <input type="text" name="about_image_large" class="form-control form-control-sm" value="{{ old('about_image_large', $settings['about_image_large'] ?? 'assets/images/about/about-thumb-20.png') }}" placeholder="Görsel yolu">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">İç Sayfa — Sağ Alt Küçük Görsel</label>
                        <div class="photo-upload-card d-flex align-items-center gap-3">
                            <div class="photo-preview-wrapper" style="width: 110px; height: 82px;">
                                <img id="aboutSmallPreview" src="{{ asset($settings['about_image_small'] ?? 'assets/images/about/about-thumb-21.png') }}" alt="Küçük Görsel">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="about_image_small_file" accept="image/*" class="form-control form-control-sm photo-file-input mb-2" data-preview="#aboutSmallPreview">
                                <input type="text" name="about_image_small" class="form-control form-control-sm" value="{{ old('about_image_small', $settings['about_image_small'] ?? 'assets/images/about/about-thumb-21.png') }}" placeholder="Görsel yolu">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <label class="form-label">Ana Sayfa — Hakkımızda Görseli</label>
                        <div class="photo-upload-card d-flex align-items-center gap-3">
                            <div class="photo-preview-wrapper" style="width: 110px; height: 82px;">
                                <img id="aboutHomePreview" src="{{ asset($settings['about_home_image'] ?? 'assets/images/about/about-thumb-08.png') }}" alt="Ana Sayfa Görseli">
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="about_home_image_file" accept="image/*" class="form-control form-control-sm photo-file-input mb-2" data-preview="#aboutHomePreview">
                                <input type="text" name="about_home_image" class="form-control form-control-sm" value="{{ old('about_home_image', $settings['about_home_image'] ?? 'assets/images/about/about-thumb-08.png') }}" placeholder="Görsel yolu">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Hakkımızda Buton Hedef Linki (URL)</label>
                        <input type="text" name="about_button_url" class="form-control" value="{{ old('about_button_url', $settings['about_button_url'] ?? '/contact') }}" placeholder="Örn: /contact">
                    </div>
                </div>
            </div>
        </div>

        <!-- DİL SEKMELERİ VE İÇERİKLER -->
        <div class="card-modern">
            <div class="card-modern-body">
                @include('admin.partials.lang-tabs')

                <div class="tab-content">
                    <!-- TURKISH TAB -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Üst Başlık / Breadcrumb Başlığı (TR) *</label>
                                <input type="text" name="about_subtitle" class="form-control" value="{{ old('about_subtitle', $settings['about_subtitle'] ?? 'Hakkımızda') }}" required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Ana Başlık / Slogan (TR) *</label>
                                <input type="text" name="about_title" class="form-control" value="{{ old('about_title', $settings['about_title'] ?? '') }}" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Ana Başlık Altı Açıklama Paragrafı (TR)</label>
                                <textarea name="about_description" rows="2" class="form-control">{{ old('about_description', $settings['about_description'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">1. Sekme Başlığı (TR)</label>
                                <input type="text" name="about_tab_1_title" class="form-control mb-2" value="{{ old('about_tab_1_title', $settings['about_tab_1_title'] ?? 'Tarihçemiz') }}">
                                <label class="form-label">1. Sekme İçeriği (Tarihçemiz - TR)</label>
                                <textarea name="about_history" rows="4" class="form-control">{{ old('about_history', $settings['about_history'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">2. Sekme Başlığı (TR)</label>
                                <input type="text" name="about_tab_2_title" class="form-control mb-2" value="{{ old('about_tab_2_title', $settings['about_tab_2_title'] ?? 'Misyonumuz') }}">
                                <label class="form-label">2. Sekme İçeriği (Misyonumuz - TR)</label>
                                <textarea name="about_mission" rows="4" class="form-control">{{ old('about_mission', $settings['about_mission'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">3. Sekme Başlığı (TR)</label>
                                <input type="text" name="about_tab_3_title" class="form-control mb-2" value="{{ old('about_tab_3_title', $settings['about_tab_3_title'] ?? 'Vizyonumuz') }}">
                                <label class="form-label">3. Sekme İçeriği (Vizyonumuz - TR)</label>
                                <textarea name="about_vision" rows="4" class="form-control">{{ old('about_vision', $settings['about_vision'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Onay Maddesi 1 (Tik İkonlu - TR)</label>
                                <input type="text" name="about_check_1" class="form-control" value="{{ old('about_check_1', $settings['about_check_1'] ?? 'Kalite Kontrol Sistemi') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Onay Maddesi 2 (Tik İkonlu - TR)</label>
                                <input type="text" name="about_check_2" class="form-control" value="{{ old('about_check_2', $settings['about_check_2'] ?? 'Yüksek Standartlı Endüstriyel Üretim') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Buton Yazısı (TR)</label>
                                <input type="text" name="about_button_text" class="form-control" value="{{ old('about_button_text', $settings['about_button_text'] ?? 'İletişime Geç') }}">
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH TAB -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Subtitle / Breadcrumb Title (EN)</label>
                                <input type="text" name="about_subtitle_en" class="form-control" value="{{ old('about_subtitle_en', $settings['about_subtitle_en'] ?? 'About Us') }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">Main Heading / Slogan (EN)</label>
                                <input type="text" name="about_title_en" class="form-control" value="{{ old('about_title_en', $settings['about_title_en'] ?? '') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description Paragraph (EN)</label>
                                <textarea name="about_description_en" rows="2" class="form-control">{{ old('about_description_en', $settings['about_description_en'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Tab 1 Title (EN)</label>
                                <input type="text" name="about_tab_1_title_en" class="form-control mb-2" value="{{ old('about_tab_1_title_en', $settings['about_tab_1_title_en'] ?? 'Our History') }}">
                                <label class="form-label">Tab 1 Content (Our History - EN)</label>
                                <textarea name="about_history_en" rows="4" class="form-control">{{ old('about_history_en', $settings['about_history_en'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Tab 2 Title (EN)</label>
                                <input type="text" name="about_tab_2_title_en" class="form-control mb-2" value="{{ old('about_tab_2_title_en', $settings['about_tab_2_title_en'] ?? 'Our Mission') }}">
                                <label class="form-label">Tab 2 Content (Our Mission - EN)</label>
                                <textarea name="about_mission_en" rows="4" class="form-control">{{ old('about_mission_en', $settings['about_mission_en'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Tab 3 Title (EN)</label>
                                <input type="text" name="about_tab_3_title_en" class="form-control mb-2" value="{{ old('about_tab_3_title_en', $settings['about_tab_3_title_en'] ?? 'Our Vision') }}">
                                <label class="form-label">Tab 3 Content (Our Vision - EN)</label>
                                <textarea name="about_vision_en" rows="4" class="form-control">{{ old('about_vision_en', $settings['about_vision_en'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Checkmark Item 1 (EN)</label>
                                <input type="text" name="about_check_1_en" class="form-control" value="{{ old('about_check_1_en', $settings['about_check_1_en'] ?? 'Quality Control System') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Checkmark Item 2 (EN)</label>
                                <input type="text" name="about_check_2_en" class="form-control" value="{{ old('about_check_2_en', $settings['about_check_2_en'] ?? 'Building Quality Industrial') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Button Text (EN)</label>
                                <input type="text" name="about_button_text_en" class="form-control" value="{{ old('about_button_text_en', $settings['about_button_text_en'] ?? 'Explore More') }}">
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC TAB -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">العنوان الفرعي (AR)</label>
                                <input type="text" dir="rtl" name="about_subtitle_ar" class="form-control" value="{{ old('about_subtitle_ar', $settings['about_subtitle_ar'] ?? 'من نحن') }}">
                            </div>
                            <div class="col-md-8">
                                <label class="form-label">العنوان الرئيسي (AR)</label>
                                <input type="text" dir="rtl" name="about_title_ar" class="form-control" value="{{ old('about_title_ar', $settings['about_title_ar'] ?? '') }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">الوصف المختصر (AR)</label>
                                <textarea dir="rtl" name="about_description_ar" rows="2" class="form-control">{{ old('about_description_ar', $settings['about_description_ar'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">عنوان التبويب 1 (AR)</label>
                                <input type="text" dir="rtl" name="about_tab_1_title_ar" class="form-control mb-2" value="{{ old('about_tab_1_title_ar', $settings['about_tab_1_title_ar'] ?? 'تاريخنا') }}">
                                <label class="form-label">محتوى التبويب 1 (تاريخنا - AR)</label>
                                <textarea dir="rtl" name="about_history_ar" rows="4" class="form-control">{{ old('about_history_ar', $settings['about_history_ar'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">عنوان التبويب 2 (AR)</label>
                                <input type="text" dir="rtl" name="about_tab_2_title_ar" class="form-control mb-2" value="{{ old('about_tab_2_title_ar', $settings['about_tab_2_title_ar'] ?? 'مهمتنا') }}">
                                <label class="form-label">محتوى التبويب 2 (مهمتنا - AR)</label>
                                <textarea dir="rtl" name="about_mission_ar" rows="4" class="form-control">{{ old('about_mission_ar', $settings['about_mission_ar'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">عنوان التبويب 3 (AR)</label>
                                <input type="text" dir="rtl" name="about_tab_3_title_ar" class="form-control mb-2" value="{{ old('about_tab_3_title_ar', $settings['about_tab_3_title_ar'] ?? 'رؤيتنا') }}">
                                <label class="form-label">محتوى التبويب 3 (رؤيتنا - AR)</label>
                                <textarea dir="rtl" name="about_vision_ar" rows="4" class="form-control">{{ old('about_vision_ar', $settings['about_vision_ar'] ?? '') }}</textarea>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">ميزة 1 (AR)</label>
                                <input type="text" dir="rtl" name="about_check_1_ar" class="form-control" value="{{ old('about_check_1_ar', $settings['about_check_1_ar'] ?? 'نظام مراقبة الجودة') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">ميزة 2 (AR)</label>
                                <input type="text" dir="rtl" name="about_check_2_ar" class="form-control" value="{{ old('about_check_2_ar', $settings['about_check_2_ar'] ?? 'إنتاج صناعي عالي الجودة') }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">نص الزر (AR)</label>
                                <input type="text" dir="rtl" name="about_button_text_ar" class="form-control" value="{{ old('about_button_text_ar', $settings['about_button_text_ar'] ?? 'تواصل معنا') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end">
                    <button type="submit" class="btn-tk-primary px-4 py-2">
                        <i class="ri-save-line"></i>
                        <span>Hakkımızda Sayfasını Kaydet</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

