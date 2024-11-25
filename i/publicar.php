<?php

    session_start();
    include 'php/auth/connection.php';

    if(isset($_SESSION['header_to'])){
        
        header($_SESSION['header_to']);
        exit();

    } else {
        
        $sql = "SELECT * FROM video WHERE user_id = '$_SESSION[login_id]'";
        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) > 0 ) {

            $row = mysqli_fetch_assoc($result);
            
            echo '<script>alert("Ya haz publicado un video anteriormente.");setTimeout(1000);window.location.reload();</script>';

            $_SESSION['header_to'] = "Location: video.php?id=".$row["videoID"];

        } 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="Publicar un video">

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

        <div class="row">
            <h2 >¿Necesitas ayuda?</h2>
            <button id="guidemodel">Guía</button>
            <p style="color: darkcyan; margin-left: 1%;">Recomendado</p>
        </div>

        <form method="post">
            
            <div class="row">
                <label for="title"> Titulo </label>
                <input type="text" id="title" name="title" minlength="3" maxlength="100" required>
            </div>

            <div class="row" style="align-items: flex-start;">
                <label for="description"> Descripción  </label>
                <textarea rows="10" id="description" name="description" minlength="10" maxlength="500" required></textarea>
                <!-- <input type="text" id="description" name="description" minlength="10" maxlength="500" required> -->
            </div>

            <div class="row">
                <img src="res/icons/help-circle.svg" onmousemove="showInfo(5)" onmouseleave="showInfo(-1)" style="margin: 0 1%">
                <label for="yt_id" style="flex-grow: 2;" > Link del video </label>
                <input type="text" id="yt_id" name="yt_id" minlength="11" maxlength="11" required>
            </div>

            <div class="row">
                <img src="res/icons/help-circle.svg" onmousemove="showInfo(3)" onmouseleave="showInfo(-1)" style="margin: 0 1%">
                <label for="presentation" style="flex-grow: 2;" > Link de presentación </label>
                <input type="text" id="presentation" name="presentation" maxlength="200">
            </div>

            <div class="row" style="justify-content: flex-start;">
                <img src="res/icons/help-circle.svg" onmousemove="showInfo(4)" onmouseleave="showInfo(-1)" style="margin: 0 1%">
                <input type="checkbox" name="private" id="private" style="flex-basis: 2%" checked>
                <label for="private" > Mostrar en videos recientes </label>
            </div>

            <br><hr><br>

            <label for="publish">Todo listo? Entonces...</label>
            <input id="publish" type="submit" name="publish" value="Publicar ahora" style="display: none;">

        </form>

        <button id="pre-publish">Publicar ahora</button>

    </main>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = filter_input(INPUT_POST,"title", FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_SPECIAL_CHARS);
        $yt_id = filter_input(INPUT_POST,"yt_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $presentation = isset($_POST['presentation']) ? $presentation = filter_input(INPUT_POST,"presentation", FILTER_SANITIZE_SPECIAL_CHARS) : NULL;
        $private = isset($_POST['private']) ? 1 : 0;

        if (isset($_POST['publish'])) {
            
            if( isset($title) && isset($description) && isset($yt_id) ) {
                
                $sqlID = "SELECT RIGHT(UNIX_TIMESTAMP(NOW()) + (MICROSECOND(NOW()) * 123123) + 111111, 6) AS NewID";
                $resultID = mysqli_query($conn, $sqlID);
                $rowID = mysqli_fetch_assoc($resultID);
                $NewID = $rowID['NewID'];
                $sql = "SELECT * FROM video WHERE videoID = '$NewID'";
                $result = mysqli_query($conn, $sql);

                if ( mysqli_num_rows($result) > 0 ) {
                    
                    echo '<script>alert("El video no pudo ser publicado, pero no es tu culpa!\nIntenta nuevamente.")</script>';

                } else {

                    $sqlPost = "INSERT INTO `video` (`user_id`, `videoID`, `title`, `yt_id`, `views`, `description`, `date`, `presentation`, `private`, `edit`, `reports`)
                                VALUES ('$_SESSION[login_id]', '$NewID' , '$title', '$yt_id', '0', '$description', current_timestamp(), '$presentation', '$private', '1', '0' );";
                    $resultPost = mysqli_query($conn, $sqlPost);
                    
                    echo '<script>alert("El video fue publicado correctamente.")</script>';

                    $_SESSION['header_to'] = "Location: video.php?id=$NewID";

                }

            }

        }

    }

    include 'php/auth/session_manager.php';

?>