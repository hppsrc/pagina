<?php 

    include 'php/auth/header_extra_check.php';

    echo '
        <header>
            <a href="inicio.php" style="text-decoration: none; color: #000" title="Ir a pagina principal">
                <img alt="Logo de CulturaTech" title="CulturaTech" src="res\icons\smile.svg" width="64px">
                <div id="divcol">
                    <h1> CulturaTech </h1>
                    <p><small> Slogan de culturaTech</small></p>
                </div>
            </a>
            <div style="flex-grow: 1;"></div>
        ';
    // if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    //     echo '<div id="msgbox">0</div>';
    // }
    echo '
            <div id="divcol" style="text-align: right;">
                <p id="username"><b> (Sin acceder) </b></p>
                <p id="userrole"><b> Invitado </b></p>
                <p id="actions"> Acciones </p>
            </div>
        </header>
    ';
    echo '<nav id="nav">';
    echo ' <a href="inicio.php">Explorar videos</a>';
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { //user has not login
        echo ' <a href="usuario.php">Mi usuario</a>';
        echo ' <a href="video.php?id='.$_SESSION["video_id"].'">Mi publicación</a>';
        echo ' <a href="php/auth/end_session.php">Cerrar sesión</a>';
    } 
    else {
        echo ' <a href="registro.php">Acceder / Registrarse</a>';
    }
    echo '</nav>';
?>