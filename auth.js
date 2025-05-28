document.getElementById("show-login").addEventListener("click", () => {
  document.getElementById("login-form").classList.remove("hidden");
  document.getElementById("signup-form").classList.add("hidden");
});
document.getElementById("show-signup").addEventListener("click", () => {
  document.getElementById("signup-form").classList.remove("hidden");
  document.getElementById("login-form").classList.add("hidden");
});

// Auto-switch to sign up if flagged
window.addEventListener('DOMContentLoaded', () => {
  if (localStorage.getItem('showSignup') === 'true') {
    document.getElementById("signup-form").classList.remove("hidden");
    document.getElementById("login-form").classList.add("hidden");
    localStorage.removeItem('showSignup');
  }
});
