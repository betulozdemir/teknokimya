@extends('admin.layouts.app')

@section('title', 'Slider Yönetimi')
@section('page_title', 'Banner / Slider Yönetimi')
@section('page_subtitle', 'Ana sayfa üst kısmındaki tam ekran slider içeriklerini yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Slider Listesi</h6>
                <span class="text-secondary small">Toplam {{ $sliders->count() }} kayıt</span>
            </div>
            <a href="{{ route('admin.sliders.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Slider Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Arka Plan</th>
                        <th>Üst Başlık</th>
                        <th>Ana Başlık & Vurgu</th>
                        <th>Sıra</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr>
                            <td>
                                <img src="{{ $slider->imageUrl() }}" alt="{{ $slider->title }}" class="thumb-preview">
                            </td>
                            <td>{{ $slider->subtitle ?: '—' }}</td>
                            <td>
                                <div class="fw-bold">{{ $slider->title }} <span class="text-info">{{ $slider->highlight_text }}</span></div>
                                <div class="text-secondary small text-truncate" style="max-width: 320px;">{{ $slider->description }}</div>
                            </td>
                            <td>{{ $slider->sort_order }}</td>
                            <td>
                                <span class="badge-status {{ $slider->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $slider->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                        <i class="ri-edit-line"></i> Düzenle
                                    </a>
                                    <form method="POST" action="{{ route('admin.sliders.destroy', $slider) }}" data-confirm="Bu slider kaydını silmek istediğinize emin misiniz?">
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
                            <td colspan="6" class="text-center text-secondary py-5">Henüz slider eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

