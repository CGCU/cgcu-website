<?php

if (isset($_GET['params'])) {
    $params = explode( "/", $_GET['params'] );

    //TODO: delete
    print_r($params);

    if (strcasecmp($params[0], 'github') === 0
          && strcasecmp($params[1], 'cgcu-website') === 0) {
        header('LOCATION:http://google.co.uk/');
        die();
    }

}
?>
