<?php

session_start();



?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard | TIZCOMICS</title>


    <!-- =====================================================
         FUENTE
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

 

    <link rel="stylesheet" href="sidebar.css">

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside class="sidebar" id="sidebar">


    <!-- HEADER -->

    <div class="sidebar-header">

        <div class="brand">

            <div class="brand-icon">

                <i class="fa-solid fa-layer-group"></i>

            </div>

            <span class="brand-name">
                TIZCOMICS
            </span>

        </div>


        <!-- BOTÓN CONTRAER -->

        <button
            type="button"
            class="sidebar-toggle"
            id="sidebarToggle"
            title="Contraer menú">

            <i class="fa-solid fa-chevron-left"></i>

        </button>

    </div>



    <!-- =================================================
         NAVEGACIÓN
    ================================================== -->

    <nav class="sidebar-nav">


        <!-- TÍTULO -->

        <div class="nav-title">
            PRINCIPAL
        </div>



        <!-- =================================================
             DASHBOARD
        ================================================== -->

        <a href="#"
           class="nav-item active">

            <span class="nav-icon">

                <i class="fa-solid fa-house"></i>

            </span>

            <span class="nav-text">
                Dashboard
            </span>

        </a>



        <!-- =================================================
             USUARIOS - DROPDOWN
        ================================================== -->

        <div class="nav-dropdown"
             id="usuariosDropdownContainer">

            <!-- BOTÓN USUARIOS -->

            <button
                type="button"
                class="nav-item nav-dropdown-toggle"
                id="usuariosDropdownButton">

                <span class="nav-icon">

                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="nav-text">
                    Usuarios
                </span>


                <span class="dropdown-arrow">

                    <i class="fa-solid fa-chevron-down"></i>

                </span>

            </button>



            <!-- =================================================
                 OPCIONES DEL DROPDOWN
            ================================================== -->

            <div class="nav-dropdown-menu"
                 id="usuariosDropdownMenu">


                <!-- VER USUARIOS -->

                <a href="usuarios.php"
                   class="nav-dropdown-item">

                    <span class="dropdown-item-icon">

                        <i class="fa-solid fa-user-group"></i>

                    </span>

                    <span>
                        Ver usuarios
                    </span>

                </a>



                <!-- REGISTRAR USUARIO -->

                <a href="registrar_usuario.php"
                   class="nav-dropdown-item">

                    <span class="dropdown-item-icon">

                        <i class="fa-solid fa-user-plus"></i>

                    </span>

                    <span>
                        Registrar usuario
                    </span>

                </a>

            </div>

        </div>



        <!-- =================================================
             PRODUCTOS
        ================================================== -->

        <a href="productos.php"
           class="nav-item">

            <span class="nav-icon">

                <i class="fa-solid fa-box"></i>

            </span>

            <span class="nav-text">
                Productos
            </span>

        </a>



        <!-- =================================================
             VENTAS
        ================================================== -->

        <a href="Ventas.php"
           class="nav-item">

            <span class="nav-icon">

                <i class="fa-solid fa-cart-shopping"></i>

            </span>

            <span class="nav-text">
                Ventas
            </span>

        </a>



        <!-- =================================================
             REPORTES
        ================================================== -->

        <a href="#"
           class="nav-item">

            <span class="nav-icon">

                <i class="fa-solid fa-chart-column"></i>

            </span>

            <span class="nav-text">
                Reportes
            </span>

        </a>



        <!-- =================================================
             CONFIGURACIÓN
        ================================================== -->

        <div class="nav-title configuration-title">

            CONFIGURACIÓN

        </div>



        <!-- CONFIGURACIÓN -->

        <a href="#"
           class="nav-item">

            <span class="nav-icon">

                <i class="fa-solid fa-gear"></i>

            </span>

            <span class="nav-text">
                Configuración
            </span>

        </a>



        <!-- AYUDA -->

        <a href="#"
           class="nav-item">

            <span class="nav-icon">

                <i class="fa-solid fa-circle-question"></i>

            </span>

            <span class="nav-text">
                Ayuda
            </span>

        </a>

    </nav>



    <!-- =================================================
         PERFIL
    ================================================== -->

    <div class="sidebar-footer">


        <div class="profile">


            <!-- AVATAR -->

            <div class="profile-avatar">
                HC
            </div>


            <!-- INFORMACIÓN -->

            <div class="profile-info">

                <strong>
                     <?= $_SESSION['usuario_nombre'] ?>
                </strong>

                <span>
                     <?= $_SESSION['usuario_rol'] ?>
                </span>

            </div>


            <!-- configuracion de cuenta -->

            <button  type="button"  class="logout-button"  title="Configuracion">

              <a href="edit-perfil.php"> <i class="fa-solid fa-gear"></i></a>

            </button>

            <!-- CERRAR SESIÓN -->

            <button type="button" class="logout-button" title="Cerrar sesión">

                <i class="fa-solid fa-right-from-bracket"></i>

            </button>

        </div>

    </div>

