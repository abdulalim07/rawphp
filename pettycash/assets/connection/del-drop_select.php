<?php

include_once 'select_data.php';

function acTypeWiseAcName($result_accountsNames, $acType)
{
    echo "<select class=\"sideSelect\" name=\"acParentName\" id=\"acParentNameSelect\">";
    echo "<option value=\"\">Parent AC</option>";
    foreach ($result_accountsNames as $row) {
        if ($row["ac_type"] == $acType) {
            echo "<option value=\"" . $row["id"] . "\">" . $row["ac_name"] . "</option>";
        }
    }
    echo "</select>";
}
// var_dump(acTypeWiseAcName($result_accountsNames, $acType));
// var_dump($result_accountsNames);
echo "Connection Successfully";

function namewiseReport($result_transHistory, $acName)
{
    if ($result_transHistory->num_rows > 0) {
        $balance = 0;

        while ($row = $result_transHistory->fetch_assoc()) {
            $transAmount = $row["trans_amount"];

            if ($row["account_name"] == $acName) {
                $balance += $transAmount;
                echo "<tr>";
                echo "<td>" . $row["voucher_at"] . "</td>";
                echo "<td>" . $row["updated_at"] . "</td>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["account_type"] . "</td>";
                echo "<td>" . $row["account_name"] . "</td>";
                echo "<td>" . $row["trans_details"] . "</td>";
                echo "<td class=\"finNum\">" . $transAmount . "</td>";
                echo "<td class=\"finNum\">" . "Tk " . $balance . "</td>";
                echo "</tr>";
            }
        }
    }

    echo "
    <tr>
        <th colspan=\"6\"></th>
        <th>Balance =</th>
        <th class=\"finNum\">" . "Tk " . $balance . "</th>
    </tr>";
}

// var_dump(acTypeWiseAcName($result_accountsNames, 1));