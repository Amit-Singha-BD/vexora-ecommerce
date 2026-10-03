/* ============================================================
   AUTH MODULE — Shared JavaScript
   Used by: login.html, register.html
   Sections:
     1. Shared Utilities (Scroll Reveal, Password Toggle)
     2. Login Page Logic
     3. Register Page Logic
   ============================================================ */

/* ============================================================
   1. SHARED UTILITIES
   ============================================================ */
(function initAuthShared() {
    /* ---------- 1.1 Scroll Reveal ---------- */
    function revealOnScroll() {
        const reveals = document.querySelectorAll(".reveal");
        const windowHeight = window.innerHeight;
        const elementVisible = 50;

        reveals.forEach((el) => {
            const elementTop = el.getBoundingClientRect().top;
            if (elementTop < windowHeight - elementVisible) {
                el.classList.add("active");
            }
        });
    }

    window.addEventListener("scroll", revealOnScroll);
    window.addEventListener("load", revealOnScroll);
    revealOnScroll();

    /* ---------- 1.2 Password Show / Hide Toggle ---------- */
    document.querySelectorAll(".password-toggle").forEach((btn) => {
        btn.addEventListener("click", function () {
            const targetId = this.dataset.target;
            const input = document.getElementById(targetId);
            const icon = this.querySelector("i");

            if (!input || !icon) return;

            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        });
    });
})();


/* ============================================================
   2. LOGIN PAGE LOGIC
   ============================================================ */
(function initLoginPage() {
    const loginForm = document.getElementById("loginForm");
    if (!loginForm) return;

    /* ---------- 2.1 Login Form Submit (Demo) ---------- */
    loginForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const btn = this.querySelector(".btn-modern");
        if (!btn) return;

        const original = btn.innerHTML;

        btn.disabled = true;
        btn.innerHTML =
            '<i class="fa-solid fa-spinner fa-spin me-2"></i> Logging in...';

        setTimeout(() => {
            btn.innerHTML =
                '<i class="fa-solid fa-check me-2"></i> Success!';

            setTimeout(() => {
                btn.innerHTML = original;
                btn.disabled = false;
                // Redirect demo:
                // window.location.href = 'dashboard.html';
            }, 1200);
        }, 900);
    });
})();


/* ============================================================
   3. REGISTER PAGE LOGIC
   ============================================================ */
(function initRegisterPage() {
    /* ---------- 3.1 Password Strength Meter ---------- */
    const regPassword = document.getElementById("regPassword");
    const strengthFill = document.getElementById("strengthFill");
    const strengthText = document.getElementById("strengthText");

    function checkStrength(pwd) {
        if (!strengthFill || !strengthText) return;

        let score = 0;
        if (pwd.length >= 8) score++;
        if (/[A-Z]/.test(pwd)) score++;
        if (/[0-9]/.test(pwd)) score++;
        if (/[^A-Za-z0-9]/.test(pwd)) score++;

        strengthFill.classList.remove("weak", "medium", "strong");

        if (pwd.length === 0) {
            strengthText.textContent =
                "Use at least 8 characters with a mix of letters, numbers & symbols.";
            return;
        }

        if (score <= 1) {
            strengthFill.classList.add("weak");
            strengthText.textContent = "Weak password";
        } else if (score === 2 || score === 3) {
            strengthFill.classList.add("medium");
            strengthText.textContent = "Medium strength";
        } else {
            strengthFill.classList.add("strong");
            strengthText.textContent = "Strong password ✓";
        }
    }

    if (regPassword) {
        regPassword.addEventListener("input", function () {
            checkStrength(this.value);
        });
    }

    /* ---------- 3.2 Confirm Password Match ---------- */
    const regConfirm = document.getElementById("regConfirm");
    const matchText = document.getElementById("matchText");

    if (regConfirm && matchText && regPassword) {
        regConfirm.addEventListener("input", function () {
            if (!this.value) {
                matchText.textContent = "";
                return;
            }

            if (this.value === regPassword.value) {
                matchText.textContent = "✓ Passwords match";
                matchText.style.color = "#10B981";
            } else {
                matchText.textContent = "✗ Passwords do not match";
                matchText.style.color = "#EF4444";
            }
        });
    }

    /* ---------- 3.3 Register Form Submit (Demo) ---------- */
    const registerForm = document.getElementById("registerForm");
    if (!registerForm) return;

    registerForm.addEventListener("submit", function (e) {
        e.preventDefault();

        /* Password match validation */
        if (regPassword && regConfirm && regPassword.value !== regConfirm.value) {
            alert("Passwords do not match!");
            regConfirm.focus();
            return;
        }

        const btn = this.querySelector(".btn-modern");
        if (!btn) return;

        const original = btn.innerHTML;

        btn.disabled = true;
        btn.innerHTML =
            '<i class="fa-solid fa-spinner fa-spin me-2"></i> Creating account...';

        setTimeout(() => {
            btn.innerHTML =
                '<i class="fa-solid fa-check me-2"></i> Success!';

            setTimeout(() => {
                btn.innerHTML = original;
                btn.disabled = false;
                // Redirect demo:
                // window.location.href = 'otp.html';
            }, 1200);
        }, 900);
    });
})();