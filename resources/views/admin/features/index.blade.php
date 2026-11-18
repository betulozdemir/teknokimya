@extends('admin.layouts.app')

@section('title', 'Öne Çıkan Özellikler')
@section('page_title', 'Öne Çıkan Özellikler (Features)')
@section('page_subtitle', 'Slider altındaki 3\'lü özellik kartlarını yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Özellik Kartları Listesi</h6>
            </div>
            <a href="{{ route('admin.features.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Özellik Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Başlık</th>
                        <th>Açıklama</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($features as $feature)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $feature->sort_order }}</td>
                            <td class="fw-semibold">{{ $feature->title }}</td>
                            <td class="text-secondary small">{{ \Illuminate\Support\Str::limit($feature->description, 80) }}</td>
                            <td>
                                <span class="badge-status {{ $feature->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $feature->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-light border" title="Düzenle">
                                        <i class="ri-edit-line text-primary"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.features.destroy', $feature) }}" data-confirm="Bu özelliği silmek istediğinize emin misiniz?">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light border" title="Sil">
                                            <i class="ri-delete-bin-line text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary">Henüz özellik eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

