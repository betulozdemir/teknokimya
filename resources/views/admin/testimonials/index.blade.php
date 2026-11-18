@extends('admin.layouts.app')

@section('title', 'Müşteri Yorumları')
@section('page_title', 'Müşteri Yorumları (Testimonials)')
@section('page_subtitle', 'Müşteri geri bildirimlerini ve değerlendirmelerini yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Müşteri Yorumları Listesi</h6>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Yorum Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Avatar</th>
                        <th>Müşteri Adı & Unvan</th>
                        <th>Yorum Başlığı</th>
                        <th>Puan</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $testimonial->sort_order }}</td>
                            <td>
                                <img src="{{ asset($testimonial->avatar) }}" alt="" class="thumb-preview" style="width: 46px; height: 46px; border-radius: 50%;">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $testimonial->client_name }}</div>
                                <div class="text-secondary small">{{ $testimonial->client_designation }}</div>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $testimonial->title }}</div>
                                <div class="text-secondary small">{{ \Illuminate\Support\Str::limit($testimonial->comment, 60) }}</div>
                            </td>
                            <td class="text-warning">
                                @for($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="ri-star-fill"></i>
                                @endfor
                            </td>
                            <td>
                                <span class="badge-status {{ $testimonial->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $testimonial->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-light border" title="Düzenle">
                                        <i class="ri-edit-line text-primary"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" data-confirm="Bu yorumu silmek istediğinize emin misiniz?">
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
                            <td colspan="7" class="text-center py-4 text-secondary">Henüz müşteri yorumu eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

