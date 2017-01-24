<?php
    //require("config.php");
    if(!$_SESSION['loggedIn']) {
        header("Location: index.php");
        die("Redirecting to index.php");
    }
?>

<html>

You made it :)

</html>
