<?php
    $serverName = "sql8.freemysqlhosting.net";
    $username = "sql8151049";
    $password = "i4nqRbZZVS";
    $DB_name = "sql8151049";

    // Database year white list
    $yearsList = array("2016", "2017", "2018", "2019", "2020", "2021", "2022",
        "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030");

    // fetch the year from the AJAX request
    $year = (string)$_GET["year"];
    $table = "committee" . $year;
    $tableStrLen = 13;

    // Checks that guard against SQL Injection, whitelist of years AND length of table name
    if(!in_array($year, $yearsList) || strlen($table) != $tableStrLen) {
        echo "Database Error. Please report error <strong> CTPHP </strong> to webmaster or committee,
                with a description of what you were trying to do. <br> <br> Thanks and sorry for the inconvenience.";
        die();
    }

    // Perform database query

    $mysqli = new mysqli($serverName, $username, $password, $DB_name);

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
    while ($row = $result->fetch_assoc()) {
        echo '<div class="container well white-bkg">';
        echo    '<h3>' . $row["name"] . '</h3>';
        echo    '<h4>' . $row["position"] . '</h4>';
        echo    '<br>';
        echo    '<div class="col-sm-3"><img src="'. $row["imageSourceURL"] . '" class="img-responsive img-rounded"></div>';
        echo    '<div class="col-sm-9">';
        echo        '<div class="container">' . $row["bio"] . '</div>';

        // icons on right
        echo        '<div class="pull-right">';

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

        // div for pull-right
        echo        '</div>';
        // end icons

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