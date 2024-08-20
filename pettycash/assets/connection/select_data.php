<?php

include_once 'db_connection.php';

// ------------------------function selectAccountNames--------------

// Query to select all data from accounts_names table
function selectAccountNames()
{
    // Get a database connection
    $db_conn = dbConnection();

    // Perform database operations...
    $myQuery = "SELECT * FROM accounts_names";
    $result = $db_conn->query($myQuery);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . $db_conn->error);
    }

    // Close the database connection when done
    $db_conn->close();

    return $result;
}

// ------------------------function selectTransHistory--------------

// Query to select all data from accounts_names table
function selectTransHistory()
{
    // Get a database connection
    $db_conn = dbConnection();

    // Perform database operations...
    $myQuery = "SELECT * FROM trans_history";
    $result = $db_conn->query($myQuery);

    // Check if the query was successful
    if (!$result) {
        die("Query failed: " . $db_conn->error);
    }

    // Close the database connection when done
    $db_conn->close();

    return $result;
}