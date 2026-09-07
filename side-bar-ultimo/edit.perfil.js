/* =====================================================
   FOTO DE PERFIL
===================================================== */

const photoInput = document.getElementById("photoInput");
const changePhotoButton = document.getElementById("changePhotoButton");
const profileImage = document.getElementById("profileImage");


changePhotoButton.addEventListener("click", function () {

    photoInput.click();

});


photoInput.addEventListener("change", function () {

    const file = this.files[0];

    if (!file) {
        return;
    }


    /*
     * Comprobar que sea una imagen
     */

    if (!file.type.startsWith("image/")) {

        alert("Selecciona una imagen válida.");

        this.value = "";

        return;

    }


    /*
     * Crear vista previa
     */

    const reader = new FileReader();


    reader.onload = function (event) {

        profileImage.innerHTML = "";

        const img = document.createElement("img");

        img.src = event.target.result;

        img.id = "previewImage";

        profileImage.appendChild(img);

    };


    reader.readAsDataURL(file);

});



/* =====================================================
   MOSTRAR / OCULTAR PASSWORD
===================================================== */

const passwordButtons =
    document.querySelectorAll(".password-toggle");


passwordButtons.forEach(function (button) {

    button.addEventListener("click", function () {

        const targetId = this.dataset.target;

        const input = document.getElementById(targetId);

        const icon = this.querySelector("i");


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



/* =====================================================
   VALIDACIÓN DEL FORMULARIO
===================================================== */

const profileForm =
    document.getElementById("profileForm");


profileForm.addEventListener("submit", function (event) {

    const password =
        document.getElementById("nueva_password").value;

    const confirmPassword =
        document.getElementById("confirmar_password").value;


    /*
     * Comprobar contraseñas
     */

    if (password !== "" || confirmPassword !== "") {

        if (password.length < 8) {

            event.preventDefault();

            alert(
                "La nueva contraseña debe tener al menos 8 caracteres."
            );

            return;

        }


        if (password !== confirmPassword) {

            event.preventDefault();

            alert(
                "Las contraseñas no coinciden."
            );

            return;

        }

    }

});