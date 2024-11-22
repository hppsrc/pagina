<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="Inicio">

    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>

    <title>Document</title>

    <?php include 'php/page/meta.php'; ?>

</head>

<body>

    <!-- <php include 'php/page/modal.php'; ?> -->

    <?php include 'php/page/info.php'; ?>

    <?php include 'php/page/header.php'; ?>

    <main id="inicio">

        <form>
            <label> Buscar </label>
            <input type="text" id="search" placeholder="Ingrese un id de video, id de estudiante, nombre o titulo">
            <button>Buscar</button>
        </form>

        <br>

        <form>
            <label> ¿No sabes qué ver?</label>
            <button>¡Sorprendeme!</button>
        </form>

        <br>

        <div class="videosection">
            <div class="row">
                <h1>Videos destacados</h1>
                <img src="res/icons/help-circle.svg" onmousemove="showInfo(0)" onmouseleave="showInfo(-1)">
            </div>

            <div class="video-row">

            <!-- ! Aqui se injecta el codigo -->

                <div class="video-div">
                    <div class="video"> <p>⭐5,00</p> </div>
                    <p><b>Titulo</b></p>
                    <p>Por:x xd</p>
                </div>

            </div>

        </div>

        <br>

        <div class="videosection">
            <div class="row">
            <h1>Videos más recientes</h1>
            <img src="res/icons/help-circle.svg" onmousemove="showInfo(1)" onmouseleave="showInfo(-1)">
            </div>

            <div class="video-row">

            <!-- ! Aqui se injecta el codigo -->
                
                <div class="video-div">
                    <div class="video"></div>
                    <p><b>Titulo</b></p>
                    <p>Por:x xd</p>
                </div>

            </div>

        </div>

        <br>

        <div class="videosection">
            <div class="row">
                <h1>Sugerencias para tí</h1>
                <img src="res/icons/help-circle.svg" onmousemove="showInfo(2)" onmouseleave="showInfo(-1)">
            </div>

            <div class="video-row">

            <!-- ! Aqui se injecta el codigo -->
                
                <div class="video-div">
                    <div class="video"></div>
                    <p><b>Titulo</b></p>
                    <p>Por:x xd</p>
                </div>

            </div>

        </div>

    </main>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>