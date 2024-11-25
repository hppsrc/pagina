<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'video_bd';

    $conn = mysqli_connect(
        $host,
        $user,
        $password,
        $database
    );

    if (!$conn) { die("console.log('Error on connection.')< " . mysqli_connect_error()); }
    echo "<script>console.log('Connected to database.')</script>";

?>
