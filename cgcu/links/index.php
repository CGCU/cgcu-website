<?php

if (isset($_GET['params'])) {
    $params = explode( "/", $_GET['params'] );

    if (strcasecmp($params[0], 'github') === 0
          && strcasecmp($params[1], 'cgcu-website') === 0) {
        header('LOCATION:https://github.com/CGCU/cgcu-website/');
        die();
    }

}

// TODO: case when link doesnt match. for now, redirects to github unconditionally
header('LOCATION:https://github.com/CGCU/cgcu-website/');
die();

?>
