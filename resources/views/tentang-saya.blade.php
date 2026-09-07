@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4 p-md-5">
                    
                    {{-- Profil Utama --}}
                    <div class="text-center mb-4">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 90px; height: 90px; font-size: 36px; font-weight: bold;">
                            DEV
                        </div>
                        <h2 class="fw-bold mb-1">rijal</h2>
                        <p class="text-muted">Web Developer & Creator Sistem Kasir</p>
                    </div>

                    <hr class="my-4">

                    {{-- Deskripsi Bio --}}
                    <div class="mb-4">
                        <h5 class="fw-bold text-dark mb-3">Biografi Ringkas</h5>
                        <p class="text-secondary" style="line-height: 1.7;">
                            Saya adalah seorang pengembang web yang berfokus pada efisiensi dan kemudahan pengguna. Aplikasi sistem kasir (*POS*) ini dibangun untuk membantu proses pencatatan penjualan, pengelolaan stok produk, dan manajemen pengguna secara cepat, aman, dan terintegrasi.
                        </p>
                    </div>

                    {{-- Informasi Skill / Detail --}}
                    <div class="row g-3 mb-4">
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded border">
                                <span class="d-block text-muted small fw-bold">PERAN</span>
                                <span class="fw-semibold text-dark">Full-Stack Developer</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-light rounded border">
                                <span class="d-block text-muted small fw-bold">TEKNOLOGI</span>
                                <span class="fw-semibold text-dark">Laravel & Bootstrap</span>
                            </div>
                        </div>
                    </div>

                    {{-- Kontak / Footer Card --}}
                    <div class="p-3 bg-success bg-opacity-10 border border-success border-opacity-25 rounded d-flex align-items-center justify-content-between">
                        <div>
                            <small class="text-success d-block fw-bold">Status Sistem</small>
                            <span class="fw-bold text-dark">Aplikasi Siap Digunakan</span>
                        </div>
                        <a href="{{ route('dashboard') }}" class="btn btn-success btn-sm">Kembali ke Dashboard</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection