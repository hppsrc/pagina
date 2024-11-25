<?php

    session_start();
    include 'php/auth/connection.php';
    if(isset($_SESSION['header_to'])){
        
        unset($_SESSION['header_to']);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="Video">

    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>

    <title>Cargando...</title>

    <?php include 'php/page/meta.php'; ?>

</head>

<body>

    <?php include 'php/page/modal.php'; ?>
    <?php include 'php/page/info.php'; ?>
    <?php include 'php/page/header.php'; ?>

    <main id="video">

    <?php

        try {
            if ( isset($_GET['id']) ) {
                


            } else {

                throw new Exception("No se especifico un video.");

            }
            
            if ( isset($_GET['id']) && $_GET['id'] == "new" ) {

                header("Location: publicar.php");

            }

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            echo '<script>document.getElementById("video").style.height = "54.5%"</script>';
        }


    ?>

    </main>
    
    <br>

    <?php include 'php/page/footer.php'; ?>


</body>
</html>

<?php

    require 'php/auth/session_manager.php';
    
?>