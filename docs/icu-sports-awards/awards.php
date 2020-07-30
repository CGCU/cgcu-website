<?php
/**
 * Created by PhpStorm.
 * User: andrewhill
 * Date: 2019-05-10
 * Time: 17:57
 */

require_once('redirect_if_not_logged_in.php');

require_once('spreadsheet-reader/SpreadsheetReader.php');

function get_nom_by_name($nominations, $type, $name) {
    foreach ($nominations[$type] as $noms) {
    }
}

function character_clean($str) {
    $result = $str;

    $result = preg_replace('/_x000D_/', "", $result);
    $result = preg_replace('/â€¦/', "...", $result);
    $result = preg_replace('/â€™/', "'", $result);
    $result = preg_replace('/â€˜/', "'", $result);
    $result = preg_replace('/â€œ/', '"', $result);
    $result = preg_replace('/â€/', '"', $result);

    return $result;
}

function get_nominations($path) {
    @$Reader = new SpreadsheetReader($path);

    $nominations = [];

    foreach ($Reader as $Row) {
        $your_name = ucwords(trim($Row[0]));
        $club_name = ucwords(trim($Row[1]));
        $category = ucwords(trim($Row[2]));
        $nom_name = ucwords(trim($Row[3]));
        $nom = $Row[4];
        $further_evidence = trim($Row[5]);

        $nom_name = character_clean($nom_name);
        $nom = character_clean($nom);

        if(!array_key_exists($category, $nominations)) {
            $nominations[$category] = array();
        }
        $items = array();
        $items["your_name"] = $your_name;
        $items["club_name"] = $club_name;
        $items["nom_name"] = $nom_name;
        $items["nom"] = $nom;
        $items["further_evidence"] = $further_evidence === "Y";
        array_push($nominations[$category], $items);
    }
    return $nominations;
}

$spreadsheet_path = "not-public/Sports.xlsx";

$nominations = get_nominations($spreadsheet_path);

ksort($nominations);

if(isset($_GET['name'])) {
    assert(isset($_GET['type']));
    $type = $_GET['type'];
    $award_title = $type;
    $name = $_GET['name'];
    $title = $name;
    $is_index = false;
    usort($nominations[$type], function ($a, $b) {
        return strcmp($a['nom_name'], $b['nom_name']);
    });
    assert(isset($_GET['index']));
    $nom_index = $_GET['index'];
    include('display.php');
} else if(isset($_GET['type'])) {
    $type = $_GET['type'];
    $title = $award_title = $type;
    $is_index = true;

    usort($nominations[$type], function ($a, $b) {
        return strcmp($a['nom_name'], $b['nom_name']);
    });

    include('display.php');
} else {
    include('index.php');
}
