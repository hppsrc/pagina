<?php

    session_start();
    include 'php/auth/connection.php';
    require 'php/auth/session_manager.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="hppsrc">
    <meta name="title" content="Registrarse">

    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>

    <title>Cargando...</title>

    <?php include 'php/page/meta.php'; ?>

</head>

<body>
    <?php include 'php/page/modal.php'; ?>
    <?php include 'php/page/info.php'; ?>
    <?php include 'php/page/header.php'; ?>

    <main id="registro">

        <h1>Registrate o accede a la plataforma</h1>

        <form method="POST">
            
            <label for="student_id"> Codigo carnet estudiantil </label>
            <input type="number" id="student_id" name="student_id" required>

            <label for="mail"> Correo institucional  </label>
            <input type="email" id="mail" name="mail" required>

            <label for="password" > Contraseña </label>
            <input style="display: block;" type="password" id="password" name="password" minlength="8" required>

            <p style="color: red;">Si no estas registrado, el valor que ingreses será tu contraseña. Minimo 8 caracteres.</p>
            <p style="color: darkcyan;">Para registrate, rellena la información y presiona en Acceder.</p>

            <input  type="submit" name="submit" value="Acceder">

        </form>

        <br>

        <hr>

        <br>

        <button id="continueModal">Información importante de registro</button>

    </main>

    <?php include 'php/page/footer.php'; ?>

</body>
</html>

<?php

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $student_id = filter_input(INPUT_POST,"student_id", FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST,"mail", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_SPECIAL_CHARS);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
        } else if (!empty($_SERVER['REMOTE_ADDR'])) { 
            $ip = $_SERVER['REMOTE_ADDR']; 
        }
        
        $ip = trim(filter_var($ip, FILTER_VALIDATE_IP));
        $hashed_ip = hash('sha256', $ip . 'randomtext');

        if (isset($_POST['submit'])) {
            
            if( isset($student_id) && isset($mail) && isset($password) ) {

                $sql = "SELECT * FROM users WHERE student_id = '$student_id' AND mail = '$mail'";
                $result = mysqli_query($conn, $sql);

                if ( mysqli_num_rows($result) > 0 ) {

                    $row = mysqli_fetch_assoc($result);
                    
                    if ( $row["verification_status"] == 0 ) { // user isn't verified
                        $sql = "UPDATE users SET password = '$hashed_password', verification_status = 1, ip = '$hashed_ip' WHERE student_id = '$student_id' AND mail = '$mail'";
                        mysqli_query($conn, $sql);
    
                        echo '<script>alert("Bienvenido, '.strtoupper($row["name"]).'.\nTu cuenta fue activada y ya puedes iniciar sesión.")</script>';

                    } else if ( $row["password"] != null ) { // user has a pass now

                        if ( password_verify($password, $row["password"]) ) { // password work
                            
                            if ( $hashed_ip !== $row["ip"] ) { // user ip isn't the same
                                
                                echo '<script>alert("Estás intentando acceder de un dispositivo no reconocido. Acceso denegado.")</script>';
            
                            } else if ( $row["banned"] == 1 ) { // was banned
            
                                echo '<script>alert("La cuenta fue inhabilitada por tener muchos reportes.")</script>';
        
                            } else if ( $row["verification_status"] == 1 ) { // log in now

                                $_SESSION['login_id'] = $row['ID'];
                                $_SESSION['logged_in'] = true;

                                header("Location: inicio.php");
                                exit();
        
                            }

                        } else { // wrong password

                            echo '<script>alert("Contraseña incorrecta.")</script>';

                        }

                    }

                } else { // user hasn't found

                    echo '<script>alert("No se encontro un usuario.\nSi esto es un error comuniquese con la profesora.")</script>';
                    
                }

            }

        }

    }

    include 'php/auth/session_manager.php';

?>