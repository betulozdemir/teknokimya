@extends('admin.layouts.app')

@section('title', $service->exists ? 'Hizmet Düzenle' : 'Yeni Hizmet Ekle')
@section('page_title', $service->exists ? 'Hizmet Düzenle' : 'Yeni Hizmet Ekle')
@section('page_subtitle', 'Laboratuvar hizmet kartı detaylarını 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $service->exists ? 'Hizmet Bilgilerini Güncelle' : 'Yeni Hizmet Oluştur' }}</h6>
            <a href="{{ route('admin.services.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $service->exists ? route('admin.services.update', $service) : route('admin.services.store') }}" enctype="multipart/form-data">
                @csrf
                @if($service->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Hizmet Başlığı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required placeholder="Mechanical Engineering">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Kısa Açıklama (TR)</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $service->description) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Detaylı Açıklama / İç Sayfa Metni (TR)</label>
                                <textarea name="translations[tr][content]" rows="4" class="form-control" placeholder="Hizmet detay sayfasında gösterilecek detaylı açıklama metni...">{{ old('translations.tr.content', $service->getTranslation('tr', 'content')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Service Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $service->getTranslation('en', 'title')) }}" placeholder="Mechanical Engineering">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Short Description (EN)</label>
                                <textarea name="translations[en][description]" rows="3" class="form-control">{{ old('translations.en.description', $service->getTranslation('en', 'description')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Detailed Content / Inner Page Text (EN)</label>
                                <textarea name="translations[en][content]" rows="4" class="form-control" placeholder="Detailed content shown on the service details page...">{{ old('translations.en.content', $service->getTranslation('en', 'content')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 عنوان الخدمة (Service Title - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $service->getTranslation('ar', 'title')) }}" placeholder="الهندسة الميكانيكية">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 وصف قصير (Description - AR)</label>
                                <textarea dir="rtl" name="translations[ar][description]" rows="3" class="form-control">{{ old('translations.ar.description', $service->getTranslation('ar', 'description')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 تفاصيل الخدمة (Detailed Content - AR)</label>
                                <textarea dir="rtl" name="translations[ar][content]" rows="4" class="form-control" placeholder="النص التفصيلي للخدمة...">{{ old('translations.ar.content', $service->getTranslation('ar', 'content')) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Hizmet Fotoğrafı</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper">
                                    <img id="service-photo-preview" src="{{ asset(old('image', $service->image ?: 'assets/images/services/services-thumb-17.png')) }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="service_image_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="service_image_file" name="image_file" class="d-none photo-file-input" accept="image/*" data-preview="#service-photo-preview" data-filename="#service-file-name">
                                        <span id="service-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="text-secondary small mb-2">PNG, JPG veya WEBP formatında fotoğraf yükleyebilir veya aşağıdan mevcut görsel yolunu kullanabilirsiniz.</div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="image" class="form-control" value="{{ old('image', $service->image) }}" placeholder="assets/images/services/services-thumb-17.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Hedef Link (URL)</label>
                        <input type="text" name="url" class="form-control" value="{{ old('url', $service->url) }}" placeholder="#services">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif Göster</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.services.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
