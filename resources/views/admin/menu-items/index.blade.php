@extends('admin.layouts.app')

@section('title', 'Üst Menü (Header Menü) Yönetimi')
@section('page_title', 'Üst Menü (Header Menü) Yönetimi')
@section('page_subtitle', 'Header ve mobil menüdeki bağlantıları, sıralamalarını ve 3 dildeki isimlerini yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">Menü Öğeleri ({{ $menuItems->count() }})</h6>
            <a href="{{ route('admin.menu-items.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Menü Öğesi Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 70px;">Sıra</th>
                        <th>Menü Başlığı (TR)</th>
                        <th>İngilizce (EN) / Arapça (AR)</th>
                        <th>Bağlantı (URL)</th>
                        <th>Sekme</th>
                        <th>Durum</th>
                        <th class="text-end">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($menuItems as $item)
                        <tr>
                            <td class="fw-semibold text-secondary">#{{ $item->sort_order }}</td>
                            <td class="fw-semibold">{{ $item->title }}</td>
                            <td>
                                <div class="small text-secondary">🇬🇧 {{ $item->getTranslation('en', 'title') ?: '—' }}</div>
                                <div class="small text-secondary" dir="rtl">🇸🇦 {{ $item->getTranslation('ar', 'title') ?: '—' }}</div>
                            </td>
                            <td>
                                <div class="small">🇹🇷 <code>{{ $item->localizedUrl('tr') }}</code></div>
                                <div class="small">🇬🇧 <code>{{ $item->localizedUrl('en') }}</code></div>
                                <div class="small">🇸🇦 <code>{{ $item->localizedUrl('ar') }}</code></div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    {{ $item->target === '_blank' ? 'Yeni Sekme' : 'Aynı Sekme' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge-status {{ $item->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $item->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                        <i class="ri-edit-line"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.menu-items.destroy', $item) }}" data-confirm="Bu menü öğesini silmek istediğinize emin misiniz?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-secondary">Henüz menü öğesi eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

