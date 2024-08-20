<?php
include_once 'select_data.php';

function acName()
{
    $selectAccountNames = selectAccountNames();
    $pettyAccountName = '<select class="voucherName" name="voucherName">';
    $pettyAccountName .= '<option value="">Select AC Name</option>';

    foreach ($selectAccountNames as $row) {
        
            $pettyAccountName .= '<option value="' . $row["id"] . '">'
                . $row["id"] . " - " . $row["ac_name"] . '</option>';
                
    }

    $pettyAccountName .= '</select>';

    return $pettyAccountName;
}

// ------------------------function acNameTypeWise--------------
function acNameTypeWise($acType)
{
    $selectAccountNames = selectAccountNames();
    $pettyAccountName = '<select class="voucherName" name="voucherName">';
    $pettyAccountName .= '<option value="">Select AC Name</option>';

    foreach ($selectAccountNames as $row) {

        if ($row["ac_type"] == $acType) {
            $pettyAccountName .= '<option value="' . $row["id"] . '">'
                . $row["id"] . " - " . $row["ac_name"] . '</option>';
        }
    }

    $pettyAccountName .= '</select>';

    return $pettyAccountName;
}

// var_dump(acNameTypeWise($db_conn, 1));
