@extends('Authentication.Layout.MasterLayout')
@section('Content')
    <!-- ===== Top Brand Header ===== -->
    <div class="container text-center pt-4">
        <a class="brand-logo" href="index.html">
            <i class="fa-solid fa-store"></i> E-Shop BD
        </a>
    </div>

    <!-- ===== Login Card ===== -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5 reveal">
                <div class="auth-card">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold mb-2">Welcome Back!</h3>
                        <p class="text-muted small mb-0">Please enter your credentials to access your account.</p>
                    </div>

                    <form id="loginForm">
                        <!-- Email / Phone -->
                        <div class="mb-3">
                            <label class="form-label">Email or Phone Number</label>
                            <input type="text" class="form-control" placeholder="name@example.com" required>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control" id="loginPassword" placeholder="••••••••"
                                    required>
                                <button type="button" class="password-toggle" data-target="loginPassword">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Remember + Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4 small">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="text-primary text-decoration-none fw-semibold">Forgot Password?</a>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn-modern">
                            <i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Login to Account
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="divider">OR CONTINUE WITH</div>

                    <!-- Social Login -->
                    <div class="row g-2">
                        <div class="col-6">
                            <button type="button" class="social-btn">
                                <i class="fa-brands fa-google"></i> Google
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="social-btn">
                                <i class="fa-brands fa-facebook-f"></i> Facebook
                            </button>
                        </div>
                    </div>

                    <!-- Register Link -->
                    <p class="text-center small text-muted mt-4 mb-0">
                        Don't have an account?
                        <a href="register.html" class="text-primary text-decoration-none fw-semibold">Create one</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
