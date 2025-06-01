// Animate register title
if (document.getElementById("register-title")) {
  animateText("Register", "register-title");
}

// Animate forgot title
if (document.getElementById("forgot-title")) {
  animateText("Forgot Password", "forgot-title");
}

// Universal function for typing effect
function animateText(text, elementId) {
  const title = document.getElementById(elementId);
  let index = 0;
  function type() {
    if (index < text.length) {
      title.textContent += text.charAt(index);
      index++;
      setTimeout(type, 100);
    }
  }
  type();
}

// Register form validation
const regForm = document.getElementById("registerForm");
if (regForm) {
  regForm.addEventListener("submit", function (e) {
    const username = document.getElementById("reg-username").value.trim();
    const email = document.getElementById("reg-email").value.trim();
    const password = document.getElementById("reg-password").value.trim();

    if (!username || !email || !password) {
      alert("Please fill in all fields.");
      e.preventDefault();
    } else {
      alert("Registration successful!");
    }
  });
}

// Forgot form validation
const forgotForm = document.getElementById("forgotForm");
if (forgotForm) {
  forgotForm.addEventListener("submit", function (e) {
    const email = document.getElementById("forgot-email").value.trim();
    if (!email) {
      alert("Please enter your email.");
      e.preventDefault();
    } else {
      alert("Password reset link sent!");
    }
  });
}document.addEventListener("DOMContentLoaded", function () {
  // ====== Show/Hide Password on Login Page ======
  const passwordInput = document.getElementById("password");
  const togglePassword = document.getElementById("togglePassword");

  if (passwordInput && togglePassword) {
    togglePassword.addEventListener("click", function () {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
      passwordInput.setAttribute("type", type);

      // Toggle icon
      if (this.classList.contains("bxs-lock-alt")) {
        this.classList.remove("bxs-lock-alt");
        this.classList.add("bxs-lock-open-alt");
      } else {
        this.classList.remove("bxs-lock-open-alt");
        this.classList.add("bxs-lock-alt");
      }
    });
  }

  // ====== Remember Me (Login) ======
  const usernameInput = document.getElementById("username");
  const rememberMe = document.getElementById("rememberMe");

  if (usernameInput && rememberMe) {
    // Load remembered username
    const remembered = localStorage.getItem("username");
    if (remembered) {
      usernameInput.value = remembered;
      rememberMe.checked = true;
    }

    // On login form submit
    const loginForm = document.querySelector("form");
    if (loginForm) {
      loginForm.addEventListener("submit", function (e) {
        const username = usernameInput.value.trim();
        const password = passwordInput.value.trim();

        if (!username || !password) {
          alert("Please fill in all fields!");
          e.preventDefault();
          return;
        }

        if (rememberMe.checked) {
          localStorage.setItem("username", username);
        } else {
          localStorage.removeItem("username");
        }

        alert("Login successful! (Mock message)");
      });
    }
  }

  // ====== Register Page Validation ======
  const regForm = document.getElementById("registerForm");
  if (regForm) {
    regForm.addEventListener("submit", function (e) {
      const username = document.getElementById("reg-username").value.trim();
      const email = document.getElementById("reg-email").value.trim();
      const password = document.getElementById("reg-password").value.trim();

      if (!username || !email || !password) {
        alert("Please fill in all fields.");
        e.preventDefault();
        return;
      }

      alert("Registration successful! (Mock message)");
    });
  }

  // ====== Forgot Password Validation ======
  const forgotForm = document.getElementById("forgotForm");
  if (forgotForm) {
    forgotForm.addEventListener("submit", function (e) {
      const email = document.getElementById("forgot-email").value.trim();
      if (!email) {
        alert("Please enter your email.");
        e.preventDefault();
        return;
      }

      alert("Password reset link sent! (Mock message)");
    });
  }
});