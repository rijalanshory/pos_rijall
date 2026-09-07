<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Rijal - Masuk</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
    :root {
        --dark-bg: #070d1e;
        --blue-primary: #2563eb;
        --blue-hover: #1d4ed8;
    }

    body {
        /* Background Gradien Bergerak */
        background: linear-gradient(-45deg, #050b18, #0a1738, #0f2b66, #070d1e);
        background-size: 400% 400%;
        animation: gradientBG 10s ease infinite;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        margin: 0;
        position: relative;
        overflow: hidden;
    }

    @keyframes gradientBG {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* =======================================
       ORB GLOW BERGERAK (LEBIH TERANG & AKTIF)
    ========================================== */
    .bg-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(60px);
        opacity: 0.6;
        z-index: 1;
        pointer-events: none;
    }

    .bg-orb-1 {
        width: 350px;
        height: 350px;
        background: #2563eb;
        top: 5%;
        left: 10%;
        animation: moveOrb1 8s ease-in-out infinite alternate;
    }

    .bg-orb-2 {
        width: 400px;
        height: 400px;
        background: #1d4ed8;
        bottom: 5%;
        right: 10%;
        animation: moveOrb2 10s ease-in-out infinite alternate;
    }

    .bg-orb-3 {
        width: 250px;
        height: 250px;
        background: #60a5fa;
        top: 40%;
        right: 35%;
        animation: moveOrb3 7s ease-in-out infinite alternate;
    }

    @keyframes moveOrb1 {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(120px, 80px) scale(1.3); }
    }

    @keyframes moveOrb2 {
        0% { transform: translate(0, 0) scale(1); }
        100% { transform: translate(-140px, -90px) scale(1.2); }
    }

    @keyframes moveOrb3 {
        0% { transform: translate(0, 0) scale(0.8); }
        100% { transform: translate(-80px, 100px) scale(1.4); }
    }

    /* PARTIKEL BINTANG MELAYANG */
    .particle {
        position: absolute;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        pointer-events: none;
        z-index: 1;
        animation: floatUp 6s linear infinite;
    }

    .p1 { width: 6px; height: 6px; left: 15%; animation-duration: 7s; animation-delay: 0s; }
    .p2 { width: 8px; height: 8px; left: 35%; animation-duration: 9s; animation-delay: 2s; }
    .p3 { width: 5px; height: 5px; left: 65%; animation-duration: 6s; animation-delay: 1s; }
    .p4 { width: 7px; height: 7px; left: 85%; animation-duration: 8s; animation-delay: 3s; }

    @keyframes floatUp {
        0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
        50% { opacity: 0.8; }
        100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
    }

    /* CARD LOGIN GLASSMORPHISM */
    .login-card {
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(25px);
        -webkit-backdrop-filter: blur(25px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        width: 100%;
        max-width: 420px;
        padding: 2.5rem;
        position: relative;
        z-index: 10;
    }

    .login-icon-box {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-hover));
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem auto;
        box-shadow: 0 0 0 6px rgba(37, 99, 235, 0.25), 0 10px 20px rgba(37, 99, 235, 0.45);
    }

    .login-title {
        color: #ffffff;
        font-weight: 800;
        font-size: 1.65rem;
        letter-spacing: -0.5px;
    }

    .login-subtitle {
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .form-label-custom {
        color: #cbd5e1;
        font-size: 0.85rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .input-group-custom {
        background: rgba(255, 255, 255, 0.07);
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 14px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .input-group-custom:focus-within {
        border-color: var(--blue-primary);
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.3);
        background: rgba(255, 255, 255, 0.12);
    }

    .input-group-custom .input-group-text {
        background: transparent;
        border: none;
        color: #94a3b8;
        padding-left: 1rem;
    }

    .input-group-custom .form-control {
        background: transparent;
        border: none;
        color: #ffffff;
        padding: 0.75rem 1rem 0.75rem 0.5rem;
        font-size: 0.95rem;
    }

    .input-group-custom .form-control:focus {
        box-shadow: none;
    }

    .input-group-custom .form-control::placeholder {
        color: #64748b;
    }

    .btn-toggle-eye {
        background: transparent;
        border: none;
        color: #94a3b8;
        padding-right: 1rem;
        transition: color 0.2s;
    }

    .btn-toggle-eye:hover {
        color: #ffffff;
    }

    .btn-submit-custom {
        background: linear-gradient(135deg, var(--blue-primary), var(--blue-hover));
        color: #ffffff;
        border: none;
        border-radius: 14px;
        padding: 0.85rem;
        font-weight: 700;
        font-size: 0.95rem;
        width: 100%;
        margin-top: 1rem;
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-submit-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(37, 99, 235, 0.6);
    }

    .custom-alert {
        background: rgba(16, 185, 129, 0.2);
        border: 1px solid rgba(16, 185, 129, 0.4);
        color: #6ee7b7;
        backdrop-filter: blur(10px);
        border-radius: 14px;
        font-size: 0.875rem;
        font-weight: 500;
        padding: 0.85rem 1.25rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    </style>
</head>
<body>

    <!-- ANIMASI BACKGROUND: 3 ORB CAHAYA BERGERAK -->
    <div class="bg-orb bg-orb-1"></div>
    <div class="bg-orb bg-orb-2"></div>
    <div class="bg-orb bg-orb-3"></div>

    <!-- ANIMASI BACKGROUND: PARTIKEL BINTANG MELAYANG KE ATAS -->
    <div class="particle p1"></div>
    <div class="particle p2"></div>
    <div class="particle p3"></div>
    <div class="particle p4"></div>

    <div class="login-card">

        {{-- NOTIFIKASI SUKSES LOGOUT / STATUS --}}
        @if (session('status'))
            <div class="custom-alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>{{ session('status') }}</span>
            </div>
        @elseif (session('success'))
            <div class="custom-alert">
                <i class="bi bi-check-circle-fill fs-5"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- LOGO & JUDUL --}}
        <div class="text-center mb-4">
            <div class="login-icon-box">
                <i class="bi bi-shop text-white fs-3"></i>
            </div>
            <h1 class="login-title mb-1">Selamat Datang</h1>
            <p class="login-subtitle">Masukkan akun Anda untuk mengelola transaksi POS</p>
        </div>

        {{-- FORM LOGIN --}}
        <form action="{{ route('login') }}" method="POST">
            @csrf

            {{-- FIELD EMAIL --}}
            <div class="mb-3">
                <label for="email" class="form-label-custom">Alamat Email</label>
                <div class="input-group input-group-custom">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required autocomplete="email">
                </div>
                @error('email')
                    <small class="text-danger mt-1 d-block">{{ $message }}</small>
                @enderror
            </div>

            {{-- FIELD PASSWORD --}}
            <div class="mb-4">
                <label for="password" class="form-label-custom">Kata Sandi</label>
                <div class="input-group input-group-custom">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                    <button class="btn-toggle-eye" type="button" id="togglePassword">
                        <i class="bi bi-eye-slash" id="eyeIcon"></i>
                    </button>
                </div>
                @error('password')
                    <small class="text-danger mt-1 d-block">{{ $message }}</small>
                @enderror
            </div>

            {{-- TOMBOL SUBMIT --}}
            <button type="submit" class="btn btn-submit-custom">
                <span>Masuk ke Kasir</span>
                <i class="bi bi-arrow-right"></i>
            </button>

        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = document.querySelector('#eyeIcon');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            eyeIcon.classList.toggle('bi-eye');
            eyeIcon.classList.toggle('bi-eye-slash');
        });
    </script>
</body>
</html>