<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 2019-05-10
 * Time: 17:57
 */

require_once('redirect_if_not_logged_in.php');

require_once('spreadsheet-reader/SpreadsheetReader.php');

function get_nominations($path) {
    @$Reader = new SpreadsheetReader($path);

    $nominations = [];

    foreach ($Reader as $Row) {
        $name = $Row[0];
        $nom = $Row[1];
        $nom = preg_replace('/_x000D_/', "", $nom);
        $nom = preg_replace('/â€¦/', "...", $nom);
        $nom = preg_replace('/â€™/', "'", $nom);
        $nom = preg_replace('/â€˜/', "'", $nom);
        $nom = preg_replace('/â€œ/', '"', $nom);
        $nom = preg_replace('/â€/', '"', $nom);

        if(strlen($nom) > 4020) {
            $nom = substr($nom,0,4020);
            $nom .= "\n\n *** This nomination has been cut short at the character limit ***";
        }

        if(!array_key_exists($name, $nominations)) {
            $nominations[$name] = array();
        }
        array_push($nominations[$name], $nom);
    }
    return $nominations;
}

$award_title = "";
$spreadsheet_path = "";

if(isset($_GET['type'])) {
    $type = $_GET['type'];
    if($type === "osa") {
        $award_title = "Outstanding Service Award";
        $spreadsheet_path = "not-public/OSA.xlsx";
    } elseif ($type === "colours") {
        $award_title = "Union Colours";
        $spreadsheet_path = "not-public/Colours.xlsx";
    } elseif ($type === "fellowship") {
        $award_title = "Fellowship";
        $spreadsheet_path = "not-public/Fellowship.xlsx";
    } else {
        include('index.php');
        die();
    }
} else {
    include('index.php');
    die();
}

$nominations = get_nominations($spreadsheet_path);

if(isset($_GET['name'])) {
    $name = $_GET['name'];

    // check other packs
    $f_nom = get_nominations('not-public/Fellowship.xlsx');
    $c_nom = get_nominations('not-public/Colours.xlsx');
    $o_nom = get_nominations('not-public/OSA.xlsx');

    $other_noms = "Other Nominations are present for: ";
    if(isset($f_nom[$name]) && $type != 'fellowship') {
        $other_noms .= '<a href="awards.php?type=fellowship&name=' . $name . '">Fellowship</a>';
    }
    if(isset($o_nom[$name]) && $type != 'osa') {
        $other_noms .= '<a href="awards.php?type=osa&name=' . $name . '"> OSA </a>';
    }
    if(isset($c_nom[$name]) && $type != 'colours') {
        $other_noms .= '<a href="awards.php?type=colours&name=' . $name . '"> Colours </a>';
    }
    if($other_noms === "Other Nominations are present for: ") {
        $other_noms = "This candidate has no other nominations for Colours, OSA, or Fellowship.";
    }

    $title = $name;
    $is_index = false;
    include('display.php');
} else {
    $is_index = true;
    $title = $award_title;
    include('display.php');
}
