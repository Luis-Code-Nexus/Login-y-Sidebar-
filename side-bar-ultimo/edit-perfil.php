<?php

session_start();



?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Editar perfil | CINEMATICS</title>


    <!-- =====================================================
         GOOGLE FONT
    ====================================================== -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
          rel="stylesheet">


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- =====================================================
         CSS
    ====================================================== -->

    <style>

        /* =====================================================
           RESET
        ===================================================== */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: "Poppins", sans-serif;

            background: #f5f6fa;

            color: #20232d;
        }


        /* =====================================================
           PÁGINA
        ===================================================== */

        .profile-page {
            width: 100%;

            min-height: 100vh;

            padding: 35px;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .profile-header {
            display: flex;

            align-items: center;

            justify-content: space-between;

            max-width: 1200px;

            margin: 0 auto 25px;
        }


        .page-label {
            font-size: 10px;

            font-weight: 600;

            letter-spacing: 1.5px;

            color: #8b909c;
        }


        .profile-header h1 {
            font-size: 26px;

            font-weight: 600;

            margin-top: 4px;
        }


        .profile-header p {
            color: #8b909c;

            font-size: 13px;

            margin-top: 3px;
        }


        /* =====================================================
           BOTÓN VOLVER
        ===================================================== */

        .back-button {
            display: flex;

            align-items: center;

            gap: 9px;

            padding: 10px 16px;

            border-radius: 9px;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            color: #444955;

            text-decoration: none;

            font-size: 12px;

            transition: 0.2s;
        }


        .back-button:hover {
            background: #11131a;

            color: #ffffff;

            border-color: #11131a;
        }


        /* =====================================================
           CONTENEDOR PRINCIPAL
        ===================================================== */

        .profile-container {
            display: grid;

            grid-template-columns: 280px 1fr;

            max-width: 1200px;

            margin: auto;

            background: #ffffff;

            border: 1px solid #e5e7eb;

            border-radius: 16px;

            overflow: hidden;
        }


        /* =====================================================
           SIDEBAR DEL PERFIL
        ===================================================== */

        .profile-sidebar {
            background: #11131a;

            padding: 40px 25px;

            display: flex;

            flex-direction: column;

            align-items: center;

            text-align: center;
        }


        /* =====================================================
           FOTO
        ===================================================== */

        .profile-image-container {
            position: relative;

            margin-bottom: 17px;
        }


        .profile-image {
            width: 105px;

            height: 105px;

            border-radius: 50%;

            background: #ffffff;

            color: #11131a;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;

            font-size: 27px;

            font-weight: 600;
        }


        .profile-image img {
            width: 100%;

            height: 100%;

            object-fit: cover;
        }


        /* =====================================================
           BOTÓN CAMBIAR FOTO
        ===================================================== */

        .change-photo {
            position: absolute;

            right: 0;

            bottom: 2px;

            width: 34px;

            height: 34px;

            border: 3px solid #11131a;

            border-radius: 50%;

            background: #ffffff;

            color: #11131a;

            cursor: pointer;

            font-size: 12px;

            transition: 0.2s;
        }


        .change-photo:hover {
            transform: scale(1.08);
        }


        /* =====================================================
           DATOS DEL PERFIL
        ===================================================== */

        .profile-sidebar h2 {
            color: #ffffff;

            font-size: 17px;

            font-weight: 600;
        }


        .profile-role {
            color: #858b98;

            font-size: 11px;

            margin-top: 4px;
        }


        .profile-line {
            width: 100%;

            height: 1px;

            background: rgba(255,255,255,0.08);

            margin: 25px 0;
        }


        .profile-status {
            display: flex;

            align-items: center;

            gap: 7px;

            color: #9ba0aa;

            font-size: 11px;
        }


        .status-dot {
            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: #22c55e;
        }


        /* =====================================================
           CONTENIDO
        ===================================================== */

        .profile-content {
            padding: 35px;
        }


        /* =====================================================
           SECCIÓN
        ===================================================== */

        .form-section {
            padding-bottom: 30px;

            margin-bottom: 30px;

            border-bottom: 1px solid #eeeeef;
        }


        .section-title {
            display: flex;

            align-items: center;

            gap: 13px;

            margin-bottom: 25px;
        }


        .section-icon {
            width: 40px;

            height: 40px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 9px;

            background: #f2f3f5;

            color: #4b505c;

            font-size: 14px;
        }


        .section-title h3 {
            font-size: 15px;

            font-weight: 600;
        }


        .section-title p {
            color: #9297a2;

            font-size: 11px;

            margin-top: 2px;
        }


        /* =====================================================
           FORMULARIO
        ===================================================== */

        .form-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 20px;
        }


        .form-group {
            display: flex;

            flex-direction: column;

            gap: 7px;
        }


        .form-group label {
            color: #515661;

            font-size: 11px;

            font-weight: 500;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .input-wrapper {
            position: relative;

            display: flex;

            align-items: center;
        }


        .input-wrapper > i {
            position: absolute;

            left: 13px;

            color: #9ba0aa;

            font-size: 12px;

            pointer-events: none;
        }


        .input-wrapper input,
        .form-group select {
            width: 100%;

            height: 43px;

            border: 1px solid #e2e4e8;

            border-radius: 8px;

            padding: 0 40px;

            outline: none;

            color: #292d35;

            background: #ffffff;

            font-family: inherit;

            font-size: 12px;

            transition: 0.2s;
        }


        .form-group select {
            padding: 0 13px 0 40px;

            cursor: pointer;
        }


        .input-wrapper input:focus,
        .form-group select:focus {
            border-color: #9ca3af;

            box-shadow: 0 0 0 3px rgba(0,0,0,0.04);
        }


        .input-wrapper input::placeholder {
            color: #b0b4bc;
        }


        /* =====================================================
           PASSWORD
        ===================================================== */

        .password-toggle {
            position: absolute;

            right: 10px;

            border: none;

            background: transparent;

            color: #9ba0aa;

            cursor: pointer;

            font-size: 12px;
        }


        .password-toggle:hover {
            color: #333740;
        }


        /* =====================================================
           INFORMACIÓN PASSWORD
        ===================================================== */

        .password-info {
            display: flex;

            align-items: center;

            gap: 7px;

            margin-top: 17px;

            color: #9095a0;

            font-size: 10px;
        }


        /* =====================================================
           BOTONES
        ===================================================== */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            gap: 10px;
        }


        .cancel-button,
        .save-button {
            height: 42px;

            padding: 0 19px;

            border-radius: 8px;

            font-family: inherit;

            font-size: 12px;

            cursor: pointer;

            text-decoration: none;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            transition: 0.2s;
        }


        .cancel-button {
            background: #f3f4f6;

            color: #555a65;

            border: 1px solid #e5e7eb;
        }


        .cancel-button:hover {
            background: #e5e7eb;
        }


        .save-button {
            border: none;

            background: #11131a;

            color: #ffffff;
        }


        .save-button:hover {
            background: #292c35;

            transform: translateY(-1px);
        }


        /* =====================================================
           MENSAJE
        ===================================================== */

        .success-message {
            position: fixed;

            right: 25px;

            bottom: 25px;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 14px 18px;

            background: #11131a;

            color: #ffffff;

            border-radius: 10px;

            font-size: 12px;

            box-shadow: 0 10px 30px rgba(0,0,0,0.15);

            opacity: 0;

            transform: translateY(15px);

            pointer-events: none;

            transition: 0.3s;
        }


        .success-message.show {
            opacity: 1;

            transform: translateY(0);
        }


        .success-message i {
            color: #22c55e;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 850px) {

            .profile-page {
                padding: 20px;
            }


            .profile-container {
                grid-template-columns: 1fr;
            }


            .profile-sidebar {
                padding: 30px;
            }


            .profile-content {
                padding: 25px;
            }

        }


        @media (max-width: 600px) {

            .profile-header {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }


            .form-grid {
                grid-template-columns: 1fr;
            }


            .profile-content {
                padding: 20px;
            }


            .form-actions {
                flex-direction: column-reverse;
            }


            .cancel-button,
            .save-button {
                width: 100%;
            }

        }

    </style>

