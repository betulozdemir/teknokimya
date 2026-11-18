<div class="tk-groups-repeater" data-locale="{{ $locale }}" data-prefix="{{ $prefix }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h6 class="fw-bold mb-1 text-dark">
                <i class="ri-node-tree text-primary me-1"></i> {{ $headerTitle ?? 'İç İçe Proses Grupları & Ürün Tablosu' }}
            </h6>
            <small class="text-muted">{{ $subTitle ?? 'Bu ana kategorinin altında yer alacak alt proses başlıklarını ve bunlara ait ürünleri (kod ve açıklama olarak) buradan kolayca ekleyebilirsiniz.' }}</small>
        </div>
        <button type="button" class="btn btn-sm btn-outline-primary btn-add-group">
            <i class="ri-add-line"></i> {{ $addGroupBtnText ?? '+ Yeni Proses Grubu Ekle' }}
        </button>
    </div>

    <!-- Container for all group cards -->
    <div class="groups-container d-flex flex-column gap-3 mb-3">
        @php
            $groupList = (!empty($groups) && is_array($groups)) ? $groups : [];
        @endphp

        @forelse($groupList as $gIdx => $group)
            <div class="group-card card border shadow-xs" data-group-index="{{ $gIdx }}">
                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                    <span class="fw-bold text-secondary small">
                        <i class="ri-folder-line text-primary me-1"></i> <span class="group-order-label">{{ $gIdx + 1 }}. {{ $groupNumberLabel ?? 'Proses Grubu (Alt Kategori)' }}</span>
                    </span>
                    <button type="button" class="btn btn-sm text-danger btn-remove-group p-0" title="Bu Grubu Sil">
                        <i class="ri-delete-bin-line"></i> {{ $deleteGroupText ?? 'Grubu Sil' }}
                    </button>
                </div>
                <div class="card-body p-3">
                    <!-- Group Title Input -->
                    <div class="mb-3">
                        <label class="form-label small fw-bold">{{ $titleInputLabel ?? 'Proses / Alt Kategori Başlığı *' }}</label>
                        <input type="text" 
                               name="{{ $prefix }}[{{ $gIdx }}][title]" 
                               class="form-control form-control-sm group-title-input" 
                               value="{{ $group['title'] ?? '' }}" 
                               placeholder="{{ $titlePlaceholder ?? 'Örn: Siyanürlü Bakır Kaplama Prosesleri' }}" 
                               {{ $locale === 'tr' ? 'required' : '' }}>
                    </div>

                    <!-- Products Table -->
                    <div class="products-table-wrapper border rounded-2 p-2 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-bold text-muted">
                                <i class="ri-table-line text-info me-1"></i> {{ $tableLabel ?? 'Ürünler Tablosu (Ürün Kodu & Açıklama)' }}
                            </span>
                            <button type="button" class="btn btn-xs btn-outline-success btn-add-item py-1 px-2" style="font-size: 12px;">
                                <i class="ri-add-line"></i> {{ $addItemBtnText ?? '+ Ürün Ekle' }}
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 28%; font-size: 12px;" class="py-1">{{ $colCode ?? 'ÜRÜN KODU' }}</th>
                                        <th style="font-size: 12px;" class="py-1">{{ $colDesc ?? 'AÇIKLAMA' }}</th>
                                        <th style="width: 50px; text-align: center; font-size: 12px;" class="py-1">{{ $colAction ?? 'SİL' }}</th>
                                    </tr>
                                </thead>
                                <tbody class="items-tbody">
                                    @php
                                        $itemList = (!empty($group['items']) && is_array($group['items'])) ? $group['items'] : [];
                                    @endphp
                                    @forelse($itemList as $iIdx => $item)
                                        <tr data-item-index="{{ $iIdx }}">
                                            <td>
                                                <input type="text" 
                                                       name="{{ $prefix }}[{{ $gIdx }}][items][{{ $iIdx }}][code]" 
                                                       class="form-control form-control-sm" 
                                                       value="{{ $item['code'] ?? '' }}" 
                                                       placeholder="{{ $codePlaceholder ?? 'Örn: TK200 SBP' }}">
                                            </td>
                                            <td>
                                                <textarea name="{{ $prefix }}[{{ $gIdx }}][items][{{ $iIdx }}][description]" 
                                                          class="form-control form-control-sm" 
                                                          rows="2" 
                                                          placeholder="{{ $descPlaceholder ?? 'Ürünün teknik açıklaması ve özellikleri...' }}">{{ $item['description'] ?? '' }}</textarea>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-remove-item p-1" title="Satırı Sil">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr data-item-index="0">
                                            <td>
                                                <input type="text" 
                                                       name="{{ $prefix }}[{{ $gIdx }}][items][0][code]" 
                                                       class="form-control form-control-sm" 
                                                       value="" 
                                                       placeholder="{{ $codePlaceholder ?? 'Örn: TK200 SBP' }}">
                                            </td>
                                            <td>
                                                <textarea name="{{ $prefix }}[{{ $gIdx }}][items][0][description]" 
                                                          class="form-control form-control-sm" 
                                                          rows="2" 
                                                          placeholder="{{ $descPlaceholder ?? 'Ürünün teknik açıklaması ve özellikleri...' }}"></textarea>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-remove-item p-1" title="Satırı Sil">
                                                    <i class="ri-close-line"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="group-card card border shadow-xs" data-group-index="0">
                <div class="card-header bg-light d-flex justify-content-between align-items-center py-2 px-3">
                    <span class="fw-bold text-secondary small">
                        <i class="ri-folder-line text-primary me-1"></i> <span class="group-order-label">1. {{ $groupNumberLabel ?? 'Proses Grubu (Alt Kategori)' }}</span>
                    </span>
                    <button type="button" class="btn btn-sm text-danger btn-remove-group p-0" title="Bu Grubu Sil">
                        <i class="ri-delete-bin-line"></i> {{ $deleteGroupText ?? 'Grubu Sil' }}
                    </button>
                </div>
                <div class="card-body p-3">
                    <div class="mb-3">
                        <label class="form-label small fw-bold">{{ $titleInputLabel ?? 'Proses / Alt Kategori Başlığı *' }}</label>
                        <input type="text" 
                               name="{{ $prefix }}[0][title]" 
                               class="form-control form-control-sm group-title-input" 
                               value="" 
                               placeholder="{{ $titlePlaceholder ?? 'Örn: Siyanürlü Bakır Kaplama Prosesleri' }}" 
                               {{ $locale === 'tr' ? 'required' : '' }}>
                    </div>

                    <div class="products-table-wrapper border rounded-2 p-2 bg-white">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small fw-bold text-muted">
                                <i class="ri-table-line text-info me-1"></i> {{ $tableLabel ?? 'Ürünler Tablosu (Ürün Kodu & Açıklama)' }}
                            </span>
                            <button type="button" class="btn btn-xs btn-outline-success btn-add-item py-1 px-2" style="font-size: 12px;">
                                <i class="ri-add-line"></i> {{ $addItemBtnText ?? '+ Ürün Ekle' }}
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 28%; font-size: 12px;" class="py-1">{{ $colCode ?? 'ÜRÜN KODU' }}</th>
                                        <th style="font-size: 12px;" class="py-1">{{ $colDesc ?? 'AÇIKLAMA' }}</th>
                                        <th style="width: 50px; text-align: center; font-size: 12px;" class="py-1">{{ $colAction ?? 'SİL' }}</th>
                                    </tr>
                                </thead>
                                <tbody class="items-tbody">
                                    <tr data-item-index="0">
                                        <td>
                                            <input type="text" 
                                                   name="{{ $prefix }}[0][items][0][code]" 
                                                   class="form-control form-control-sm" 
                                                   value="" 
                                                   placeholder="{{ $codePlaceholder ?? 'Örn: TK200 SBP' }}">
                                        </td>
                                        <td>
                                            <textarea name="{{ $prefix }}[0][items][0][description]" 
                                                      class="form-control form-control-sm" 
                                                      rows="2" 
                                                      placeholder="{{ $descPlaceholder ?? 'Ürünün teknik açıklaması ve özellikleri...' }}"></textarea>
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
        @endforelse
    </div>

    <!-- Big Add Group Button -->
    <button type="button" class="btn btn-outline-secondary w-100 py-2 border-dashed btn-add-group">
        <i class="ri-add-circle-line me-1"></i> {{ $addGroupBtnText ?? '+ Yeni Proses Grubu (Alt Kategori) Ekle' }}
    </button>
</div>

