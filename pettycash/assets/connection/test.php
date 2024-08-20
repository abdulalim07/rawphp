<?php

include_once 'db_connection.php';

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

// Call the function and fetch the results
$resultSet = selectAccountNames();

// Fetch data from the result set
while ($row = $resultSet->fetch_assoc()) {
    // Process each row of data as needed
    print_r($row);
}

// Free the result set
$resultSet->free();
