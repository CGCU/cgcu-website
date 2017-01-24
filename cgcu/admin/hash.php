<html>
<?php

    /* Utility to generate a password hash, all hard coded. Delete ASAP */

    $password = "";
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    //$password_hash = "$2y$10\$mP1Rpbl7Zay6wvXgR0XofeUP3yJ.u.SlWbp8/S8BRBeZtb3j.Yzzu";

//    if (password_verify($password, $password_hash)) {
//        echo "VERIFIED";
//    }

    echo $password_hash;

?>

</html>
