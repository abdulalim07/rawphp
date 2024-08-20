<?php

include_once 'connection/select-data.php';

function printAccountsName($table_data, $level, $db_conn)
{
    // Fetch all records
    $rows = $table_data->fetch_all(MYSQLI_ASSOC);

    // Filter records where parent_id is NULL
    $topLevelItems = array_filter($rows, function ($row) {
        return $row['parent_id'] === NULL;
    });

    // Display top-level items
    foreach ($topLevelItems as $row) {
        $name = $row['name'];
        echo $name . "<br>";

        // Recursive call to display sub-menus
        // printAccountsName($row['id'], 1, $db_conn);
    }
}

// Display top-level menus
$table_data = $result_accounts_names;
printAccountsName($table_data, 0, $db_conn);



// Accounts Names Print Function
function printAccountsName($result_accounts_names, $parentId = NULL)
{
    // Fetch all records
    $rows = $result_accounts_names->fetch_all(MYSQLI_ASSOC);

    // Filter records where parent_id is NULL
    $topLevelItems = array_filter($rows, function ($row) use ($parentId) {
        return $row['parent_id'] == $parentId;
    });

    // Display top-level items
    foreach ($topLevelItems as $row) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}

$parentId = 7;
printAccountsName($result_accounts_names, $parentId);
