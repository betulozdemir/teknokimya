@extends('admin.layouts.app')

@section('title', 'Blog & Haberler')
@section('page_title', 'Blog & Haberler Yönetimi')
@section('page_subtitle', 'Ana sayfadaki kurumsal haber ve blog yazılarını yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Blog Yazıları Listesi</h6>
            </div>
            <a href="{{ route('admin.blog-posts.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Blog Yazısı Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Görsel</th>
                        <th>Başlık</th>
                        <th>Kategori & Tarih</th>
                        <th>Vitrin</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogPosts as $post)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $post->sort_order }}</td>
                            <td>
                                <img src="{{ asset($post->image) }}" alt="" class="thumb-preview">
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $post->title }}</div>
                                <div class="text-secondary small">{{ \Illuminate\Support\Str::limit($post->excerpt, 60) }}</div>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25">{{ $post->category }}</span>
                                <div class="text-secondary small mt-1">{{ $post->published_date }}</div>
                            </td>
                            <td>
                                @if($post->is_featured)
                                    <span class="badge bg-warning bg-opacity-25 text-dark">Sol Büyük Kart</span>
                                @else
                                    <span class="text-secondary small">Sağ Liste</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge-status {{ $post->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $post->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-sm btn-light border" title="Düzenle">
                                        <i class="ri-edit-line text-primary"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" data-confirm="Bu blog yazısını silmek istediğinize emin misiniz?">
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
                            <td colspan="7" class="text-center py-4 text-secondary">Henüz blog yazısı eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

