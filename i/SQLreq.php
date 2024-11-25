<?php

    session_start();
    include 'php/auth/connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="SQLreq">

    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>

    <title>Cargando...</title>

    <?php include 'php/page/meta.php'; ?>

</head>

<body>

    <?php include 'php/page/modal.php'; ?>
    <?php include 'php/page/info.php'; ?>
    <?php include 'php/page/header.php'; ?>

    <main id="publicar">

        

    </main>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>

<?php

    $sqlTimeID = "SELECT RIGHT(UNIX_TIMESTAMP(NOW()) + (MICROSECOND(NOW()) * 123123) + 111111, 6) AS NewID";
    $resultSQLTime = mysqli_query($conn, $sqlTimeID);
    $sql = "SELECT * FROM video WHERE videoID = ($sqlTimeID)";
    $result = mysqli_query($conn, $sql);

    if ( mysqli_num_rows($result) > 0 ) {

        $row = mysqli_fetch_assoc($result);
        
        echo 'el id existe';

    } else {

        $row = mysqli_fetch_assoc($resultSQLTime);
        
        echo 'el id '.$row["NewID"].' no existe';

    }

    include 'php/auth/session_manager.php';

?>