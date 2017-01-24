<?php
    //require("config.php");
    session_start();
    if(!$_SESSION['loggedIn']) {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
?>

<html>

You made it :)

</html>
