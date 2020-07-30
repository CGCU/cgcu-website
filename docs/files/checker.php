<?php

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=usernames_with_course.csv');

//Get array of usernames
$file_contents = file_get_contents("usernames.txt");

$line_by_line = preg_split ('/$\R?^/m', $file_contents);

$usernames = array();

foreach ($line_by_line as $line) {
    array_push($usernames, trim($line));
}

array_shift($usernames); //dirty hack :)

$output = fopen('php://output', 'w');

foreach ($usernames as $u) {
    fputcsv($output, array(strtolower($u), ldap_get_info(strtolower($u))[0], ldap_get_name(strtolower($u))));
}
