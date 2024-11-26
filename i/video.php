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
                
            }


        ?>

        <div class="area" style="max-width: 70%;">

            <!-- <iframe width="100%" height="415" src="https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ?&autoplay=1" title="YouTube video player" frameborder="0" allow="" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->

            
            <div class="row">
                <h1 id="videoTitle">...</h1>
                <h1 id="videoScore">⭐ 0,00</>
            </div>
            <p id="videoAuthor">Hecho por ...</p>
            
            <div class="row">
                <p id="videoDate">Publicado el ...</p>
                <p id="videoViews">... vistas</p>
                <b id="videoTeacherView" style="background-color: gold; padding: 0 5px;">La profesora ...</b>
            </div>

            <br><hr><br>

            <div class="row" id="videoPresentation">
                <p>Diapositiva disponible</p>
                <a href="" target="_blank" id="presentationTarget"> <button>Ver diapositiva</button> </a> 
            </div>
            
            <h3>Descripción del video</h3>
            <p id="videoDescription">...</p>

            <br><hr><br>

            <div class="row" >
                <p>Este video tiene contenido no relevante?</p>
                <a href="" id="reportVideo" > <button>Reportar este video</button> </a> 
            </div>

            <br><hr><br>

            <h3>Comentarios</h3>
            <small><p>Solo se muestran los ultimos 25 comentarios.</p></small>
            <!-- textarea here + comment button-->

            <form class="row" style="align-items: flex-start;">
                <p>Escribe tu comentario aquí:</p>
                <textarea name="videoCommetArea" id="videoCommetArea" rows="5" maxlength="500"></textarea>
                <input id="reportVideo" type="submit" value="Comentar en este video">
            </form>

            <br><hr>

            <div id="videoComments">
                <!-- <div class="comment">
                    <h3>Horacio dijo... <small><small>El 23/11 a las 4:00 PM</small></small></h3>
                    <p class="commentText">Soy un comentario</p>
                </div> -->
            </div>
            
        </div>

        <div class="area" style="max-width: 30%;">

            area

        </div>

    </main>
    
    <br>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>

<!-- todo post action to comments
     todo post action to vote
     todo both reduce view -1
     todo if not loged alert on post comment
     todo if not loged alert on post vote -->
<?php

    require 'php/auth/session_manager.php';
    require 'php/auth/video_manager.php';
    require 'php/auth/comments_manager.php';
    
?>

<!-- 
<form>
    <label for="numero">Ingresa un número entre 0.1 y 5.0:</label>
    <input 
        type="number" 
        id="numero" 
        min="0.1" 
        max="5.0" 
        step="0.1" 
        required 
        maxlength="3" 
        oninput="corregirValor(this)"
    >
</form>

<script>
    function corregirValor(input) {
        // Limitar a 3 caracteres
        if (input.value.length > 3) {
            input.value = input.value.slice(0, 3); // Recortar al máximo de 3 caracteres
        }

        // Convertir el valor a número
        const valor = parseFloat(input.value);
        if (valor > 5.0) {
            input.value = 5.0; // Si es mayor a 5.0, lo corrige a 5.0
        } else if (valor < 0.1) {
            input.value = 0.1; // Si es menor a 0.1, lo corrige a 0.1
        }
    }
</script>

-->