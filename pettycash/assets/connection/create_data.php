<?php

include_once 'db_connection.php';

// ------------------------function createAccountNames--------------

function createAccountNames($acName, $parentId, $acType)
{
    // Get a database connection
    $db_conn = dbConnection();

    $stmt = $db_conn->prepare("INSERT INTO accounts_names (ac_name, parent_id, ac_type) VALUES (?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sds", $acName, $parentId, $acType);

    // Execute the statement
    if ($stmt->execute()) {
        $resultTransfer = "Data inserted successfully";
    } else {
        $resultTransfer = "Error: " . $stmt->error;
    }

    // Close the statement and the database connection when done
    $stmt->close();
    $db_conn->close();

    return $resultTransfer;
}

// ------------------------function createTransHistory--------------

function createTransHistory($voucherDate, $voucherName, $voucherAmount, $voucherDetails, $voucherType)
{
    // Get a database connection
    $db_conn = dbConnection();

    // Use prepared statement to prevent SQL injection
    $stmt = $db_conn->prepare("INSERT INTO trans_history (account_name, account_type, trans_amount, trans_details, voucher_at) VALUES (?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("ssdss", $voucherName, $voucherType, $voucherAmount, $voucherDetails, $voucherDate);

    // Execute the statement
    if ($stmt->execute()) {
        $resultTransfer = "Data inserted successfully";
    } else {
        $resultTransfer = "Error: " . $stmt->error;
    }

    // Close the statement and the database connection when done
    $stmt->close();
    $db_conn->close();

    return $resultTransfer;
}
