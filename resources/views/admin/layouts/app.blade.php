<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Yönetim Paneli') || Teknokimya Admin</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon-light-blue.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css') }}">
    <style>
        :root {
            --tk-sidebar-bg: #07192b;
            --tk-sidebar-hover: rgba(14, 165, 233, 0.14);
            --tk-primary: #0ea5e9;
            --tk-primary-dark: #0284c7;
            --tk-surface: #f1f5f9;
        }
        body {
            background-color: var(--tk-surface);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: #0f172a;
            margin: 0;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .admin-sidebar {
            width: 270px;
            background: linear-gradient(180deg, #07192b 0%, #04101c 100%);
            color: #e2e8f0;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .sidebar-brand {
            padding: 24px 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .sidebar-brand img {
            max-height: 58px;
            width: auto;
        }
        .sidebar-nav {
            padding: 20px 14px;
            flex: 1;
            overflow-y: auto;
        }
        .nav-section-label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            padding: 8px 12px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: 10px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 4px;
            transition: all 0.18s ease;
        }
        .sidebar-link i {
            font-size: 19px;
            color: #94a3b8;
            transition: color 0.18s ease;
        }
        .sidebar-link:hover {
            background: var(--tk-sidebar-hover);
            color: #ffffff;
        }
        .sidebar-link:hover i {
            color: var(--tk-primary);
        }
        .sidebar-link.active {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.28);
        }
        .sidebar-link.active i {
            color: #ffffff;
        }
        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(0, 0, 0, 0.2);
        }
        .admin-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .admin-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 20;
        }
        .admin-content {
            padding: 32px;
            flex: 1;
        }
        .card-modern {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(15, 23, 42, 0.03);
        }
        .card-modern-header {
            padding: 20px 24px;
            border-bottom: 1px solid #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .card-modern-body {
            padding: 24px;
        }
        .stat-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.06);
        }
        .stat-icon {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
        }
        .btn-tk-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            box-shadow: 0 6px 16px rgba(14, 165, 233, 0.25);
            transition: all 0.2s ease;
        }
        .btn-tk-primary:hover {
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 10px 20px rgba(14, 165, 233, 0.35);
        }
        .table-modern th {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #64748b;
            font-weight: 700;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 14px 16px;
        }
        .table-modern td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }
        .badge-status {
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-active {
            background: #dcfce7;
            color: #15803d;
        }
        .badge-passive {
            background: #f1f5f9;
            color: #64748b;
        }
        .thumb-preview {
            width: 68px;
            height: 46px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .form-label {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 10px 14px;
            font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--tk-primary);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.15);
        }
        .photo-upload-card {
            border: 2px dashed #cbd5e1;
            border-radius: 14px;
            background: #f8fafc;
            padding: 16px;
            transition: all 0.2s ease;
        }
        .photo-upload-card:hover {
            border-color: var(--tk-primary);
            background: #f0f9ff;
        }
        .photo-preview-wrapper {
            width: 150px;
            height: 96px;
            border-radius: 10px;
            overflow: hidden;
            background: #e2e8f0;
            border: 1px solid #cbd5e1;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .photo-preview-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .lang-switch-tabs .nav-link {
            color: #475569;
            font-size: 13px;
            border: none;
        }
        .lang-switch-tabs .nav-link.active {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.25);
        }
        .swal2-backdrop-show {
            backdrop-filter: blur(4px);
            background: rgba(15, 23, 42, 0.45) !important;
        }
        .tk-swal-popup {
            width: 370px !important;
            padding: 24px 22px 20px !important;
            border-radius: 18px !important;
            box-shadow: 0 20px 40px -10px rgba(15, 23, 42, 0.18), 0 0 0 1px rgba(226, 232, 240, 0.8) !important;
        }
        .tk-swal-icon-badge {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            background: #fef2f2;
            border: 1px solid #fee2e2;
            color: #ef4444;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            margin-bottom: 12px;
        }
        .tk-swal-title {
            font-size: 16.5px !important;
            font-weight: 700 !important;
            color: #0f172a !important;
            padding: 0 !important;
            margin: 0 0 6px !important;
        }
        .tk-swal-html {
            font-size: 13.5px !important;
            color: #64748b !important;
            line-height: 1.5 !important;
            margin: 0 !important;
            padding: 0 6px !important;
        }
        .tk-swal-actions {
            margin-top: 20px !important;
            gap: 8px !important;
            width: 100%;
            display: flex !important;
        }
        .tk-swal-confirm, .tk-swal-cancel {
            flex: 1;
            font-size: 13px !important;
            font-weight: 600 !important;
            padding: 9px 16px !important;
            border-radius: 10px !important;
            margin: 0 !important;
            box-shadow: none !important;
            transition: all 0.18s ease !important;
        }
        .tk-swal-confirm {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
            color: #ffffff !important;
            border: none !important;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.25) !important;
        }
        .tk-swal-confirm:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.35) !important;
        }
        .tk-swal-cancel {
            background: #f1f5f9 !important;
            color: #475569 !important;
            border: 1px solid #e2e8f0 !important;
        }
        .tk-swal-cancel:hover {
            background: #e2e8f0 !important;
            color: #0f172a !important;
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="Teknokimya">
                </a>
                <span class="badge bg-info bg-opacity-25 text-info border border-info border-opacity-25">Admin</span>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section-label">Genel Bakış</div>
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="ri-dashboard-3-line"></i>
                    <span>Kontrol Paneli</span>
                </a>

                <div class="nav-section-label mt-3">Ana Sayfa Modülleri</div>
                <a href="{{ route('admin.menu-items.index') }}" class="sidebar-link {{ request()->routeIs('admin.menu-items.*') ? 'active' : '' }}">
                    <i class="ri-menu-search-line"></i>
                    <span>Üst Menü (Header)</span>
                </a>
                <a href="{{ route('admin.sliders.index') }}" class="sidebar-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                    <i class="ri-slideshow-3-line"></i>
                    <span>Banner / Slider</span>
                </a>
                <a href="{{ route('admin.features.index') }}" class="sidebar-link {{ request()->routeIs('admin.features.*') ? 'active' : '' }}">
                    <i class="ri-award-line"></i>
                    <span>Öne Çıkan Özellikler</span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="ri-flask-line"></i>
                    <span>Hizmetlerimiz</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="ri-microscope-line"></i>
                    <span>Ürünler / Portfolyo</span>
                </a>
                <a href="{{ route('admin.team-members.index') }}" class="sidebar-link {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                    <i class="ri-team-line"></i>
                    <span>Ekibimiz / Mühendisler</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="ri-chat-quote-line"></i>
                    <span>Müşteri Yorumları</span>
                </a>
                <a href="{{ route('admin.blog-posts.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">
                    <i class="ri-newspaper-line"></i>
                    <span>Blog & Haberler</span>
                </a>

                <div class="nav-section-label mt-3">Kurumsal & Yapılandırma</div>
                <a href="{{ route('admin.about.edit') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                    <i class="ri-building-2-line"></i>
                    <span>Hakkımızda Sayfası</span>
                </a>
                <a href="{{ route('admin.contact-messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact-messages.*') ? 'active' : '' }}">
                    <i class="ri-mail-unread-line"></i>
                    <span>İletişim Mesajları</span>
                </a>
                <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                    <i class="ri-settings-4-line"></i>
                    <span>Genel Site & İletişim Ayarları</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-2 overflow-hidden">
                        <div class="rounded-circle bg-info text-white d-flex align-items-center justify-content-center fw-bold" style="width: 36px; height: 36px; flex-shrink: 0;">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="text-truncate">
                            <div class="small fw-semibold text-white text-truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                            <div class="text-white-50" style="font-size: 11px;">{{ auth()->user()->email ?? '' }}</div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light border-0" title="Çıkış Yap">
                            <i class="ri-logout-box-r-line fs-5"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- Main Area -->
        <div class="admin-main">
            <header class="admin-topbar">
                <div>
                    <h5 class="fw-bold mb-0">@yield('page_title', 'Kontrol Paneli')</h5>
                    <p class="text-secondary small mb-0">@yield('page_subtitle', 'Teknokimya web sitesi içerik yönetim sistemi')</p>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary rounded-3 d-inline-flex align-items-center gap-2 px-3 py-2">
                        <i class="ri-external-link-line"></i>
                        <span>Siteyi Canlı Gör</span>
                    </a>
                </div>
            </header>

            <main class="admin-content">
                @if(session('success'))
                    <div class="alert alert-success border-0 rounded-4 shadow-sm d-flex align-items-center gap-2 mb-4">
                        <i class="ri-checkbox-circle-fill fs-5 text-success"></i>
                        <span class="fw-medium">{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger border-0 rounded-4 shadow-sm mb-4">
                        <div class="fw-semibold mb-1"><i class="ri-error-warning-fill me-1"></i> Lütfen aşağıdaki alanları kontrol edin:</div>
                        <ul class="mb-0 small">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sweetalert2.all.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('submit', function (e) {
                const form = e.target;
                if (!form || form.tagName !== 'FORM') {
                    return;
                }

                const hasDeleteMethod = form.querySelector('input[name="_method"][value="DELETE"]');
                if (!form.hasAttribute('data-confirm') && !hasDeleteMethod) {
                    return;
                }

                if (form.dataset.confirmed === 'true') {
                    return;
                }

                e.preventDefault();
                const message = form.getAttribute('data-confirm') || 'Bu kaydı silmek istediğinize emin misiniz?';

                Swal.fire({
                    title: 'Kaydı Silmek İstiyor Musunuz?',
                    html: '<div class="tk-swal-icon-badge"><i class="ri-delete-bin-6-line"></i></div><div class="fw-bold text-dark mb-1" style="font-size:16px;">Kaydı Silmek İstiyor Musunuz?</div><div>' + message + '</div>',
                    titleText: '',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: '<i class="ri-delete-bin-line me-1"></i> Evet, Sil',
                    cancelButtonText: 'Vazgeç',
                    reverseButtons: true,
                    customClass: {
                        popup: 'tk-swal-popup',
                        htmlContainer: 'tk-swal-html',
                        actions: 'tk-swal-actions',
                        confirmButton: 'tk-swal-confirm',
                        cancelButton: 'tk-swal-cancel'
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.dataset.confirmed = 'true';
                        form.submit();
                    }
                });
            });

            @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3200,
                    timerProgressBar: true
                });
            @endif

            document.addEventListener('submit', function (e) {
                const form = e.target;
                if (!form || form.tagName !== 'FORM') {
                    return;
                }

                const hasDeleteMethod = form.querySelector('input[name="_method"][value="DELETE"]');
                if (!form.hasAttribute('data-confirm') && !hasDeleteMethod) {
                    return;
                }

                if (form.dataset.confirmed === 'true') {
                    return;
                }

                e.preventDefault();
                const message = form.getAttribute('data-confirm') || 'Bu kaydı silmek istediğinize emin misiniz?';

                Swal.fire({
                    title: 'Kaydı Silmek İstiyor Musunuz?',
                    html: '<div class="tk-swal-icon-badge"><i class="ri-delete-bin-6-line"></i></div><div class="fw-bold text-dark mb-1" style="font-size:16px;">Kaydı Silmek İstiyor Musunuz?</div><div>' + message + '</div>',
                    titleText: '',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: '<i class="ri-delete-bin-line me-1"></i> Evet, Sil',
                    cancelButtonText: 'Vazgeç',
                    reverseButtons: true,
                    customClass: {
                        popup: 'tk-swal-popup',
                        htmlContainer: 'tk-swal-html',
                        actions: 'tk-swal-actions',
                        confirmButton: 'tk-swal-confirm',
                        cancelButton: 'tk-swal-cancel'
                    }
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.dataset.confirmed = 'true';
                        form.submit();
                    }
                });
            });

            @if(session('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: @json(session('success')),
                    showConfirmButton: false,
                    timer: 3200,
                    timerProgressBar: true
                });
            @endif

            document.querySelectorAll('.photo-file-input').forEach(function (input) {
                input.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    const previewSelector = input.getAttribute('data-preview');
                    const nameSelector = input.getAttribute('data-filename');
                    if (file && previewSelector) {
                        const previewImg = document.querySelector(previewSelector);
                        if (previewImg) {
                            const reader = new FileReader();
                            reader.onload = function (ev) {
                                previewImg.src = ev.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                    if (file && nameSelector) {
                        const nameEl = document.querySelector(nameSelector);
                        if (nameEl) {
                            nameEl.textContent = 'Seçilen dosya: ' + file.name;
                            nameEl.classList.remove('d-none');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>

