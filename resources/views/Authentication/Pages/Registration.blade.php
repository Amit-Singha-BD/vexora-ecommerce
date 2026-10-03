@extends('Authentication.Layout.MasterLayout')
@section('Content')
    <!-- ===== Top Brand Header ===== -->
    <div class="container text-center pt-4">
        <a class="brand-logo" href="index.html">
            <i class="fa-solid fa-store"></i> E-Shop BD
        </a>
    </div>

    <!-- ===== Register Card ===== -->
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6 reveal">
                <div class="auth-card">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold mb-2">Create Account</h3>
                        <p class="text-muted small mb-0">Join E-Shop BD to start your modern shopping experience.</p>
                    </div>

                    <form id="registerForm">
                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <div class="input-icon-wrap">
                                <i class="fa-regular fa-user input-icon"></i>
                                <input type="text" class="form-control" placeholder="Amit Singha" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-icon-wrap">
                                <i class="fa-regular fa-envelope input-icon"></i>
                                <input type="email" class="form-control" placeholder="name@example.com" required>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <div class="input-icon-wrap">
                                <i class="fa-solid fa-phone input-icon"></i>
                                <input type="tel" class="form-control" placeholder="+880 1XXX-XXXXXX" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control" id="regPassword" placeholder="••••••••"
                                    required>
                                <button type="button" class="password-toggle" data-target="regPassword">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <span class="strength-text" id="strengthText">Use at least 8 characters with a mix of letters,
                                numbers & symbols.</span>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <div class="password-wrap">
                                <input type="password" class="form-control" id="regConfirm" placeholder="••••••••" required>
                                <button type="button" class="password-toggle" data-target="regConfirm">
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                            <span class="strength-text" id="matchText"></span>
                        </div>

                        <!-- Terms -->
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                            <label class="form-check-label" for="agreeTerms">
                                I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                    Policy</a>.
                            </label>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn-modern">
                            <i class="fa-solid fa-user-plus me-2"></i> Register & Verify OTP
                        </button>
                    </form>

                    <!-- Login Link -->
                    <p class="text-center small text-muted mt-4 mb-0">
                        Already have an account?
                        <a href="login.html" class="text-primary text-decoration-none fw-semibold">Login here</a>
                    </p>

                </div>
            </div>
        </div>
    </div>
@endsection
