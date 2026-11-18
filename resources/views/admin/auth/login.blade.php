<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Girişi || Teknokimya Yönetim Paneli</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon-light-blue.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css') }}">
    <style>
        :root {
            --tk-primary: #0ea5e9;
            --tk-primary-dark: #0284c7;
            --tk-navy: #07192b;
            --tk-navy-light: #0f2942;
        }
        body {
            min-height: 100vh;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: radial-gradient(circle at 15% 20%, #0f3156 0%, #07192b 55%, #040d17 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #f8fafc;
        }
        .login-shell {
            width: 100%;
            max-width: 960px;
            background: rgba(15, 41, 66, 0.72);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
        }
        .login-brand-side {
            background: linear-gradient(145deg, rgba(14, 165, 233, 0.22), rgba(2, 132, 199, 0.05)),
                        url('{{ asset("assets/images/bg/banner-bg-09.png") }}') center/cover no-repeat;
            position: relative;
            padding: 48px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 520px;
        }
        .login-brand-side::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(7, 25, 43, 0.75) 0%, rgba(7, 25, 43, 0.92) 100%);
        }
        .login-brand-content {
            position: relative;
            z-index: 1;
        }
        .badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            border-radius: 999px;
            background: rgba(14, 165, 233, 0.2);
            border: 1px solid rgba(14, 165, 233, 0.4);
            color: #38bdf8;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 0.4px;
        }
        .login-form-side {
            padding: 48px 44px;
            background: #ffffff;
            color: #0f172a;
        }
        .form-control-modern {
            width: 100%;
            padding: 13px 16px 13px 44px;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: #f8fafc;
            font-size: 15px;
            color: #0f172a;
            transition: all 0.2s ease;
        }
        .form-control-modern:focus {
            outline: none;
            background: #ffffff;
            border-color: var(--tk-primary);
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15);
        }
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 18px;
        }
        .btn-login {
            width: 100%;
            padding: 14px 20px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #ffffff;
            font-weight: 600;
            font-size: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 10px 25px rgba(14, 165, 233, 0.3);
            transition: all 0.2s ease;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 28px rgba(14, 165, 233, 0.4);
            color: #ffffff;
        }
        .demo-box {
            background: #f0f9ff;
            border: 1px dashed #7dd3fc;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 13px;
            color: #0369a1;
        }
    </style>
</head>
<body>
    <div class="login-shell">
        <div class="row g-0">
            <div class="col-lg-6 d-none d-lg-flex login-brand-side">
                <div class="login-brand-content">
                    <a href="{{ route('home') }}" class="d-inline-block mb-4">
                        <img src="{{ asset('assets/images/logo/logo-white.png') }}" alt="Tekno Kaplama Kimyasalları" style="max-height: 82px; width: auto;">
                    </a>
                    <div class="mt-4">
                        <span class="badge-pill mb-3">
                            <i class="ri-flask-line"></i> TEKNOKİMYA CMS v1.0
                        </span>
                        <h2 class="fw-bold text-white mt-2 mb-3" style="font-size: 30px; line-height: 1.3;">
                            Laboratuvar & Endüstriyel Kimya Yönetim Merkezi
                        </h2>
                        <p class="text-white-50 mb-0" style="font-size: 15px; line-height: 1.7;">
                            Ana sayfa slider alanlarını, laboratuvar ürün portfolyosunu, hizmetleri ve kurumsal iletişim bilgilerini tek ekrandan kolayca yönetin.
                        </p>
                    </div>
                </div>
                <div class="login-brand-content d-flex align-items-center justify-content-between pt-4 border-top border-secondary border-opacity-25">
                    <span class="small text-white-50">© {{ date('Y') }} Teknokimya</span>
                    <a href="{{ route('home') }}" class="small text-info text-decoration-none d-inline-flex align-items-center gap-1">
                        Siteyi Görüntüle <i class="ri-external-link-line"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 login-form-side d-flex flex-column justify-content-center">
                <div class="mb-4">
                    <h3 class="fw-bold mb-1" style="color: #0f172a;">Hoş Geldiniz 👋</h3>
                    <p class="text-secondary mb-0" style="font-size: 14px;">Yönetim paneline erişmek için hesabınızla giriş yapın.</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 rounded-3 small mb-3 d-flex align-items-center gap-2">
                        <i class="ri-error-warning-line fs-5"></i>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold small text-secondary">E-Posta Adresi</label>
                        <div class="input-icon-wrap">
                            <i class="ri-mail-line"></i>
                            <input type="email" id="email" name="email" class="form-control-modern" value="{{ old('email', 'admin@teknokimya.com') }}" required autofocus placeholder="admin@teknokimya.com">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold small text-secondary">Şifre</label>
                        <div class="input-icon-wrap">
                            <i class="ri-lock-password-line"></i>
                            <input type="password" id="password" name="password" class="form-control-modern" value="password" required placeholder="••••••••">
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small text-secondary" for="remember">
                                Beni Hatırla
                            </label>
                        </div>
                        <a href="{{ route('home') }}" class="small text-decoration-none" style="color: #0284c7;">Ana Sayfaya Dön</a>
                    </div>

                    <button type="submit" class="btn-login">
                        <span>Panele Giriş Yap</span>
                        <i class="ri-arrow-right-line"></i>
                    </button>
                </form>

                <div class="demo-box mt-4">
                    <div class="fw-semibold mb-1"><i class="ri-key-2-line me-1"></i> Varsayılan Yönetici Bilgileri:</div>
                    <div>E-posta: <code>admin@teknokimya.com</code> &nbsp;|&nbsp; Şifre: <code>password</code></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

