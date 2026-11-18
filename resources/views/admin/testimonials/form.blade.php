@extends('admin.layouts.app')

@section('title', $testimonial->exists ? 'Yorum Düzenle' : 'Yeni Yorum Ekle')
@section('page_title', $testimonial->exists ? 'Yorum Düzenle' : 'Yeni Yorum Ekle')
@section('page_subtitle', 'Müşteri değerlendirme kartı bilgilerini 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $testimonial->exists ? 'Yorum Bilgilerini Güncelle' : 'Yeni Yorum Oluştur' }}</h6>
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" enctype="multipart/form-data">
                @csrf
                @if($testimonial->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Yorum Başlığı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $testimonial->title) }}" required placeholder="Harika İş Ortağı!">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Müşteri Adı Soyadı (TR) *</label>
                                <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $testimonial->client_name) }}" required placeholder="Abdur Rashid">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Müşteri Unvanı / Şirketi (TR) *</label>
                                <input type="text" name="client_designation" class="form-control" value="{{ old('client_designation', $testimonial->client_designation) }}" required placeholder="Kurucu & CEO">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Yorum Metni (TR) *</label>
                                <textarea name="comment" rows="3" class="form-control" required>{{ old('comment', $testimonial->comment) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Review Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $testimonial->getTranslation('en', 'title')) }}" placeholder="Best Company!">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Client Designation / Role (EN)</label>
                                <input type="text" name="translations[en][client_designation]" class="form-control" value="{{ old('translations.en.client_designation', $testimonial->getTranslation('en', 'client_designation')) }}" placeholder="Founder & CEO">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Review Comment (EN)</label>
                                <textarea name="translations[en][comment]" rows="3" class="form-control">{{ old('translations.en.comment', $testimonial->getTranslation('en', 'comment')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 عنوان التقييم (Review Title - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $testimonial->getTranslation('ar', 'title')) }}" placeholder="أفضل شركة!">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 المسمى الوظيفي للعميل (Designation - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][client_designation]" class="form-control" value="{{ old('translations.ar.client_designation', $testimonial->getTranslation('ar', 'client_designation')) }}" placeholder="المؤسس والرئيس التنفيذي">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 نص التقييم (Comment - AR)</label>
                                <textarea dir="rtl" name="translations[ar][comment]" rows="3" class="form-control">{{ old('translations.ar.comment', $testimonial->getTranslation('ar', 'comment')) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Müşteri Avatar Fotoğrafı *</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper" style="width: 96px; height: 96px; border-radius: 50%;">
                                    <img id="testimonial-photo-preview" src="{{ asset(old('avatar', $testimonial->avatar ?: 'assets/images/user/user-thumb-01.png')) }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="testimonial_avatar_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="testimonial_avatar_file" name="avatar_file" class="d-none photo-file-input" accept="image/*" data-preview="#testimonial-photo-preview" data-filename="#testimonial-file-name">
                                        <span id="testimonial-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="avatar" class="form-control" value="{{ old('avatar', $testimonial->avatar) }}" placeholder="assets/images/user/user-thumb-01.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Yıldız Puanı (1-5) *</label>
                        <input type="number" name="rating" class="form-control" value="{{ old('rating', $testimonial->rating) }}" required min="1" max="5">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $testimonial->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $testimonial->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif Göster</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

