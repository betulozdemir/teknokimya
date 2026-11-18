@extends('admin.layouts.app')

@section('title', 'İletişim Mesajları')
@section('page_title', 'İletişim Mesajları')
@section('page_subtitle', 'İletişim sayfasından gönderilen müşteri mesajları')

@section('content')
    <div class="card-modern">
        <div class="card-modern-header">
            <h6 class="fw-bold mb-0">Gelen Mesajlar ({{ $messages->count() }})</h6>
            <a href="{{ route('contact') }}" target="_blank" class="btn btn-sm btn-outline-primary rounded-3">
                <i class="ri-external-link-line me-1"></i> İletişim Sayfasını Gör
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-modern mb-0">
                <thead>
                    <tr>
                        <th>Gönderen</th>
                        <th>E-Posta & Telefon</th>
                        <th>Mesaj</th>
                        <th>Tarih</th>
                        <th class="text-end">İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr>
                            <td class="fw-semibold">{{ $msg->name }}</td>
                            <td>
                                <div><a href="mailto:{{ $msg->email }}" class="text-decoration-none">{{ $msg->email }}</a></div>
                                @if($msg->phone)
                                    <div class="text-secondary small">{{ $msg->phone }}</div>
                                @endif
                            </td>
                            <td style="max-width: 420px;">{{ $msg->message }}</td>
                            <td class="text-secondary small">{{ $msg->created_at?->format('d.m.Y H:i') }}</td>
                            <td class="text-end">
                                <form method="POST" action="{{ route('admin.contact-messages.destroy', $msg) }}" class="d-inline" data-confirm="Bu mesajı silmek istediğinize emin misiniz?">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-3">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-secondary">
                                Henüz iletişim formu üzerinden gönderilmiş bir mesaj bulunmuyor.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

