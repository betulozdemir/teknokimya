@extends('admin.layouts.app')

@section('title', 'Ekibimiz / Mühendisler')
@section('page_title', 'Ekibimiz Yönetimi')
@section('page_subtitle', 'Ana sayfadaki uzman mühendis ve ekip kadrosunu yönetin')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <div>
                <h6 class="fw-bold mb-0">Ekip Üyeleri Listesi</h6>
            </div>
            <a href="{{ route('admin.team-members.create') }}" class="btn-tk-primary">
                <i class="ri-add-line"></i>
                <span>Yeni Ekip Üyesi Ekle</span>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Fotoğraf</th>
                        <th>Ad Soyad</th>
                        <th>Unvan / Görev</th>
                        <th>Durum</th>
                        <th class="text-end">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($teamMembers as $member)
                        <tr>
                            <td class="fw-bold text-secondary">#{{ $member->sort_order }}</td>
                            <td>
                                <img src="{{ asset($member->image) }}" alt="" class="thumb-preview">
                            </td>
                            <td class="fw-semibold">{{ $member->name }}</td>
                            <td class="text-secondary">{{ $member->designation }}</td>
                            <td>
                                <span class="badge-status {{ $member->is_active ? 'badge-active' : 'badge-passive' }}">
                                    {{ $member->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="d-inline-flex gap-1">
                                    <a href="{{ route('admin.team-members.edit', $member) }}" class="btn btn-sm btn-light border" title="Düzenle">
                                        <i class="ri-edit-line text-primary"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.team-members.destroy', $member) }}" data-confirm="Bu ekip üyesini silmek istediğinize emin misiniz?">
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
                            <td colspan="6" class="text-center py-4 text-secondary">Henüz ekip üyesi eklenmemiş.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

