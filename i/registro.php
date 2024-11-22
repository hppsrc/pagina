<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="Registrarse">

    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>

    <title>Document</title>

    <?php include 'php/page/meta.php'; ?>

</head>

<body>

    <!-- <php include 'php/page/modal.php'; ?> -->

    <?php include 'php/page/info.php'; ?>

    <?php include 'php/page/header.php'; ?>

    <main id="registro">

        <h1>Registrate o accede a la plataforma</h1>

        <br>

        <form>
            
            <div>
                <label> Codigo carnet estudiantil <red>*</red> </label>
                <input type="number" id="carnet">
            </div>

            <div>
                <label> Correo institucional <red>*</red> </label>
                <input type="email" id="carnet">
            </div>

            <div>

                <div class="row">
                    <label> Contraseña </label>
                    <red>*</red>
                    <img src="res/icons/help-circle.svg" onmousemove="showInfo(3)" onmouseleave="showInfo(-1)">
                </div>

                <input type="password" id="carnet">

            </div>

            <p style="color: darkred;">Debe tener minimo 8 caracteres.</p>
            
        </form>

        <p style="color: red;"> * Obligatorio </p>

        <br>
        
        <a href=""> No recuerdo mi contraseña </a>
        <a href=""> Mi informacion es correcta y no puedo registrarme </a>
        <a href=""> Alguien se registro con mis datos </a>
        <a href=""> Tengo otro problema </a>
        
        
        
        

    </main>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>