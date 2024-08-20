<?php

function dbConnection()
{
    $servername = "localhost";
    $username = "pettycash";
    $password = "pettycash";
    $dbname = "pettycash";

    $db_conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($db_conn->connect_error) {
        die("Connection failed: " . $db_conn->connect_error);
    }

    // Do something with the database connection if needed

    return $db_conn;
}
