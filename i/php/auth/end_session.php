<?php

    session_start();
    include 'connetion.php';
    session_destroy();
    header("Location: ../../inicio.php");

?>