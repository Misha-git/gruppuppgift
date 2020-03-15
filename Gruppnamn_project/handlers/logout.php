<?php

    //--------------Vid log out så avslutas session---------------
    session_start();
    session_destroy();

    header("location:views/loginForm.php"); //Fungerar som den ska!

?>