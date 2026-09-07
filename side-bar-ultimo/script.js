/* =====================================================
   SIDEBAR
===================================================== */

const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const mainContent = document.getElementById("mainContent");


sidebarToggle.addEventListener("click", function () {

    sidebar.classList.toggle("collapsed");

    mainContent.classList.toggle("expanded");

});



/* =====================================================
   DROPDOWN USUARIOS
===================================================== */

const usuariosDropdownContainer =
    document.getElementById("usuariosDropdownContainer");

const usuariosDropdownButton =
    document.getElementById("usuariosDropdownButton");


usuariosDropdownButton.addEventListener("click", function () {

    /*
     * Si el sidebar está contraído,
     * no mostramos el dropdown.
     */

    if (sidebar.classList.contains("collapsed")) {
        return;
    }


    usuariosDropdownContainer.classList.toggle("open");

});



/* =====================================================
   CERRAR DROPDOWN AL HACER CLICK FUERA
===================================================== */

document.addEventListener("click", function (event) {

    if (!usuariosDropdownContainer.contains(event.target)) {

        usuariosDropdownContainer.classList.remove("open");

    }

});