</aside>



<!-- =====================================================
     CONTENIDO PRINCIPAL
===================================================== -->

<main class="main-content"
      id="mainContent">


    <!-- =================================================
         TOPBAR
    ================================================== -->

    <header class="topbar">


        <div class="topbar-title">

            <h1>
                Dashboard
            </h1>

            <p>
                Bienvenido nuevamente 👋
            </p>

        </div>


        <div class="topbar-right">


            <!-- NOTIFICACIONES -->

            <button
                type="button"
                class="notification-button"
                title="Notificaciones">

                <i class="fa-regular fa-bell"></i>

                <span></span>

            </button>


            <!-- AVATAR -->

           <div class="modal-dialog modal-dialog-scrollable">
 <?= $_SESSION['usuario_email'] ?>
</div>
                 
           

        </div>

    </header>



    <!-- =================================================
         CONTENIDO
    ================================================== -->

    <section class="content">


        <!-- =================================================
             TARJETA DE BIENVENIDA
        ================================================== -->

        <div class="welcome-card">


            <div class="welcome-content">

                <span class="welcome-label">
                    PANEL DE CONTROL
                </span>


                <h2>
                    Bienvenido a tu Dashboard
                </h2>


                <p>
                    Administra tus usuarios, productos,
                    ventas y estadísticas desde un solo lugar.
                </p>

            </div>


            <i class="fa-solid fa-chart-simple welcome-icon"></i>

        </div>


        <!-- =================================================
             TARJETAS
        ================================================== -->

        <div class="cards">


            <!-- USUARIOS -->

            <div class="card">

                <div class="card-icon">

                    <i class="fa-solid fa-users"></i>

                </div>

                <div>

                    <span>
                        Usuarios
                    </span>

                    <h3>
                        1,284
                    </h3>

                </div>

            </div>



            <!-- PRODUCTOS -->

            <div class="card card-productos">

                <div class="card-icon">

                    <i class="fa-solid fa-box"></i>

                </div>

                <div>

                    <span>
                        Productos
                    </span>

                    <h3>
                        520
                    </h3>

                </div>

            </div>



            <!-- VENTAS -->

            <div class="card card-ventas">

                <div class="card-icon">

                    <i class="fa-solid fa-cart-shopping"></i>

                </div>

                <div>

                    <span>
                        Ventas
                    </span>

                    <h3>
                        892
                    </h3>

                </div>

            </div>



            <!-- INGRESOS -->

            <div class="card card-ingresos">

                <div class="card-icon">

                    <i class="fa-solid fa-dollar-sign"></i>

                </div>

                <div>

                    <span>
                        Ingresos
                    </span>

                    <h3>
                        $24,580
                    </h3>

                </div>

            </div>

        </div>



        <!-- =================================================
             CONTENIDO PRINCIPAL
        ================================================== -->

       <div class="content-box">
  <h2> Ultimos Comics</h2>

  <div class="container-fluid  row row-col-sm-6">
    <div class="col ms-3">
      <div class="card h-100">
        <img src="img/Avengers.jpg" class="card-img-top" alt="Avengers" width="200" alt="..."  height="280">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>

    <br>
 <div class="col ms-3">
      <div class="card h-100">
        <img src="img/spiderman.jpg" class="card-img-top" alt="Avengers" width="200" alt="..."  height="280">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>

    
    <br>
 <div class="col ms-3">
      <div class="card h-100">
        <img src="img/4-fantasticos.jpeg" class="card-img-top" alt="Avengers" width="200" alt="..."  height="280">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
 
</div>


 
    </section>

</main>



<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script src="script.js"></script>

</body>

</html>