@extends('admin.layouts.app')

@section('title', $teamMember->exists ? 'Ekip Üyesi Düzenle' : 'Yeni Ekip Üyesi Ekle')
@section('page_title', $teamMember->exists ? 'Ekip Üyesi Düzenle' : 'Yeni Ekip Üyesi Ekle')
@section('page_subtitle', 'Uzman kadro ve mühendis kartı bilgilerini 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $teamMember->exists ? 'Ekip Üyesi Bilgilerini Güncelle' : 'Yeni Ekip Üyesi Oluştur' }}</h6>
            <a href="{{ route('admin.team-members.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $teamMember->exists ? route('admin.team-members.update', $teamMember) : route('admin.team-members.store') }}" enctype="multipart/form-data">
                @csrf
                @if($teamMember->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇹🇷 Ad Soyad (TR) *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $teamMember->name) }}" required placeholder="Peter Hase">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇹🇷 Unvan / Görev (TR) *</label>
                                <input type="text" name="designation" class="form-control" value="{{ old('designation', $teamMember->designation) }}" required placeholder="Kıdemli Kimya Mühendisi">
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Full Name (EN)</label>
                                <input type="text" name="translations[en][name]" class="form-control" value="{{ old('translations.en.name', $teamMember->getTranslation('en', 'name')) }}" placeholder="Peter Hase">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Designation / Role (EN)</label>
                                <input type="text" name="translations[en][designation]" class="form-control" value="{{ old('translations.en.designation', $teamMember->getTranslation('en', 'designation')) }}" placeholder="Sr. Chemical Engineer">
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 الاسم الكامل (Name - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][name]" class="form-control" value="{{ old('translations.ar.name', $teamMember->getTranslation('ar', 'name')) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 المسمى الوظيفي (Designation - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][designation]" class="form-control" value="{{ old('translations.ar.designation', $teamMember->getTranslation('ar', 'designation')) }}" placeholder="مهندس كيميائي أول">
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Profil Fotoğrafı *</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper">
                                    <img id="team-photo-preview" src="{{ asset(old('image', $teamMember->image ?: 'assets/images/team/team-thumb-01.png')) }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="team_image_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="team_image_file" name="image_file" class="d-none photo-file-input" accept="image/*" data-preview="#team-photo-preview" data-filename="#team-file-name">
                                        <span id="team-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="text-secondary small mb-2">PNG, JPG veya WEBP formatında fotoğraf yükleyebilir veya aşağıdan mevcut görsel yolunu kullanabilirsiniz.</div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="image" class="form-control" value="{{ old('image', $teamMember->image) }}" placeholder="assets/images/team/team-thumb-01.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">X (Twitter) URL</label>
                        <input type="text" name="twitter_url" class="form-control" value="{{ old('twitter_url', $teamMember->twitter_url) }}" placeholder="#">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Facebook URL</label>
                        <input type="text" name="facebook_url" class="form-control" value="{{ old('facebook_url', $teamMember->facebook_url) }}" placeholder="#">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="text" name="linkedin_url" class="form-control" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}" placeholder="#">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $teamMember->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif Göster</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.team-members.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
