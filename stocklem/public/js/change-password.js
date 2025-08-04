// Toggle password visibility
document.querySelectorAll('.toggle-password-sena').forEach(button => {
    button.addEventListener('click', function () {
        const targetId = this.getAttribute('data-target');
        const targetInput = document.getElementById(targetId);
        const icon = this.querySelector('i');

        if (targetInput.type === 'password') {
            targetInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            targetInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

// Form submission with loading state
document.getElementById('changePasswordFormSena').addEventListener('submit', function (e) {
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.classList.add('btn-loading-sena');
    submitBtn.disabled = true;

    // Re-enable button after 5 seconds (in case of error)
    setTimeout(() => {
        submitBtn.classList.remove('btn-loading-sena');
        submitBtn.disabled = false;
    }, 5000);
});

// Auto-hide alerts after 5 seconds
function hideAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        setTimeout(() => {
            alert.classList.add('fade-out-sena');
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    }
}

hideAlert('successAlert');
hideAlert('errorAlert');

// Password strength visual feedback
const passwordInput = document.getElementById('password');
if (passwordInput) {
    passwordInput.addEventListener('input', function () {
        const password = this.value;
        let strength = 0;

        if (password.length >= 8) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        // Visual feedback with SENA colors
        if (strength < 3) {
            this.style.borderColor = '#dc3545';
        } else if (strength < 4) {
            this.style.borderColor = '#ffc107';
        } else {
            this.style.borderColor = '#2e7d32';
        }
    });
}