</head>


<body>


<div class="profile-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="profile-header">

        <div>

            <span class="page-label">
                CUENTA
            </span>

            <h1>
                Editar perfil
            </h1>

            <p>
                Administra tu información personal y de acceso.
            </p>

        </div>


        <a href="index.html"
           class="back-button">

            <i class="fa-solid fa-arrow-left"></i>

            Volver al Dashboard

        </a>

    </header>



    <!-- =====================================================
         FORMULARIO
    ====================================================== -->

    <form class="profile-container"
          id="profileForm">


        <!-- =================================================
             PERFIL
        ================================================== -->

        <div class="profile-sidebar">


            <div class="profile-image-container">


                <div class="profile-image"
                     id="profileImage">

                    <span id="avatarLetters">
                        HC
                    </span>

                </div>


                <button
                    type="button"
                    class="change-photo"
                    id="changePhotoButton"
                    title="Cambiar foto">

                    <i class="fa-solid fa-camera"></i>

                </button>


                <input
                    type="file"
                    id="photoInput"
                    accept="image/*"
                    hidden>

            </div>


            <h2 id="profileName">
                Héctor Contreras
            </h2>


            <span class="profile-role"
                  id="profileRole">

                Administrador

            </span>


            <div class="profile-line"></div>


            <div class="profile-status">

                <span class="status-dot"></span>

                Cuenta activa

            </div>

        </div>



        <!-- =================================================
             CONTENIDO
        ================================================== -->

        <div class="profile-content">


            <!-- =================================================
                 INFORMACIÓN PERSONAL
            ================================================== -->

            <div class="form-section">


                <div class="section-title">

                    <div class="section-icon">

                        <i class="fa-solid fa-user"></i>

                    </div>


                    <div>

                        <h3>
                            Información personal
                        </h3>

                        <p>
                            Actualiza tus datos personales.
                        </p>

                    </div>

                </div>



                <div class="form-grid">


                    <!-- NOMBRE -->

                    <div class="form-group">

                        <label for="nombre">
                            Nombre
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                id="nombre"
                                value="Héctor"
                                required>

                        </div>

                    </div>



                    <!-- APELLIDO -->

                    <div class="form-group">

                        <label for="apellido">
                            Apellido
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-user"></i>

                            <input
                                type="text"
                                id="apellido"
                                value="Contreras"
                                required>

                        </div>

                    </div>



                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Correo electrónico
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-envelope"></i>

                            <input
                                type="email"
                                id="email"
                                value="hector@email.com"
                                required>

                        </div>

                    </div>



                    <!-- TELÉFONO -->

                    <div class="form-group">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-phone"></i>

                            <input
                                type="tel"
                                id="telefono"
                                value="829-000-0000">

                        </div>

                    </div>



                    <!-- CARGO -->

                    <div class="form-group">

                        <label for="cargo">
                            Cargo
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-briefcase"></i>

                            <input
                                type="text"
                                id="cargo"
                                value="Administrador">

                        </div>

                    </div>



                    <!-- DEPARTAMENTO -->

                    <div class="form-group">

                        <label for="departamento">
                            Departamento
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-building"></i>

                            <input
                                type="text"
                                id="departamento"
                                value="Administración">

                        </div>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 SEGURIDAD
            ================================================== -->

            <div class="form-section">


                <div class="section-title">

                    <div class="section-icon">

                        <i class="fa-solid fa-lock"></i>

                    </div>


                    <div>

                        <h3>
                            Seguridad
                        </h3>

                        <p>
                            Cambia tu contraseña cuando quieras.
                        </p>

                    </div>

                </div>



                <div class="form-grid">


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label for="nuevaPassword">
                            Nueva contraseña
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-key"></i>

                            <input
                                type="password"
                                id="nuevaPassword"
                                placeholder="Nueva contraseña">

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="nuevaPassword">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>



                    <!-- CONFIRMAR -->

                    <div class="form-group">

                        <label for="confirmarPassword">
                            Confirmar contraseña
                        </label>

                        <div class="input-wrapper">

                            <i class="fa-solid fa-key"></i>

                            <input
                                type="password"
                                id="confirmarPassword"
                                placeholder="Repite la contraseña">

                            <button
                                type="button"
                                class="password-toggle"
                                data-target="confirmarPassword">

                                <i class="fa-solid fa-eye"></i>

                            </button>

                        </div>

                    </div>

                </div>


                <div class="password-info">

                    <i class="fa-solid fa-circle-info"></i>

                    Deja estos campos vacíos si no deseas cambiar
                    tu contraseña.

                </div>

            </div>



            <!-- =================================================
                 BOTONES
            ================================================== -->

            <div class="form-actions">


                <a href="index.html"
                   class="cancel-button">

                    Cancelar

                </a>


                <button
                    type="submit"
                    class="save-button">

                    <i class="fa-solid fa-floppy-disk"></i>

                    Guardar cambios

                </button>

            </div>


        </div>

    </form>

