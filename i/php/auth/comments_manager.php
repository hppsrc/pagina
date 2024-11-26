<?php

    // get video comments
    $sqlCommentsMan = "SELECT * FROM users_votes WHERE videoID = '$_GET[id]' AND type_vote = 0 ORDER BY DATE DESC LIMIT 25";
    $resultCommentsMan = mysqli_query($conn, $sqlCommentsMan);

    if ( mysqli_num_rows($resultCommentsMan) > 0 ) {
        
        while ($rowComments = mysqli_fetch_assoc($resultCommentsMan)) {

            echo $rowComments["vote_context"];

        }

    } else {

        echo '<script>document.getElementById("videoComments").innerHTML ="Este video no tiene comentarios."</script>';

    }

?>