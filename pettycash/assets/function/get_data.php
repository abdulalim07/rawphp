<?php

include_once 'select_data.php';

$accountsName = [];

while ($accountsNameRow = $result_accounts_names->fetch_assoc()) {
    $parent_id = null;
    // Need Main Accounts Name, what parent id is null
    if ($accountsNameRow['parent_id'] == $parent_id) {

        $accountName[] = $accountsNameRow;
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($accountName);
// var_dump($accountName);