</div>



<!-- =====================================================
     MENSAJE
===================================================== -->

<div class="success-message"
     id="successMessage">

    <i class="fa-solid fa-circle-check"></i>

    <span>
        Cambios guardados correctamente
    </span>

</div>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

    /* =====================================================
       ELEMENTOS
    ===================================================== */

    const profileForm =
        document.getElementById("profileForm");

    const photoInput =
        document.getElementById("photoInput");

    const changePhotoButton =
        document.getElementById("changePhotoButton");

    const profileImage =
        document.getElementById("profileImage");

    const profileName =
        document.getElementById("profileName");

    const profileRole =
        document.getElementById("profileRole");

    const successMessage =
        document.getElementById("successMessage");


    /* =====================================================
       CAMBIAR FOTO
    ===================================================== */

    changePhotoButton.addEventListener(
        "click",
        function () {

            photoInput.click();

        }
    );


    photoInput.addEventListener(
        "change",
        function () {

            const file = this.files[0];

            if (!file) {
                return;
            }


            if (!file.type.startsWith("image/")) {

                alert(
                    "Selecciona una imagen válida."
                );

                this.value = "";

                return;

            }


            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    profileImage.innerHTML = "";

                    const image =
                        document.createElement("img");

                    image.src =
                        event.target.result;

                    profileImage.appendChild(image);

                };


            reader.readAsDataURL(file);

        }
    );


    /* =====================================================
       MOSTRAR / OCULTAR PASSWORD
    ===================================================== */

    const passwordButtons =
        document.querySelectorAll(
            ".password-toggle"
        );


    passwordButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const target =
                        this.dataset.target;

                    const input =
                        document.getElementById(target);

                    const icon =
                        this.querySelector("i");


                    if (
                        input.type ===
                        "password"
                    ) {

                        input.type =
                            "text";

                        icon.classList.remove(
                            "fa-eye"
                        );

                        icon.classList.add(
                            "fa-eye-slash"
                        );

                    } else {

                        input.type =
                            "password";

                        icon.classList.remove(
                            "fa-eye-slash"
                        );

                        icon.classList.add(
                            "fa-eye"
                        );

                    }

                }
            );

        }
    );


    /* =====================================================
       ACTUALIZAR NOMBRE EN EL PERFIL
    ===================================================== */

    function updateProfilePreview() {

        const nombre =
            document.getElementById("nombre").value;

        const apellido =
            document.getElementById("apellido").value;

        const cargo =
            document.getElementById("cargo").value;


        profileName.textContent =
            `${nombre} ${apellido}`;


        profileRole.textContent =
            cargo || "Administrador";


        /*
         * Actualizar iniciales
         */

        const initials =
            (
                nombre.charAt(0) +
                apellido.charAt(0)
            ).toUpperCase();


        /*
         * Solo cambia las iniciales
         * si todavía no hay una imagen.
         */

        if (
            !profileImage.querySelector("img")
        ) {

            profileImage.innerHTML =
                `<span>${initials}</span>`;

        }

    }


    document
        .getElementById("nombre")
        .addEventListener(
            "input",
            updateProfilePreview
        );


    document
        .getElementById("apellido")
        .addEventListener(
            "input",
            updateProfilePreview
        );


    document
        .getElementById("cargo")
        .addEventListener(
            "input",
            updateProfilePreview
        );


    /* =====================================================
       GUARDAR
    ===================================================== */

    profileForm.addEventListener(
        "submit",
        function (event) {

            event.preventDefault();


            const password =
                document.getElementById(
                    "nuevaPassword"
                ).value;


            const confirmPassword =
                document.getElementById(
                    "confirmarPassword"
                ).value;


            /*
             * Validar contraseña
             */

            if (
                password !== "" ||
                confirmPassword !== ""
            ) {

                if (password.length < 8) {

                    alert(
                        "La contraseña debe tener al menos 8 caracteres."
                    );

                    return;

                }


                if (
                    password !==
                    confirmPassword
                ) {

                    alert(
                        "Las contraseñas no coinciden."
                    );

                    return;

                }

            }


            /*
             * Actualizar vista
             */

            updateProfilePreview();


            /*
             * Mostrar mensaje
             */

            successMessage.classList.add(
                "show"
            );


            /*
             * Ocultar mensaje
             */

            setTimeout(
                function () {

                    successMessage.classList.remove(
                        "show"
                    );

                },
                3000
            );

        }
    );

</script>


</body>

</html>
```
