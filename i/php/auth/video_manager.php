<?php

    // todo if user_id is banned send alert and go to inicio.php

    // todo if user is teacher update feature

    // add view
    $sqlView = "UPDATE video SET views = views + 1 WHERE videoID =  '$_GET[id]'";
    mysqli_query($conn, $sqlView);

    // get video info
    $sqlVideoMan = "SELECT * FROM video WHERE videoID = '$_GET[id]'";
    $resultVideoMan = mysqli_query($conn, $sqlVideoMan);

    // format video date
    $sqlDATE ="SELECT CONCAT('Publicado el ', DATE_FORMAT(date, '%d/%m'), ' a las ', DATE_FORMAT(date, '%h:%i %p')) AS datePost  FROM video";
    $resultDATE = mysqli_query($conn, $sqlDATE);

    if ( mysqli_num_rows($resultVideoMan) > 0 ) {

        $rowVideoMan = mysqli_fetch_assoc($resultVideoMan);
        $rowDate = mysqli_fetch_assoc($resultDATE);

        // get video user info
        $sqlVideoUser = "SELECT * FROM users WHERE ID = '$rowVideoMan[user_id]'";
        $resultVideoUser = mysqli_query($conn, $sqlVideoUser);
        $rowUser = mysqli_fetch_assoc($resultVideoUser);
        
        echo '<script>document.getElementById("videoTitle").innerHTML ="'.$rowVideoMan["title"].'"</script>';
        echo '<script>document.title ="'.$rowVideoMan["title"].' - CulturaTech "</script>';

        echo '<script>document.getElementById("videoAuthor").innerHTML =" Hecho por <b>'.$rowUser["name"].'</b>"</script>';
        echo '<script>document.getElementById("videoDate").innerHTML ="'.$rowDate["datePost"].'"</script>';
        echo '<script>document.getElementById("videoViews").innerHTML ="'.$rowVideoMan["views"].' vistas"</script>';

        $vidTeacherStatus = $rowVideoMan["feature"] ? "profesora vio este video" : "profesora no ha visto el video";
        echo '<script>document.getElementById("videoTeacherView").innerHTML = "La ' . $vidTeacherStatus . '";</script>';

        $presentationValue = is_null($rowVideoMan["presentation"]) ? 
            '<script>document.getElementById("videoPresentation").innerHTML = "";</script>'
        :
            '<script>document.getElementById("presentationTarget").href = "'.$rowVideoMan["presentation"].'";</script>'
        ;
        echo $presentationValue;

        echo '<script>document.getElementById("videoDescription").innerHTML ="'.$rowVideoMan["description"].'"</script>';

        echo '<script>document.getElementById("reportVideo").href = "php/auth/report.php?id='.$_GET['id'].'";</script>';

    }

?>