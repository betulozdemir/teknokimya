@extends('admin.layouts.app')

@section('title', $product->exists ? 'Ürün Düzenle' : 'Yeni Ürün Ekle')
@section('page_title', $product->exists ? 'Ürün Düzenle' : 'Yeni Ürün Ekle')
@section('page_subtitle', 'Laboratuvar ürün ve portfolyo kartı bilgilerini 3 dilde (TR / EN / AR) doldurun')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">{{ $product->exists ? 'Ürün Bilgilerini Güncelle' : 'Yeni Ürün Oluştur' }}</h6>
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary rounded-3">
                <i class="ri-arrow-left-line"></i> Listeye Dön
            </a>
        </div>
        <div class="card-modern-body">
            <form method="POST" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                @if($product->exists)
                    @method('PUT')
                @endif

                @include('admin.partials.lang-tabs')

                <div class="tab-content mb-4">
                    <!-- TURKISH -->
                    <div class="tab-pane fade show active" id="tab-tr" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇹🇷 Ürün Adı (TR) *</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $product->title) }}" required placeholder="Electron Microscope">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇹🇷 Kategori Etiketi (TR) *</label>
                                <input type="text" name="category" class="form-control" value="{{ old('category', $product->category) }}" required placeholder="Laboratory">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇹🇷 Kısa Açıklama (TR)</label>
                                <textarea name="description" rows="2" class="form-control">{{ old('description', $product->description) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                @include('admin.products.partials.groups-repeater', [
                                    'locale' => 'tr',
                                    'prefix' => 'process_groups',
                                    'groups' => old('process_groups', $product->process_groups ?? []),
                                    'headerTitle' => '🇹🇷 İç İçe Proses Grupları & Ürün Tablosu (TR)',
                                    'subTitle' => 'Bu ana kategorinin altında yer alacak alt proses başlıklarını ve ürün kodlarını aşağıdaki görsel tablodan ekleyin.',
                                    'addGroupBtnText' => '+ Yeni Proses Grubu (Alt Kategori) Ekle',
                                    'groupNumberLabel' => 'Proses Grubu (Alt Kategori)',
                                    'titleInputLabel' => '🇹🇷 Proses / Alt Kategori Başlığı *',
                                    'titlePlaceholder' => 'Örn: Siyanürlü Bakır Kaplama Prosesleri',
                                    'tableLabel' => 'Ürünler Tablosu (Ürün Kodu & Açıklama)',
                                    'addItemBtnText' => '+ Ürün Satırı Ekle',
                                    'colCode' => 'ÜRÜN KODU',
                                    'colDesc' => 'AÇIKLAMA',
                                    'colAction' => 'SİL',
                                    'codePlaceholder' => 'Örn: TK200 SBP',
                                    'descPlaceholder' => 'Ürünün teknik açıklaması ve özellikleri...',
                                    'deleteGroupText' => 'Bu Grubu Sil',
                                ])
                            </div>
                        </div>
                    </div>

                    <!-- ENGLISH -->
                    <div class="tab-pane fade" id="tab-en" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Product Name (EN)</label>
                                <input type="text" name="translations[en][title]" class="form-control" value="{{ old('translations.en.title', $product->getTranslation('en', 'title')) }}" placeholder="Copper Plating">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇬🇧 Category Tag (EN)</label>
                                <input type="text" name="translations[en][category]" class="form-control" value="{{ old('translations.en.category', $product->getTranslation('en', 'category')) }}" placeholder="Our Products">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇬🇧 Short Description (EN)</label>
                                <textarea name="translations[en][description]" rows="2" class="form-control">{{ old('translations.en.description', $product->getTranslation('en', 'description')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                @include('admin.products.partials.groups-repeater', [
                                    'locale' => 'en',
                                    'prefix' => 'translations[en][process_groups]',
                                    'groups' => old('translations.en.process_groups', $product->translations['en']['process_groups'] ?? []),
                                    'headerTitle' => '🇬🇧 Nested Process Groups & Products Table (EN)',
                                    'subTitle' => 'Add process sub-categories and their product codes & descriptions for the English catalog.',
                                    'addGroupBtnText' => '+ Add New Process Group',
                                    'groupNumberLabel' => 'Process Group (Subcategory)',
                                    'titleInputLabel' => '🇬🇧 Process / Subcategory Title',
                                    'titlePlaceholder' => 'e.g. Cyanide Copper Plating Processes',
                                    'tableLabel' => 'Products Table (Product Code & Description)',
                                    'addItemBtnText' => '+ Add Product Row',
                                    'colCode' => 'PRODUCT CODE',
                                    'colDesc' => 'DESCRIPTION',
                                    'colAction' => 'DELETE',
                                    'codePlaceholder' => 'e.g. TK200 SBP',
                                    'descPlaceholder' => 'Product technical description...',
                                    'deleteGroupText' => 'Delete Group',
                                ])
                            </div>
                        </div>
                    </div>

                    <!-- ARABIC -->
                    <div class="tab-pane fade" id="tab-ar" role="tabpanel">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 اسم المنتج (Product Name - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][title]" class="form-control" value="{{ old('translations.ar.title', $product->getTranslation('ar', 'title')) }}" placeholder="طلاء النحاس">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">🇸🇦 الفئة (Category - AR)</label>
                                <input type="text" dir="rtl" name="translations[ar][category]" class="form-control" value="{{ old('translations.ar.category', $product->getTranslation('ar', 'category')) }}" placeholder="منتجاتنا">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">🇸🇦 الوصف (Description - AR)</label>
                                <textarea dir="rtl" name="translations[ar][description]" rows="2" class="form-control">{{ old('translations.ar.description', $product->getTranslation('ar', 'description')) }}</textarea>
                            </div>
                            <div class="col-md-12">
                                @include('admin.products.partials.groups-repeater', [
                                    'locale' => 'ar',
                                    'prefix' => 'translations[ar][process_groups]',
                                    'groups' => old('translations.ar.process_groups', $product->translations['ar']['process_groups'] ?? []),
                                    'headerTitle' => '🇸🇦 مجموعات العمليات وجداول المنتجات (AR)',
                                    'subTitle' => 'أضف مجموعات العمليات الفرعية ورموز المنتجات وأوصافها للنسخة العربية.',
                                    'addGroupBtnText' => '+ إضافة مجموعة عمليات جديدة',
                                    'groupNumberLabel' => 'مجموعة العمليات',
                                    'titleInputLabel' => '🇸🇦 عنوان مجموعة العمليات الفرعية',
                                    'titlePlaceholder' => 'مثال: عمليات طلاء النحاس بالسيانيد',
                                    'tableLabel' => 'جدول المنتجات (رمز المنتج والوصف)',
                                    'addItemBtnText' => '+ إضافة منتج',
                                    'colCode' => 'رمز المنتج',
                                    'colDesc' => 'الوصف',
                                    'colAction' => 'حذف',
                                    'codePlaceholder' => 'مثال: TK200 SBP',
                                    'descPlaceholder' => 'الوصف الفني للمنتج...',
                                    'deleteGroupText' => 'حذف المجموعة',
                                ])
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row g-4">
                    <div class="col-md-12">
                        <label class="form-label">Ürün Fotoğrafı *</label>
                        <div class="photo-upload-card">
                            <div class="d-flex flex-column flex-md-row align-items-md-center gap-3">
                                <div class="photo-preview-wrapper">
                                    <img id="product-photo-preview" src="{{ asset(old('image', $product->image ?: 'assets/images/portfolio/portfolio-thumb-21.png')) }}" alt="Önizleme">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                                        <label for="product_image_file" class="btn btn-sm btn-tk-primary mb-0" style="cursor: pointer;">
                                            <i class="ri-upload-cloud-2-line"></i>
                                            <span>Bilgisayardan Fotoğraf Seç</span>
                                        </label>
                                        <input type="file" id="product_image_file" name="image_file" class="d-none photo-file-input" accept="image/*" data-preview="#product-photo-preview" data-filename="#product-file-name">
                                        <span id="product-file-name" class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25 d-none"></span>
                                    </div>
                                    <div class="text-secondary small mb-2">PNG, JPG veya WEBP formatında ürün fotoğrafı yükleyebilir veya aşağıdan mevcut görsel yolunu kullanabilirsiniz.</div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text bg-white text-secondary"><i class="ri-folder-image-line"></i></span>
                                        <input type="text" name="image" class="form-control" value="{{ old('image', $product->image) }}" placeholder="assets/images/portfolio/portfolio-thumb-21.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Sıralama *</label>
                        <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $product->sort_order) }}" required min="0">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_featured">Öne Çıkan</label>
                        </div>
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch mb-2">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold ms-1" for="is_active">Aktif</label>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light rounded-3 px-4">İptal</a>
                    <button type="submit" class="btn-tk-primary">
                        <i class="ri-save-line"></i>
                        <span>Kaydet</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

@push('styles')
<style>
    .border-dashed {
        border-style: dashed !important;
        border-width: 2px !important;
    }
    .group-card {
        transition: all 0.2s ease;
    }
    .group-card:hover {
        border-color: #cbd5e1 !important;
    }
    .btn-xs {
        padding: 0.2rem 0.45rem;
        font-size: 0.75rem;
        border-radius: 0.25rem;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Photo preview
        const photoInput = document.getElementById('product_image_file');
        const photoPreview = document.getElementById('product-photo-preview');
        if (photoInput && photoPreview) {
            photoInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        photoPreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Nested Group Repeaters
        document.querySelectorAll('.tk-groups-repeater').forEach(function (repeater) {
            const locale = repeater.dataset.locale;
            const prefix = repeater.dataset.prefix;
            const container = repeater.querySelector('.groups-container');

            function updateLabels() {
                container.querySelectorAll('.group-card').forEach((card, idx) => {
                    const label = card.querySelector('.group-order-label');
                    if (label) {
                        label.textContent = (idx + 1) + '. ' + (locale === 'en' ? 'Process Group' : (locale === 'ar' ? 'مجموعة العمليات' : 'Proses Grubu (Alt Kategori)'));
                    }
                });
            }

            // Add New Group
            repeater.querySelectorAll('.btn-add-group').forEach(btn => {
                btn.addEventListener('click', function () {
                    const gIdx = Date.now();
                    const groupCount = container.querySelectorAll('.group-card').length + 1;
                    const isTr = (locale === 'tr');
                    const isAr = (locale === 'ar');

                    const titlePlaceholder = isTr ? 'Örn: Siyanürlü Bakır Kaplama Prosesleri' : (isAr ? 'مثال: عمليات طلاء النحاس بالسيانيد' : 'e.g. Cyanide Copper Plating Processes');
                    const titleLabel = isTr ? '🇹🇷 Proses / Alt Kategori Başlığı *' : (isAr ? '🇸🇦 عنوان مجموعة العمليات الفرعية' : '🇬🇧 Process / Subcategory Title');
                    const deleteText = isTr ? 'Bu Grubu Sil' : (isAr ? 'حذف المجموعة' : 'Delete Group');
                    const tableText = isTr ? 'Ürünler Tablosu (Ürün Kodu & Açıklama)' : (isAr ? 'جدول المنتجات (رمز المنتج والوصف)' : 'Products Table (Product Code & Description)');
                    const addRowText = isTr ? '+ Ürün Satırı Ekle' : (isAr ? '+ إضافة منتج' : '+ Add Product Row');
                    const colCode = isTr ? 'ÜRÜN KODU' : (isAr ? 'رمز المنتج' : 'PRODUCT CODE');
                    const colDesc = isTr ? 'AÇIKLAMA' : (isAr ? 'الوصف' : 'DESCRIPTION');
                    const colAction = isTr ? 'SİL' : (isAr ? 'حذف' : 'DELETE');
                    const codePlaceholder = 'Örn: TK... SBP';
                    const descPlaceholder = isTr ? 'Ürünün teknik açıklaması ve özellikleri...' : (isAr ? 'الوصف الفني للمنتج...' : 'Product technical description...');

                    const cardHtml = `
                        <div class="group-card card border shadow-xs" data-group-index="${gIdx}">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                                <span class="fw-bold text-secondary small">
                                    <i class="ri-folder-line text-primary me-1"></i> <span class="group-order-label">${groupCount}. ${isTr ? 'Proses Grubu (Alt Kategori)' : (isAr ? 'مجموعة العمليات' : 'Process Group')}</span>
                                </span>
                                <button type="button" class="btn btn-sm text-danger btn-remove-group p-0" title="${deleteText}">
                                    <i class="ri-delete-bin-line"></i> ${deleteText}
                                </button>
                            </div>
                            <div class="card-body p-3">
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">${titleLabel}</label>
                                    <input type="text" 
                                           name="${prefix}[${gIdx}][title]" 
                                           class="form-control form-control-sm group-title-input" 
                                           value="" 
                                           placeholder="${titlePlaceholder}" 
                                           ${isTr ? 'required' : ''}>
                                </div>

                                <div class="products-table-wrapper border rounded-2 p-2 bg-white">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="small fw-bold text-muted">
                                            <i class="ri-table-line text-info me-1"></i> ${tableText}
                                        </span>
                                        <button type="button" class="btn btn-xs btn-outline-success btn-add-item py-1 px-2" style="font-size: 12px;">
                                            <i class="ri-add-line"></i> ${addRowText}
                                        </button>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered align-middle mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th style="width: 28%; font-size: 12px;" class="py-1">${colCode}</th>
                                                    <th style="font-size: 12px;" class="py-1">${colDesc}</th>
                                                    <th style="width: 50px; text-align: center; font-size: 12px;" class="py-1">${colAction}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="items-tbody">
                                                <tr data-item-index="0">
                                                    <td>
                                                        <input type="text" 
                                                               name="${prefix}[${gIdx}][items][0][code]" 
                                                               class="form-control form-control-sm" 
                                                               value="" 
                                                               placeholder="${codePlaceholder}">
                                                    </td>
                                                    <td>
                                                        <textarea name="${prefix}[${gIdx}][items][0][description]" 
                                                                  class="form-control form-control-sm" 
                                                                  rows="2" 
                                                                  placeholder="${descPlaceholder}"></textarea>
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-sm btn-outline-danger btn-remove-item p-1" title="Satırı Sil">
                                                            <i class="ri-close-line"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    const temp = document.createElement('div');
                    temp.innerHTML = cardHtml.trim();
                    const newCard = temp.firstElementChild;
                    container.appendChild(newCard);
                    updateLabels();

                    const titleInput = newCard.querySelector('.group-title-input');
                    if (titleInput) titleInput.focus();
                });
            });

            // Delegate events for Remove Group, Add Item, Remove Item
            container.addEventListener('click', function (e) {
                // Remove group
                const removeGroupBtn = e.target.closest('.btn-remove-group');
                if (removeGroupBtn) {
                    const card = removeGroupBtn.closest('.group-card');
                    if (container.querySelectorAll('.group-card').length > 1) {
                        if (confirm('Bu proses grubunu ve ürünlerini silmek istediğinize emin misiniz?')) {
                            card.remove();
                            updateLabels();
                        }
                    } else {
                        card.querySelectorAll('input, textarea').forEach(el => el.value = '');
                    }
                    return;
                }

                // Add item row
                const addItemBtn = e.target.closest('.btn-add-item');
                if (addItemBtn) {
                    const card = addItemBtn.closest('.group-card');
                    const gIdx = card.dataset.groupIndex;
                    const tbody = card.querySelector('.items-tbody');
                    const iIdx = Date.now();

                    const trHtml = `
                        <tr data-item-index="${iIdx}">
                            <td>
                                <input type="text" 
                                       name="${prefix}[${gIdx}][items][${iIdx}][code]" 
                                       class="form-control form-control-sm" 
                                       value="" 
                                       placeholder="Örn: TK... SBP">
                            </td>
                            <td>
                                <textarea name="${prefix}[${gIdx}][items][${iIdx}][description]" 
                                          class="form-control form-control-sm" 
                                          rows="2" 
                                          placeholder="Ürün açıklaması..."></textarea>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-danger btn-remove-item p-1" title="Satırı Sil">
                                    <i class="ri-close-line"></i>
                                </button>
                            </td>
                        </tr>
                    `;
                    const temp = document.createElement('tbody');
                    temp.innerHTML = trHtml.trim();
                    const newTr = temp.firstElementChild;
                    tbody.appendChild(newTr);

                    const codeInput = newTr.querySelector('input');
                    if (codeInput) codeInput.focus();
                    return;
                }

                // Remove item row
                const removeItemBtn = e.target.closest('.btn-remove-item');
                if (removeItemBtn) {
                    const tr = removeItemBtn.closest('tr');
                    const tbody = tr.closest('tbody');
                    if (tbody.querySelectorAll('tr').length > 1) {
                        tr.remove();
                    } else {
                        tr.querySelectorAll('input, textarea').forEach(el => el.value = '');
                    }
                    return;
                }
            });
        });
    });
</script>
@endpush
@endsection
