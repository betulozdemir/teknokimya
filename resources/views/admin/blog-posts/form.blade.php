@extends('admin.layouts.app')

@section('title', $blogPost->exists ? 'Blog Yazısı Düzenle' : 'Yeni Blog Yazısı Ekle')
@section('page_title', $blogPost->exists ? 'Blog Yazısı Düzenle' : 'Yeni Blog Yazısı Ekle')
@section('page_subtitle', 'Haber ve blog yazısı detaylarını 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $blogPost->exists ? 'Blog Yazısını Güncelle' : 'Yeni Blog Yazısı Oluştur' }}</h6>
            <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $blogPost->exists ? route('admin.blog-posts.update', $blogPost) : route('admin.blog-posts.store') }}" enctype="multipart/form-data">
                @csrf
                @if($blogPost->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">🇹🇷 Yazı Başlığı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $blogPost->title) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">🇹🇷 Kategori (TR) *</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $blogPost->category) }}" required placeholder="Endüstriyel Kimya">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Kısa Özet (Excerpt - TR)</label>
                                <textarea name="excerpt" rows="2" class="form-control">{{ old('excerpt', $blogPost->excerpt) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Detaylı Yazı İçeriği (HTML / Rich Content - TR)</label>
                                <textarea name="content" rows="6" class="form-control" placeholder="Paragraflarınızı veya detaylı blog içeriğinizi girin...">{{ old('content', $blogPost->content) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">🇬🇧 Post Title (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $blogPost->getTranslation('en', 'title')) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">🇬🇧 Category (EN)</label>
                                <input type="text" name="translations[en][category]" class="form-control" value="{{ old('translations.en.category', $blogPost->getTranslation('en', 'category')) }}" placeholder="Industrial Chemistry">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Short Excerpt (EN)</label>
                                <textarea name="translations[en][excerpt]" rows="2" class="form-control">{{ old('translations.en.excerpt', $blogPost->getTranslation('en', 'excerpt')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Detailed Content (HTML / Rich Content - EN)</label>
                                <textarea name="translations[en][content]" rows="6" class="form-control" placeholder="Detailed blog post content...">{{ old('translations.en.content', $blogPost->getTranslation('en', 'content')) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-8">
                                <label class="form-label">🇸🇦 عنوان المقال (Post Title - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $blogPost->getTranslation('ar', 'title')) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">🇸🇦 الفئة (Category - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][category]" class="form-control" value="{{ old('translations.ar.category', $blogPost->getTranslation('ar', 'category')) }}">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 ملخص قصير (Excerpt - AR)</label>
                                <textarea dir="rtl" name="translations[ar][excerpt]" rows="2" class="form-control">{{ old('translations.ar.excerpt', $blogPost->getTranslation('ar', 'excerpt')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 محتوى المقال المفصل (Detailed Content - AR)</label>
                                <textarea dir="rtl" name="translations[ar][content]" rows="6" class="form-control">{{ old('translations.ar.content', $blogPost->getTranslation('ar', 'content')) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Kapak Fotoğrafı *</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper">
                                    <img id="blog-photo-preview" src="{{ asset(old('image', $blogPost->image ?: 'assets/images/blog/blog-thumb-11.png')) }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="blog_image_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="blog_image_file" name="image_file" class="d-none photo-file-input" accept="image/*" data-preview="#blog-photo-preview" data-filename="#blog-file-name">
                                        <span id="blog-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="image" class="form-control" value="{{ old('image', $blogPost->image) }}" placeholder="assets/images/blog/blog-thumb-11.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Yazar *</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author', $blogPost->author) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Yayın Tarihi</label>
                        <input type="text" name="published_date" class="form-control" value="{{ old('published_date', $blogPost->published_date) }}" placeholder="Feb 8, 2024">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Etiketler (Virgülle ayırın)</label>
                        <input type="text" name="tags" class="form-control" value="{{ old('tags', $blogPost->tags) }}" placeholder="Kimya, Galvano, Kaplama, Sanayi">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $blogPost->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $blogPost->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_featured">Sol Büyük Kart</label>
                        </div>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $blogPost->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

