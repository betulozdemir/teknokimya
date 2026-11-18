@extends('admin.layouts.app')

@section('title', 'Hizmetler Yönetimi')
@section('page_title', 'Hizmetlerimiz Yönetimi')
@section('page_subtitle', 'Ana sayfadaki laboratuvar ve kimya hizmet kartlarını düzenleyin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Hizmet Listesi</h6>
                <span class="text-secondary small">Toplam {{ $services->count() }} hizmet</span>
            </div>
            <a href="{{ route('admin.services.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Hizmet Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>Hizmet Başlığı</th>
                        <th>Açıklama</th>
                        <th>Sıra</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>
                                @if($service->image)
                                    <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="thumb-preview">
                                @else
                                    <span class="text-secondary small">—</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $service->title }}</td>
                            <td class="text-secondary small">{{ $service->description }}</td>
                            <td>{{ $service->sort_order }}</td>
                            <td>
                                <span class="badge-status {{ $service->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $service->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                        <i class="ri-edit-line"></i> Düzenle
                                    </a>
                                    <form method="POST" action="{{ route('admin.services.destroy', $service) }}" data-confirm="Bu hizmeti silmek istediğinize emin misiniz?">
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
                            <td colspan="6" class="text-center text-secondary py-5">Henüz hizmet eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

