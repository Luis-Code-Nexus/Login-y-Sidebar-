<?php

session_start();



?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Productos | TIZCOMICS</title>


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


    <link rel="stylesheet" href="productos.css">

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

        <a href="sidebar-last.php"
           class="nav-item">

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
           class="nav-item active">

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

        <a href="#"
           class="nav-item ">

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

            <button
                type="button"
                class="logout-button"
                title="Cerrar sesión">

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
                <i class="fa-solid fa-box"></i>
                Productos
            </h1>

          

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

          
                <?= $_SESSION['usuario_email'] ?>
         

        </div>

    </header>



    <!-- =================================================
         CONTENIDO
    ================================================== -->

    <section class="content">


        <!-- ========================================================================================
             CONTENIDO PRINCIPAL
        ================================================== -->

       <div class="content-box">
  <h2>Productos</h2>

  <div class="productos-grid">

    <!-- ================= CARD 1 ================= -->

    <div class="productos-card">

        <img 
            src="img/Avengers.jpg" 
            class="productos-card-img"
            alt="Avengers">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Avengers
            </h5>

            <p class="productos-card-text">
                Cómic clásico de Marvel con los principales
                héroes de los Avengers.
            </p>

          
        </div>

        
        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 2 ================= -->

    <div class="productos-card">

        <img 
            src="img/spiderman.jpg" 
            class="productos-card-img"
            alt="Spider-Man">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Spider-Man
            </h5>

            <p class="productos-card-text">
                Historia y aventuras del famoso héroe
                Spider-Man de Marvel.
            </p>
 <button type="button" class="btn btn-primary">Ver mas</button>
        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 3 ================= -->

    <div class="productos-card">

        <img 
            src="img/4-fantasticos.jpeg" 
            class="productos-card-img"
            alt="Los 4 Fantásticos">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Los 4 Fantásticos
            </h5>

            <p class="productos-card-text">
                Cómic de Marvel protagonizado por
                Mister Fantastic, Invisible Woman,
                Human Torch y The Thing.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>

     <!-- ================= CARD 4 ================= -->

    <div class="productos-card">

        <img 
            src="img/x-men.jpg" 
            class="productos-card-img"
            alt="Los X-MEN" >

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                X-MEN
            </h5>

            <p class="productos-card-text">
                Cómic de Marvel protagonizado por
                Mister Fantastic, Invisible Woman,
                Human Torch y The Thing.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


        <!-- ================= CARD 5 ================= -->

    <div class="productos-card">

        <img 
            src="img/secret.jpg" 
            class="productos-card-img"
            alt="Secret Wars">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Avengers Secret Wars
            </h5>

            <p class="productos-card-text">
                Cómic Clasico de las incursiones de otras tierras.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 6 ================= -->

    <div class="productos-card">

        <img 
            src="img/inhumans.jpg" 
            class="productos-card-img"
            alt="Spider-Man">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Los Inhumanos
            </h5>

            <p class="productos-card-text">
                Historia y aventuras de
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 7 ================= -->

    <div class="productos-card">

        <img 
            src="img/daredevil.jpg" 
            class="productos-card-img"
            alt="Daredevil">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Daredevil
            </h5>

            <p class="productos-card-text">
                Cómic de Marvel protagonizado por
                Mister Fantastic, Invisible Woman,
                Human Torch y The Thing.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>

     <!-- ================= CARD 8 ================= -->

    <div class="productos-card">

        <img 
            src="img/ultimate.jpg" 
            class="productos-card-img"
            alt="ultimate" >

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Ultimate Invasion
            </h5>

            <p class="productos-card-text">
                Cómic de Marvel protagonizado por
                Mister Fantastic, Invisible Woman,
                Human Torch y The Thing.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


        <!-- ================= CARD 9 ================= -->

    <div class="productos-card">

        <img 
            src="img/thunderbolts.jpg" 
            class="productos-card-img"
            alt="thunderbolts">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Los Thunderbolts
            </h5>

            <p class="productos-card-text">
                Cómic clásico de Marvel con los principales
                héroes de los Avengers.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 10 ================= -->

    <div class="productos-card">

        <img 
            src="img/deadpool.jpg" 
            class="productos-card-img"
            alt="deadpool">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Deadpool
            </h5>

            <p class="productos-card-text">
                Deadpool mata a todos los superheroes del Universo marvel.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>


    <!-- ================= CARD 11 ================= -->

    <div class="productos-card">

        <img 
            src="img/punisher.jpg" 
            class="productos-card-img"
            alt="punisher">

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                The Punisher
            </h5>

            <p class="productos-card-text">
                Frank Castle es un exmilitar y busca venganza.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

        </div>

    </div>

     <!-- ================= CARD 12 ================= -->

    <div class="productos-card">

        <img 
            src="img/zombie.jpg" 
            class="productos-card-img"
            alt="zombie" >

        <div class="productos-card-body">

            <h5 class="productos-card-title">
                Marvel Zombies
            </h5>

            <p class="productos-card-text">
                Adentrate en una historia de terror de marvel comics.
            </p>

        </div>

        <div class="productos-card-footer">

            <small>
                Última actualización hace 3 minutos
            </small>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>