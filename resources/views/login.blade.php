@extends('layouts.app')

@section('title', 'Login - POS System')

@section('content')

<style>
    /* Reset & Base Background Dark Mode */
    body {
        background: #09090b; /* Pitch Black Background */
        background-image: 
            radial-gradient(at 0% 0%, rgba(225, 29, 72, 0.18) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(159, 18, 57, 0.15) 0px, transparent 50%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
        font-family: 'Plus Jakarta Sans', 'Inter', system-ui, -apple-system, sans-serif;
    }

    /* Entry Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .login-container {
        animation: fadeInUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        width: 100%;
        padding: 1.5rem;
    }

    /* Card Modern Dark Red Styling */
    .login-card {
        border-radius: 20px;
        border: 1px solid rgba(225, 29, 72, 0.25);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8), 0 0 20px rgba(225, 29, 72, 0.1);
        background: #121215;
        overflow: hidden;
        width: 100%;
        max-width: 410px;
        margin: 0 auto;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-header {
        background: transparent;
        padding: 2.5rem 2rem 0.5rem 2rem;
        border-bottom: none;
    }

    /* Brand / App Logo Wrapper Red Accent */
    .login-icon-wrapper {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, rgba(225, 29, 72, 0.2) 0%, rgba(159, 18, 57, 0.3) 100%);
        color: #f43f5e;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem auto;
        border: 1px solid rgba(244, 63, 94, 0.3);
        transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .login-card:hover .login-icon-wrapper {
        transform: scale(1.08) rotate(-3deg);
        box-shadow: 0 0 15px rgba(244, 63, 94, 0.4);
    }

    /* Form Custom Input Styles */
    .form-label {
        font-weight: 600;
        color: #e2e8f0;
        font-size: 0.85rem;
        margin-bottom: 0.4rem;
    }

    .input-group-text {
        background-color: #1a1a1e;
        border: 1.5px solid #27272a;
        border-right: none;
        border-radius: 12px 0 0 12px;
        color: #71717a;
        transition: all 0.2s ease;
    }

    .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        border: 1.5px solid #27272a;
        font-size: 0.925rem;
        color: #f4f4f5;
        background-color: #1a1a1e;
        transition: all 0.2s ease;
    }

    .form-control::placeholder {
        color: #52525b;
    }

    .input-group .form-control {
        border-left: none;
        border-radius: 0 12px 12px 0;
    }

    .input-group .form-control.password-input {
        border-right: none;
        border-radius: 0;
    }

    .toggle-password-btn {
        background-color: #1a1a1e;
        border: 1.5px solid #27272a;
        border-left: none;
        border-radius: 0 12px 12px 0;
        color: #71717a;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    /* Input Focus States */
    .input-group:focus-within .input-group-text,
    .input-group:focus-within .toggle-password-btn {
        border-color: #e11d48;
        background-color: #18181b;
        color: #f43f5e;
    }

    .form-control:focus {
        background-color: #18181b;
        border-color: #e11d48;
        color: #ffffff;
        box-shadow: none;
    }

    .input-group:focus-within {
        box-shadow: 0 0 0 4px rgba(225, 29, 72, 0.2);
        border-radius: 12px;
    }

    /* Red Gradient Button */
    .btn-gradient-login {
        background: linear-gradient(135deg, #e11d48 0%, #9f1239 100%);
        border: none;
        color: #ffffff;
        padding: 0.85rem 1rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        letter-spacing: 0.2px;
        transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .btn-gradient-login:hover {
        background: linear-gradient(135deg, #f43f5e 0%, #be123c 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -5px rgba(225, 29, 72, 0.5);
        color: #ffffff;
    }

    .btn-gradient-login:active {
        transform: translateY(0);
        box-shadow: 0 4px 10px -3px rgba(225, 29, 72, 0.3);
    }

    /* Error Badge */
    .error-badge {
        font-size: 0.775rem;
        border-radius: 8px;
        padding: 0.35rem 0.65rem;
        margin-top: 0.4rem;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-weight: 500;
        background-color: rgba(225, 29, 72, 0.15);
        color: #fb7185;
        border: 1px solid rgba(225, 29, 72, 0.3);
    }
</style>

<div class="login-container">
    <div class="card login-card">
        
        {{-- HEADER CARD --}}
        <div class="login-header text-center">
            <div class="login-icon-wrapper">
                <i class="bi bi-shop-window fs-3"></i>
            </div>
            <h4 class="fw-bold text-white mb-1" style="letter-spacing: -0.5px;">Selamat Datang</h4>
            <p class="text-secondary small mb-0">Masukkan akun Anda untuk mengelola transaksi POS</p>
        </div>

        {{-- BODY CARD / FORM LOGIN --}}
        <div class="card-body px-4 pb-4 pt-3">
            
            {{-- ALERT ERROR DARI SESSION --}}
            @if(session('error'))
                <div class="alert alert-danger border-0 rounded-3 small mb-3 shadow-sm d-flex align-items-center gap-2" role="alert" style="background-color: rgba(225, 29, 72, 0.2); color: #fecdd3; border: 1px solid rgba(225, 29, 72, 0.4) !important;">
                    <i class="bi bi-exclamation-triangle-fill fs-6 text-rose-400"></i>
                    <div>{{ session('error') }}</div>
                    <button type="button" class="btn-close btn-close-white small ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('auth') }}" method="POST">
                @csrf

                {{-- EMAIL INPUT --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               placeholder="nama@perusahaan.com" 
                               required 
                               autocomplete="email"
                               autofocus>
                    </div>
                    @error('email')
                        <div class="error-badge">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- PASSWORD INPUT --}}
                <div class="mb-4">
                    <label for="password" class="form-label">Kata Sandi</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" 
                               name="password" 
                               class="form-control password-input @error('password') is-invalid @enderror" 
                               id="password" 
                               placeholder="••••••••" 
                               required>
                        <button class="btn toggle-password-btn px-3" type="button" id="togglePassword">
                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-badge">
                            <i class="bi bi-exclamation-circle"></i> {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- SUBMIT BUTTON --}}
                <div class="d-grid pt-1">
                    <button type="submit" class="btn btn-gradient-login d-flex align-items-center justify-content-center gap-2">
                        <span>Masuk ke Kasir</span>
                        <i class="bi bi-arrow-right fs-6"></i>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- SCRIPT TOGGLE VISIBILITAS PASSWORD --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const toggleIcon = document.querySelector('#toggleIcon');

        if (togglePassword && password && toggleIcon) {
            togglePassword.addEventListener('click', function () {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                
                toggleIcon.classList.toggle('bi-eye');
                toggleIcon.classList.toggle('bi-eye-slash');
            });
        }
    });
</script>

@endsection