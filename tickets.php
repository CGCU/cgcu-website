<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 19/09/2018
 * Time: 22:41
 */

$url = file_get_contents("https://www.doc.ic.ac.uk/~ah4515/tickets_url.txt");

header('LOCATION:' . $url);
die();

?>