@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                <!-- Header Login -->
                <div class="card-header py-4 text-center" style="background: linear-gradient(135deg, #5D2906, #8B4513);">
                    <h3 class="fw-bold mb-0 text-white">
                        <i class="bi bi-shield-lock-fill me-2"></i>Login Operator
                    </h3>
                    <p class="text-light mb-0 mt-2">Sistem Manajemen Cafe KOPI IN</p>
                </div>
                
                <div class="card-body p-4">
                    <!-- Logo Cafe -->
                    <div class="text-center mb-4">
                        <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center" 
                             style="width: 80px; height: 80px; border: 3px solid #F5DEB3;">
                            <i class="bi bi-cup-hot-fill" style="font-size: 2.5rem; color: #8B4513;"></i>
                        </div>
                    </div>
                    
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif
                    
                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">
                                <i class="bi bi-envelope-fill me-2" style="color: #8B4513;"></i>Email Address
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person" style="color: #8B4513;"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="operator@kopiin.com"
                                       required
                                       autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="password" class="form-label fw-bold">
                                <i class="bi bi-key-fill me-2" style="color: #8B4513;"></i>Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock" style="color: #8B4513;"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="••••••••"
                                       required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-kopi btn-lg fw-bold">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">
                                <i class="bi bi-info-circle me-2"></i>
                                Hanya untuk operator dan admin Cafe KOPI IN
                            </p>
                        </div>
                    </form>
                </div>
                
                <!-- Footer Login -->
                <div class="card-footer py-3 text-center" style="background-color: #F5E6D3;">
                    <small class="text-muted">
                        <i class="bi bi-cup-hot me-1"></i> Cafe KOPI IN &copy; {{ date('Y') }}
                    </small>
                </div>
            </div>           
        </div>
    </div>
</div>

<style>
    .btn-kopi {
        background: linear-gradient(135deg, #8B4513, #A0522D);
        color: white;
        border: none;
        padding: 12px;
        font-weight: 600;
        border-radius: 10px;
        transition: all 0.3s;
    }
    
    .btn-kopi:hover {
        background: linear-gradient(135deg, #5D2906, #8B4513);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
    }
    
    .form-control:focus {
        border-color: #8B4513;
        box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
    }
    
    .card {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    body::before {
        opacity: 0.05;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    
    if (togglePassword) {
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle icon
            const icon = this.querySelector('i');
            if (type === 'password') {
                icon.className = 'bi bi-eye';
            } else {
                icon.className = 'bi bi-eye-slash';
            }
        });
    }
    
    // Auto focus on email input
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.focus();
    }
});
</script>
@endsection