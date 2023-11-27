<?php 
    session_start();

    if ( isset( $_REQUEST[ "boton_lugar" ] ) )
    {
        $lugar                  = $_REQUEST[ "lugar" ];

        $_SESSION[ "g_lugar" ]  = $lugar;

        // echo "g_lugar= " .  $_SESSION[ "g_lugar" ] . "<br>";

        // die();

    }

?>

<meta http-equiv="refresh" content="0;url=/cp4/backend/dashboard_teacher.php">