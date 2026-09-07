
document.addEventListener("DOMContentLoaded", function () {

    /* ============================================================
       ELEMENTOS
    ============================================================ */

    const loginContent = document.querySelector(".login-content");
    const registerContent = document.querySelector(".register-content");

    const showRegister = document.getElementById("showRegister");
    const showLogin = document.getElementById("showLogin");

    const passwordButtons = document.querySelectorAll(".password-toggle");


    /* ============================================================
       CAMBIAR A REGISTRO
    ============================================================ */

    showRegister.addEventListener("click", function () {

        loginContent.classList.remove("active");

        setTimeout(function () {

            registerContent.classList.add("active");

        }, 80);

    });


    /* ============================================================
       CAMBIAR A LOGIN
    ============================================================ */

    showLogin.addEventListener("click", function () {

        registerContent.classList.remove("active");

        setTimeout(function () {

            loginContent.classList.add("active");

        }, 80);

    });


    /* ============================================================
       MOSTRAR / OCULTAR CONTRASEÑA
    ============================================================ */

    passwordButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const targetId = button.getAttribute("data-target");

            const input = document.getElementById(targetId);

            const icon = button.querySelector("i");


            if (input.type === "password") {

                input.type = "text";

                icon.classList.remove("fa-eye");

                icon.classList.add("fa-eye-slash");

            } else {

                input.type = "password";

                icon.classList.remove("fa-eye-slash");

                icon.classList.add("fa-eye");

            }

        });

    });

});

