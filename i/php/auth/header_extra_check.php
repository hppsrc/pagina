<?php

    if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true ) {

        // get user video
        $sqlVideo = "SELECT videoID FROM video WHERE user_id = '$_SESSION[login_id]'";
        $resultVideo = mysqli_query($conn, $sqlVideo);

        if ( mysqli_num_rows($resultVideo) > 0 ) {

            $rowVideo = mysqli_fetch_assoc($resultVideo);
            
            $_SESSION['video_id'] = $rowVideo['videoID'];

        } else {
            
            $_SESSION['video_id'] = "new";

        }

    }

?>