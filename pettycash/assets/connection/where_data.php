<?php

include_once 'db_connection.php';

// ------------------------function whereAccountsName--------------

function whereAccountsName($columnName, $cellData)
{
    // Get a database connection
    $db_conn = dbConnection();

    if (isset($cellData)) {

        // Perform database operations...
        $myQuery = "SELECT * FROM accounts_names WHERE $columnName = $cellData";
        $result = $db_conn->query($myQuery);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . $db_conn->error);
        }
    }

    // Close the database connection when done
    $db_conn->close();

    return $result;
}

// ------------------------function whereTransHistory--------------

function whereNameTransHistory($columnName, $cellData)
{
    // Get a database connection
    $db_conn = dbConnection();

    if (isset($cellData)) {

        // Perform database operations...
        $myQuery = "SELECT * FROM trans_history WHERE $columnName = $cellData";
        $result = $db_conn->query($myQuery);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . $db_conn->error);
        }
    }

    // Close the database connection when done
    $db_conn->close();

    return $result;
}

// ------------------------function dateWhereTransHistory--------------

function whereDateTransHistory($columnName, $transStartDate, $transEndDate)
{
    // Get a database connection
    $db_conn = dbConnection();

    if (isset($transStartDate) && isset($transEndDate)) {

        // Perform database operations...
        $myQuery = "SELECT * FROM trans_history WHERE $columnName BETWEEN '" . $transStartDate . "' AND '" . $transEndDate . "'";
        $result = $db_conn->query($myQuery);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . $db_conn->error);
        }

        // Close the database connection when done
        $db_conn->close();

        return $result;
    }
}

// ------------------------function dateWhereTransHistory--------------

function whereDateNameTransHistory($columnName1, $cellData,  $columnName2, $transStartDate, $transEndDate)
{
    // Get a database connection
    $db_conn = dbConnection();

    if (isset($cellData) && isset($transStartDate) && isset($transEndDate)) {

        // Perform database operations...
        $myQuery = "SELECT * FROM trans_history WHERE $columnName1 =  $cellData AND $columnName2 BETWEEN '" . $transStartDate . "' AND '" . $transEndDate . "'";
        $result = $db_conn->query($myQuery);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . $db_conn->error);
        }
    }

    // Close the database connection when done
    $db_conn->close();

    return $result;
}
