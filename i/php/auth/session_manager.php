<?php

    if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ) {

        // get user info
        $sql = "SELECT * FROM users WHERE id = '$_SESSION[login_id]'";
        $result = mysqli_query($conn, $sql);

        if ( mysqli_num_rows($result) > 0 ) {

            $row = mysqli_fetch_assoc($result);
        
            echo '<script>document.getElementById("username").innerHTML = "<b> '.strtoupper($row["name"]).' </b>"</script>';

            if( $row["role"] == 1 ) {

                echo '<script>document.getElementById("userrole").innerHTML = "<b> Usuario </b>"</script>';

            } else if( $row["role"] == 2 ) {

                echo '<script>document.getElementById("userrole").innerHTML = "<b> Profesora </b>"</script>';

            } else if( $row["role"] == 3 ) {

                echo '<script>document.getElementById("userrole").innerHTML = "<b> Administrador ('.$row["roles_info"].') </b>"</script>';

            }

        }

        // get user video
        $sqlVideo = "SELECT videoID FROM video WHERE user_id = '$_SESSION[login_id]'";
        $resultVideo = mysqli_query($conn, $sqlVideo);

        if ( mysqli_num_rows($resultVideo) > 0 ) {

            $rowVideo = mysqli_fetch_assoc($resultVideo);
            
            $_SESSION['video_id'] = $rowVideo['videoID'];

        } else {
            
            $_SESSION['video_id'] = "new";

        }

    } else {

        if (basename($_SERVER['PHP_SELF']) != "registro.php" && basename($_SERVER['PHP_SELF']) != "inicio.php" && basename($_SERVER['PHP_SELF']) != "video.php") {
            
            header("Location: registro.php");

            exit();
            
        }
        
    }

?>