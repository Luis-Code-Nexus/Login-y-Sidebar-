
<?php

session_start();

/* ============================================================
   CONFIGURACIÓN DE LA BASE DE DATOS
============================================================ */

$host = "localhost";
$dbname = "login";
$dbuser = "root";
$dbpass = "";


/* ============================================================
   CONEXIÓN A MYSQL
============================================================ */

try {

    $conexion = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $dbuser,
        $dbpass
    );

    $conexion->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $conexion->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

} catch (PDOException $e) {

    die(
        "Error de conexión con MySQL: "
        . $e->getMessage()
    );

}


/* ============================================================
   VARIABLES
============================================================ */

$mensaje = "";
$tipoMensaje = "";


/* ============================================================
   PROCESAR FORMULARIOS
============================================================ */

if ($_SERVER["REQUEST_METHOD"] === "POST") {


    /* ========================================================
       LOGIN
    ======================================================== */

    if (isset($_POST["login"])) {

        $email = trim(
            $_POST["login_email"] ?? ""
        );

        $password = $_POST["login_password"] ?? "";


        /* ----------------------------------------------------
           VALIDAR CAMPOS
        ---------------------------------------------------- */

        if (
            empty($email) ||
            empty($password)
        ) {

            $mensaje = "Completa todos los campos.";
            $tipoMensaje = "error";

        } else {


            try {

                /* ------------------------------------------------
                   BUSCAR USUARIO
                ------------------------------------------------ */

                $sql = "
                    SELECT *
                    FROM usuarios
                    WHERE email = :email
                    LIMIT 1
                ";

                $stmt = $conexion->prepare($sql);

                $stmt->execute([
                    ":email" => $email
                ]);

                $usuario = $stmt->fetch();


                /* ------------------------------------------------
                   USUARIO NO EXISTE
                ------------------------------------------------ */

                if (!$usuario) {

                    $mensaje =
                        "El correo o la contraseña son incorrectos.";

                    $tipoMensaje = "error";

                }


                /* ------------------------------------------------
                   CUENTA INACTIVA
                ------------------------------------------------ */

                elseif (
                    isset($usuario["estado"]) &&
                    $usuario["estado"] !== "activo"
                ) {

                    $mensaje =
                        "Tu cuenta se encuentra inactiva.";

                    $tipoMensaje = "error";

                }


                /* ------------------------------------------------
                   VERIFICAR CONTRASEÑA
                ------------------------------------------------ */

                elseif (
                    !password_verify(
                        $password,
                        $usuario["password"]
                    )
                ) {

                    $mensaje =
                        "El correo o la contraseña son incorrectos.";

                    $tipoMensaje = "error";

                }


                /* ------------------------------------------------
                   LOGIN CORRECTO
                ------------------------------------------------ */

                else {

                    /*
                     * Regenerar ID de sesión
                     */
                    session_regenerate_id(true);


                    /*
                     * Guardar información del usuario
                     */
                    $_SESSION["usuario_id"] =
                        $usuario["id"];

                    $_SESSION["usuario_nombre"] =
                        $usuario["nombre"];

                    $_SESSION["usuario_apellido"] =
                        $usuario["apellido"];

                    $_SESSION["usuario_email"] =
                        $usuario["email"];

                    $_SESSION["usuario_telefono"] =
                        $usuario["telefono"];

                    $_SESSION["usuario_rol"] =
                        $usuario["rol"];

                    $_SESSION["usuario_cargo"] =
                        $usuario["cargo"];

                    $_SESSION["usuario_departamento"] =
                        $usuario["departamento"];

                    $_SESSION["usuario_foto"] =
                        $usuario["foto"];

                    $_SESSION["usuario_estado"] =
                        $usuario["estado"];


                    /*
                     * Variable para comprobar
                     * que existe una sesión válida.
                     */
                    $_SESSION["logueado"] = true;


                    /*
                     * Recordarme
                     */
                    if (isset($_POST["remember"])) {

                        setcookie(
                            "usuario_recordado",
                            $usuario["id"],
                            time() + (86400 * 30),
                            "/",
                            "",
                            false,
                            true
                        );

                    }


                    /*
                     * REDIRECCIÓN
                     */
                    header(
                        "Location: sidebar-last.php"
                    );

                    exit;

                }


            } catch (PDOException $e) {

                $mensaje =
                    "Ocurrió un error al iniciar sesión.";

                $tipoMensaje = "error";

            }

        }

    }


    /* ========================================================
       REGISTRO
    ======================================================== */

    elseif (isset($_POST["register"])) {


        /* ----------------------------------------------------
           RECIBIR DATOS
        ---------------------------------------------------- */

        $nombre = trim(
            $_POST["register_name"] ?? ""
        );

        $apellido = trim(
            $_POST["register_lastname"] ?? ""
        );

        $telefono = trim(
            $_POST["register_phone"] ?? ""
        );

        $email = trim(
            $_POST["register_email"] ?? ""
        );

        $password =
            $_POST["register_password"] ?? "";

        $confirmPassword =
            $_POST["register_confirm"] ?? "";


        /* ----------------------------------------------------
           VALIDAR CAMPOS VACÍOS
        ---------------------------------------------------- */

        if (
            empty($nombre) ||
            empty($apellido) ||
            empty($telefono) ||
            empty($email) ||
            empty($password) ||
            empty($confirmPassword)
        ) {

            $mensaje =
                "Completa todos los campos.";

            $tipoMensaje = "error";

        }


        /* ----------------------------------------------------
           VALIDAR EMAIL
        ---------------------------------------------------- */

        elseif (
            !filter_var(
                $email,
                FILTER_VALIDATE_EMAIL
            )
        ) {

            $mensaje =
                "Introduce un correo electrónico válido.";

            $tipoMensaje = "error";

        }


        /* ----------------------------------------------------
           VALIDAR LONGITUD DE CONTRASEÑA
        ---------------------------------------------------- */

        elseif (
            strlen($password) < 8
        ) {

            $mensaje =
                "La contraseña debe tener al menos 8 caracteres.";

            $tipoMensaje = "error";

        }


        /* ----------------------------------------------------
           CONFIRMAR CONTRASEÑA
        ---------------------------------------------------- */

        elseif (
            $password !== $confirmPassword
        ) {

            $mensaje =
                "Las contraseñas no coinciden.";

            $tipoMensaje = "error";

        }


        /* ----------------------------------------------------
           REGISTRAR
        ---------------------------------------------------- */

        else {


            try {


                /* ==============================================
                   COMPROBAR CORREO EXISTENTE
                ============================================== */

                $sql = "
                    SELECT id
                    FROM usuarios
                    WHERE email = :email
                    LIMIT 1
                ";

                $stmt =
                    $conexion->prepare($sql);

                $stmt->execute([
                    ":email" => $email
                ]);

                $usuarioExiste =
                    $stmt->fetch();


                if ($usuarioExiste) {

                    $mensaje =
                        "Este correo ya está registrado.";

                    $tipoMensaje = "error";

                } else {


                    /* ==========================================
                       ENCRIPTAR CONTRASEÑA
                    ========================================== */

                    $passwordHash =
                        password_hash(
                            $password,
                            PASSWORD_DEFAULT
                        );


                    /* ==========================================
                       DATOS PREDETERMINADOS
                    ========================================== */

                    $cargo = "Usuario";

                    $departamento = null;

                    $foto = null;

                    $rol = "usuario";

                    $estado = "activo";


                    /* ==========================================
                       INSERTAR USUARIO
                    ========================================== */

                    $sql = "
                        INSERT INTO usuarios (
                            nombre,
                            apellido,
                            telefono,
                            email,
                            password,
                            cargo,
                            departamento,
                            foto,
                            rol,
                            estado
                        )

                        VALUES (
                            :nombre,
                            :apellido,
                            :telefono,
                            :email,
                            :password,
                            :cargo,
                            :departamento,
                            :foto,
                            :rol,
                            :estado
                        )
                    ";


                    $stmt =
                        $conexion->prepare($sql);


                    $stmt->execute([

                        ":nombre" =>
                            $nombre,

                        ":apellido" =>
                            $apellido,

                        ":telefono" =>
                            $telefono,

                        ":email" =>
                            $email,

                        ":password" =>
                            $passwordHash,

                        ":cargo" =>
                            $cargo,

                        ":departamento" =>
                            $departamento,

                        ":foto" =>
                            $foto,

                        ":rol" =>
                            $rol,

                        ":estado" =>
                            $estado

                    ]);


                    /* ==========================================
                       OBTENER ID
                    ========================================== */

                    $usuarioId =
                        $conexion->lastInsertId();


                    /* ==========================================
                       CREAR SESIÓN
                    ========================================== */

                    session_regenerate_id(true);


                    $_SESSION["logueado"] =
                        true;

                    $_SESSION["usuario_id"] =
                        $usuarioId;

                    $_SESSION["usuario_nombre"] =
                        $nombre;

                    $_SESSION["usuario_apellido"] =
                        $apellido;

                    $_SESSION["usuario_email"] =
                        $email;

                    $_SESSION["usuario_telefono"] =
                        $telefono;

                    $_SESSION["usuario_rol"] =
                        $rol;

                    $_SESSION["usuario_cargo"] =
                        $cargo;

                    $_SESSION["usuario_departamento"] =
                        $departamento;

                    $_SESSION["usuario_foto"] =
                        $foto;

                    $_SESSION["usuario_estado"] =
                        $estado;


                    /* ==========================================
                       ENTRAR AUTOMÁTICAMENTE AL DASHBOARD
                    ========================================== */

                    header(
                        "Location: sidebar-last.php"
                    );

                    exit;

                }


            } catch (PDOException $e) {

                $mensaje =
                    "Error al registrar el usuario: "
                    . $e->getMessage();

                $tipoMensaje = "error";

            }

        }

    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Iniciar Sesión</title>


    <!-- =====================================================
         GOOGLE FONT
    ====================================================== -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- =====================================================
         FONT AWESOME
    ====================================================== -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    <!-- =====================================================
         CSS
    ====================================================== -->

    <link
        rel="stylesheet"
        href="login.css"
    >

</head>


<body>


<div class="auth-page">

    <div class="auth-container">


        <!-- =================================================
             PARTE IZQUIERDA
        ================================================== -->

        <section class="welcome-panel">

            <div class="welcome-overlay"></div>


            <!-- MUNDO -->

            <div class="world-container">

                <div class="world-glow"></div>

                <div class="world">

                    <div class="world-line line-one"></div>
                    <div class="world-line line-two"></div>
                    <div class="world-line line-three"></div>

                    <div class="world-horizontal horizontal-one"></div>
                    <div class="world-horizontal horizontal-two"></div>
                    <div class="world-horizontal horizontal-three"></div>

                    <div class="world-dot dot-one"></div>
                    <div class="world-dot dot-two"></div>
                    <div class="world-dot dot-three"></div>
                    <div class="world-dot dot-four"></div>
                    <div class="world-dot dot-five"></div>

                </div>

            </div>


            <div class="welcome-content">

                <div class="brand">

                    <div class="brand-icon">

                        <i class="fa-solid fa-globe"></i>

                    </div>

                    <span>
                        MY<span>WORLD</span>
                    </span>

                </div>


                <h1>

                    Bienvenido a

                    <strong>
                        nuestro mundo.
                    </strong>

                </h1>


                <p>

                    Conéctate, descubre nuevas oportunidades
                    y disfruta de una experiencia diseñada para ti.

                </p>


                <div class="welcome-line"></div>


                <div class="welcome-info">

                    <div>

                        <i class="fa-solid fa-shield-halved"></i>

                        <span>
                            Acceso seguro
                        </span>

                    </div>


                    <div>

                        <i class="fa-solid fa-earth-americas"></i>

                        <span>
                            Conexión global
                        </span>

                    </div>

                </div>

            </div>

        </section>


        <!-- =================================================
             PARTE DERECHA
        ================================================== -->

        <section class="form-panel">

            <div class="form-wrapper">


                <!-- =================================================
                     LOGIN
                ================================================== -->

                <div class="form-content login-content active">


                    <div class="form-header">

                        <div class="mobile-logo">

                            <i class="fa-solid fa-globe"></i>

                        </div>


                        <span class="form-small-title">

                            BIENVENIDO DE NUEVO

                        </span>


                        <h2>
                            Iniciar sesión
                        </h2>


                        <p>

                            Ingresa tus datos para continuar.

                        </p>

                    </div>


                    <?php

                    if (
                        !empty($mensaje) &&
                        isset($_POST["login"])
                    ):

                    ?>

                        <div
                            class="message <?php echo htmlspecialchars($tipoMensaje); ?>"
                        >

                            <?php

                            echo htmlspecialchars(
                                $mensaje
                            );

                            ?>

                        </div>

                    <?php endif; ?>


                    <form
                        method="POST"
                        action=""
                        class="auth-form"
                    >


                        <!-- CORREO -->

                        <div class="input-group">

                            <label for="login_email">

                                Correo electrónico

                            </label>


                            <div class="input-box">

                                <i
                                    class="fa-regular fa-envelope"
                                ></i>


                                <input
                                    type="email"
                                    id="login_email"
                                    name="login_email"
                                    placeholder="ejemplo@correo.com"
                                    autocomplete="email"
                                    required
                                >

                            </div>

                        </div>


                        <!-- CONTRASEÑA -->

                        <div class="input-group">

                            <label for="login_password">

                                Contraseña

                            </label>


                            <div class="input-box">

                                <i
                                    class="fa-solid fa-lock"
                                ></i>


                                <input
                                    type="password"
                                    id="login_password"
                                    name="login_password"
                                    placeholder="Introduce tu contraseña"
                                    autocomplete="current-password"
                                    required
                                >


                                <button
                                    type="button"
                                    class="password-toggle"
                                    data-target="login_password"
                                >

                                    <i
                                        class="fa-regular fa-eye"
                                    ></i>

                                </button>

                            </div>

                        </div>


                        <!-- OPCIONES -->

                        <div class="form-options">

                            <label class="remember">

                                <input
                                    type="checkbox"
                                    name="remember"
                                >

                                <span>
                                    Recordarme
                                </span>

                            </label>


                            <a
                                href="#"
                                class="forgot-password"
                            >

                                ¿Olvidaste tu contraseña?

                            </a>

                        </div>


                        <!-- BOTÓN LOGIN -->

                        <button
                            type="submit"
                            name="login"
                            class="submit-button"
                        >

                            <span>
                                Iniciar sesión
                            </span>

                            <i
                                class="fa-solid fa-arrow-right"
                            ></i>

                        </button>


                    </form>


                    <div class="switch-form">

                        <span>

                            ¿No tienes una cuenta?

                        </span>


                        <button
                            type="button"
                            id="showRegister"
                        >

                            Regístrate

                        </button>

                    </div>


                </div>


                <!-- =================================================
                     REGISTRO
                ================================================== -->

                <div class="form-content register-content">


                    <div class="form-header">

                        <div class="mobile-logo">

                            <i
                                class="fa-solid fa-user-plus"
                            ></i>

                        </div>


                        <span class="form-small-title">

                            CREA TU CUENTA

                        </span>


                        <h2>
                            Registrarse
                        </h2>


                        <p>

                            Crea tu cuenta y comienza ahora.

                        </p>

                    </div>


                    <?php

                    if (
                        !empty($mensaje) &&
                        isset($_POST["register"])
                    ):

                    ?>

                        <div
                            class="message <?php echo htmlspecialchars($tipoMensaje); ?>"
                        >

                            <?php

                            echo htmlspecialchars(
                                $mensaje
                            );

                            ?>

                        </div>

                    <?php endif; ?>


                    <form
                        method="POST"
                        action=""
                        class="auth-form register-form"
                    >


                        <div class="register-scroll">


                            <!-- NOMBRE -->

                            <div class="input-group">

                                <label for="register_name">

                                    Nombre

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-regular fa-user"
                                    ></i>


                                    <input
                                        type="text"
                                        id="register_name"
                                        name="register_name"
                                        placeholder="Tu nombre"
                                        autocomplete="given-name"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- APELLIDO -->

                            <div class="input-group">

                                <label for="register_lastname">

                                    Apellido

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-regular fa-user"
                                    ></i>


                                    <input
                                        type="text"
                                        id="register_lastname"
                                        name="register_lastname"
                                        placeholder="Tu apellido"
                                        autocomplete="family-name"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- TELÉFONO -->

                            <div class="input-group">

                                <label for="register_phone">

                                    Teléfono

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-solid fa-phone"
                                    ></i>


                                    <input
                                        type="tel"
                                        id="register_phone"
                                        name="register_phone"
                                        placeholder="809-000-0000"
                                        autocomplete="tel"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- CORREO -->

                            <div class="input-group">

                                <label for="register_email">

                                    Correo electrónico

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-regular fa-envelope"
                                    ></i>


                                    <input
                                        type="email"
                                        id="register_email"
                                        name="register_email"
                                        placeholder="ejemplo@correo.com"
                                        autocomplete="email"
                                        required
                                    >

                                </div>

                            </div>


                            <!-- CONTRASEÑA -->

                            <div class="input-group">

                                <label for="register_password">

                                    Contraseña

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-solid fa-lock"
                                    ></i>


                                    <input
                                        type="password"
                                        id="register_password"
                                        name="register_password"
                                        placeholder="Crea una contraseña"
                                        autocomplete="new-password"
                                        required
                                    >


                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="register_password"
                                    >

                                        <i
                                            class="fa-regular fa-eye"
                                        ></i>

                                    </button>

                                </div>

                            </div>


                            <!-- CONFIRMAR CONTRASEÑA -->

                            <div class="input-group">

                                <label for="register_confirm">

                                    Confirmar contraseña

                                </label>


                                <div class="input-box">

                                    <i
                                        class="fa-solid fa-lock"
                                    ></i>


                                    <input
                                        type="password"
                                        id="register_confirm"
                                        name="register_confirm"
                                        placeholder="Repite tu contraseña"
                                        autocomplete="new-password"
                                        required
                                    >


                                    <button
                                        type="button"
                                        class="password-toggle"
                                        data-target="register_confirm"
                                    >

                                        <i
                                            class="fa-regular fa-eye"
                                        ></i>

                                    </button>

                                </div>

                            </div>


                        </div>


                        <!-- BOTÓN REGISTRO -->

                        <button
                            type="submit"
                            name="register"
                            class="submit-button"
                        >

                            <span>
                                Crear cuenta
                            </span>

                            <i
                                class="fa-solid fa-arrow-right"
                            ></i>

                        </button>


                    </form>


                    <div class="switch-form">

                        <span>

                            ¿Ya tienes una cuenta?

                        </span>


                        <button
                            type="button"
                            id="showLogin"
                        >

                            Inicia sesión

                        </button>

                    </div>


                </div>


            </div>

        </section>


    </div>

</div>


<!-- ============================================================
     JAVASCRIPT
============================================================ -->

<script src="login.js"></script>


</body>

</html>

