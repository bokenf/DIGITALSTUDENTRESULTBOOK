document.addEventListener("DOMContentLoaded", function() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('change', function() {
            // If checkbox is checked, change type to 'text', else keep as 'password'
            const type = this.checked ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    }
});