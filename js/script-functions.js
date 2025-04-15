export function togglePasswordVisibility() {
  const toggleButtons = document.querySelectorAll(".toggle-password");

  toggleButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const input = this.parentElement.querySelector(
        "input[type='password'], input[type='text']"
      );
      if (!input) return;

      const newType = input.type === "password" ? "text" : "password";
      input.type = newType;

      const iconClass = newType === "password" ? "fa-eye" : "fa-eye-slash";
      this.innerHTML = `<i class="fas ${iconClass}"></i>`;
    });
  });
}
