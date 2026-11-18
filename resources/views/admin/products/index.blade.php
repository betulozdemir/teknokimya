@extends('admin.layouts.app')

@section('title', 'Ürünler & Portfolyo Yönetimi')
@section('page_title', 'Ürünler & Portfolyo Yönetimi')
@section('page_subtitle', 'Ana sayfadaki laboratuvar ürünlerini ve vitrin öğelerini yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Ürün Listesi</h6>
                <span class="text-secondary small">Toplam {{ $products->count() }} ürün</span>
            </div>
            <a href="{{ route('admin.products.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Ürün Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Görsel</th>
                        <th>Ürün Başlığı</th>
                        <th>Kategori</th>
                        <th>Vitrin</th>
                        <th>Sıra</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->title }}" class="thumb-preview">
                            </td>
                            <td>
                                <div class="fw-bold">{{ $product->title }}</div>
                                <div class="text-secondary small text-truncate" style="max-width: 280px;">{{ $product->description }}</div>
                            </td>
                            <td><span class="badge bg-light text-dark border">{{ $product->category }}</span></td>
                            <td>
                                @if($product->is_featured)
                                    <span class="badge bg-warning bg-opacity-25 text-dark">Öne Çıkan (Sol Büyük)</span>
                                @else
                                    <span class="text-secondary small">Standart Grid</span>
                                @endif
                            </td>
                            <td>{{ $product->sort_order }}</td>
                            <td>
                                <span class="badge-status {{ $product->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                        <i class="ri-edit-line"></i> Düzenle
                                    </a>
                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" data-confirm="Bu ürünü silmek istediğinize emin misiniz?">
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
                            <td colspan="7" class="text-center text-secondary py-5">Henüz ürün eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

