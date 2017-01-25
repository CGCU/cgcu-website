<?php

    // Database year white list
    $yearsList = array("2016", "2017", "2018", "2019", "2020", "2021", "2022",
        "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030");

    // fetch the year from the AJAX request
    $year = (string)$_GET["year"];
    $table = "committee" . $year;
    $tableStrLen = 13;

    // Checks that guard against SQL Injection, whitelist of years AND length of table name
    if(!in_array($year, $yearsList) || strlen($table) != $tableStrLen) {
        echo "Database Error. Please report error <strong> CTPHP </strong> to the webmaster or committee,
                with a description of what you were trying to do. <br> <br> Thanks and sorry for the inconvenience.
                <br><br> Please note this script should not be accessed directly as a webpage.";
        die();
    }

    // Perform database query
    // Load databse config info
    $db_ini = parse_ini_file('not-public/database.ini');
    $mysqli = new mysqli($db_ini['server_name'],
                            $db_ini['db_user'],
                            $db_ini['db_password'],
                            $db_ini['db_name']
                            );
    // Delete database config info
    unset($db_ini);

    // SQL Query, select all committee members and all columns from the year specified
    // and order by the id, which is the required column used solely for ordering.
    $query = "SELECT * FROM " . $table . " ORDER BY id ASC";

    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    /* prepare sql statement */
    $stmt = $mysqli->prepare($query);

    /* execute prepared statement */
    $stmt->execute();

    $result = $stmt->get_result();

    // Do something with the result from the database
    // Null checks are present on the non-required fields
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container well white-bkg">';
        echo    '<h3>' . $row["name"] . '</h3>';
        echo    '<h4>' . $row["position"] . '</h4>';
        echo    '<br>';
        echo    '<div class="col-sm-3"><img src="'. $row["imageSourceURL"] . '" class="img-responsive img-rounded center-block" style="max-height: 250px">';

        // icons on left under image
        echo        '<div style="text-align: center; padding-top: 5px">';

        if (!is_null($row["email"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="mailto:' . $row["email"] .'">';
            echo            '<i class="fa fa-envelope fa-2x" aria-hidden="true" style="color: #c11919; padding-left: 5px"></i>';
            echo        '</a>';
        }
        if (!is_null($row["facebook"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="' . $row["facebook"] .'">';
            echo            '<i class="fa fa-facebook-official fa-2x" aria-hidden="true" style="color: #3B5998; padding-left: 5px"></i>';
            echo        '</a>';
        }
        if (!is_null($row["twitter"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="' . $row["twitter"] .'">';
            echo            '<i class="fa fa-twitter-square fa-2x" aria-hidden="true" style="color: #55ACEE; padding-left: 5px"></i>';
            echo        '</a>';
        }
        if (!is_null($row["linkedin"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="' . $row["linkedin"] .'">';
            echo            '<i class="fa fa-linkedin-square fa-2x" aria-hidden="true" style="color: #0077B5; padding-left: 5px"></i>';
            echo        '</a>';
        }

        if (!is_null($row["github"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="' . $row["github"] .'">';
            echo            '<i class="fa fa-github fa-2x" aria-hidden="true" style="color: #000000; padding-left: 5px"></i>';
            echo        '</a>';
        }

        if (!is_null($row["website"])) {
            echo        '<a target="_blank" rel="noopener noreferrer" href="' . $row["website"] .'">';
            echo            '<i class="fa fa-globe fa-2x" aria-hidden="true" style="color: #c11919; padding-left: 5px"></i>';
            echo        '</a>';
        }

        // div for pull-right and left col
        echo        '</div></div>';

        // end icons

        // right col
        echo    '<div class="col-sm-9">';
        echo        '<div class="container">' . $row["bio"] . '</div>';
        // div for right col
        echo     '</div>';

        // big div for well container
        echo '</div>';
    }

    /* close statement and connection */
    $stmt->close();
    /* close connection */
    $mysqli->close();

?>