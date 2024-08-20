<?php

include_once 'select_data.php';
include_once 'where_data.php';

// ------------------------function for Balance--------------

function pettyBalance()
{
    $balance = 0;
    $totalDebit = 0;
    $totalCredit = 0;
    $pettyTransHistory = selectTransHistory();
    // Function Location select_data Line_31 

    foreach ($pettyTransHistory as $row) {

        $transAmount = $row["trans_amount"];
        $debitAmount = 0;
        $creditAmount = 0;

        if ($row["account_type"] == 1) {
            $debitAmount = $transAmount;
        } elseif ($row["account_type"] == 2) {
            $creditAmount = $transAmount;
        }

        $totalDebit += $debitAmount;
        $totalCredit += $creditAmount;
        $balance += $debitAmount - $creditAmount;
    }

    return $balance;
}

// echo pettyBalance($selectTransHistory);

// ------------------------function allAccountTransHistory--------------

function allAccountTransHistory()
{
    $allAccountTransHistory = selectTransHistory();
    // Function Location select_data Line_31 

    if ($allAccountTransHistory->num_rows > 0) {
        $balance = 0;
        $resultTransfer = '';
        $totalDebit = 0;
        $totalCredit = 0;

        while ($row = $allAccountTransHistory->fetch_assoc()) {
            $transAmount = $row["trans_amount"];
            $debitAmount = 0;
            $creditAmount = 0;

            if ($row["account_type"] == 1) {
                $debitAmount = $transAmount;
            } elseif ($row["account_type"] == 2) {
                $creditAmount = $transAmount;
            }

            $totalDebit += $debitAmount;
            $totalCredit += $creditAmount;
            $balance += $debitAmount - $creditAmount;

            $resultTransfer .= '<tr>
                <td>' . date('d-m-Y', strtotime($row['voucher_at'])) . '</td>
                <td>' . $row["id"] . '</td>
                <td>' . $row["account_type"] . '</td>
                <td>' . $row["account_name"] . '</td>
                <td class="tableDetailCol">' . $row["trans_details"] . '</td>
                <td class="finNum">' . $debitAmount . '</td>
                <td class="finNum">' . $creditAmount . '</td>
                <td class="finNum">' . $balance . '</td>
            </tr>';
        }

        $resultTransfer .= '
            <tr>
                <th colspan="4"></th>
                <th>Balance =</th>
                <th class="finNum">' . 'Tk ' . $totalDebit . '</th>
                <th class="finNum">' . 'Tk ' . $totalCredit . '</th>
                <th class="finNum">' . 'Tk ' . $balance . '</th>
            </tr>';
    }

    return $resultTransfer;
}

// echo allAccountTransHistory($selectTransHistory);

// ------------------------function dateWiseTransHistory--------------

function dateWiseTransHistory($columnName, $transStartDate, $transEndDate)
{
    $firstEntryDate = '2023-12-03 00:00:01';
    $balance = 0;
    $transHistory = '';
    $totalDebit = 0;
    $totalCredit = 0;
    // opening balance calculation START
    if ($firstEntryDate <= $transStartDate) {
        $beforeStartDate = date('Y-m-d  23:59:59', strtotime($transStartDate . ' -1 day'));

        $beforeBalance = whereDateTransHistory($columnName, $firstEntryDate, $beforeStartDate);
        // Function Location where_data Line_57 

        foreach ($beforeBalance as $row) {
            $oepningTransAmount = $row["trans_amount"];
            $openingDebit = 0;
            $openingCredit = 0;

            if ($row["account_type"] == 1) {
                $openingDebit = $oepningTransAmount;
            } elseif ($row["account_type"] == 2) {
                $openingCredit = $oepningTransAmount;
            }

            $balance += $openingDebit - $openingCredit;
        }

        $transHistory .= '
    <tr>
        <th colspan="6"></th>
        <th colspan="2">Opening Balance =</th>
        <th class="finNum">' . 'Tk ' . $balance . '</th>
    </tr>';
    }
    // opening balance calculation END

    // Transaction History START
    $dateWiseTransHistory = whereDateTransHistory($columnName, $transStartDate, $transEndDate);
    // Function Location where_data Line_57 

    foreach ($dateWiseTransHistory as $row) {
        $transAmount = $row["trans_amount"];
        $debitAmount = 0;
        $creditAmount = 0;

        if ($row["account_type"] == 1) {
            $debitAmount = $transAmount;
        } elseif ($row["account_type"] == 2) {
            $creditAmount = $transAmount;
        }

        $totalDebit += $debitAmount;
        $totalCredit += $creditAmount;
        $balance += $debitAmount - $creditAmount;

        $transHistory .= '<tr>
                <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
                <td>' . date('d-m-Y', strtotime($row['voucher_at'])) . '</td>
                <td>' . $row["id"] . '</td>
                <td>' . $row["account_type"] . '</td>
                <td>' . $row["account_name"] . '</td>
                <td><p class="transDetailText">' . $row["trans_details"] . '</p></td>
                <td class="finNum">' . $debitAmount . '</td>
                <td class="finNum">' . $creditAmount . '</td>
                <td class="finNum">' . $balance . '</td>
            </tr>';
    }

    $transHistory .= '
            <tr>
                <th colspan="5"></th>
                <th>Closing Balance =</th>
                <th class="finNum">' . 'Tk ' . $totalDebit . '</th>
                <th class="finNum">' . 'Tk ' . $totalCredit . '</th>
                <th class="finNum">' . 'Tk ' . $balance . '</th>
            </tr>';

    return $transHistory;
}

// ------------------------function typeWiseTransHistory--------------

function typeWiseTransHistory($columnName, $cellData)
{
    $typeWiseTransHistory = whereNameTransHistory($columnName, $cellData);
    // Function Location where_data Line_32
    $resultTransfer = '';
    $balance = 0;
    foreach ($typeWiseTransHistory as $row) {
        $transAmount = $row['trans_amount'];
        $balance += $transAmount;

        $resultTransfer .= '<tr>
            <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
            <td>' . date('d-m-Y', strtotime($row['voucher_at'])) . '</td>
            <td>' . $row['id'] . '</td>
            <td>' . $row['account_name'] . '</td>
            <td class="tableDetailCol">' . $row['trans_details'] . '</td>
            <td class="finNum">' . $transAmount . '</td>
            <td class="finNum">' . $balance . '</td>
            </tr>';
    }
    $resultTransfer .= '
        <tr>
            <th colspan="5"></th>
            <th>Total =</th>
            <th class="finNum">' . 'Tk ' . $balance . '</th>
        </tr>';
    return $resultTransfer;
}

// ------------------------function nameWiseTransHistory--------------

function nameWiseTransHistory($columnName, $cellData)
{
    $nameWiseTransHistory = whereNameTransHistory($columnName, $cellData);
    // Function Location where_data Line_32
    $resultTransfer = '';
    $balance = 0;
    foreach ($nameWiseTransHistory as $row) {
        $transAmount = $row['trans_amount'];
        $balance += $transAmount;

        $resultTransfer .= '<tr>
            <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
            <td>' . date('d-m-Y', strtotime($row['voucher_at'])) . '</td>
            <td>' . $row['id'] . '</td>
            <td class="tableDetailCol">' . $row['trans_details'] . '</td>
            <td class="finNum">' . $transAmount . '</td>
            <td class="finNum">' . $balance . '</td>
            </tr>';
    }
    $resultTransfer .= '
        <tr>
            <th colspan="4"></th>
            <th>Balance =</th>
            <th class="finNum">' . 'Tk ' . $balance . '</th>
        </tr>';
    return $resultTransfer;
}


// ------------------------function dateWiseNameTransHistory--------------

function dateWiseNameTransHistory($columnName1, $cellData,  $columnName2, $transStartDate, $transEndDate)
{
    $nameWiseTransHistory = whereDateNameTransHistory($columnName1, $cellData,  $columnName2, $transStartDate, $transEndDate);
    // Function Location where_data Line_82
    $transHistory = '';
    $balance = 0;
    foreach ($nameWiseTransHistory as $row) {
        $transAmount = $row['trans_amount'];
        $balance += $transAmount;

        $transHistory .= '<tr>
            <td>' . date('d-m-Y', strtotime($row['created_at'])) . '</td>
            <td>' . date('d-m-Y', strtotime($row['voucher_at'])) . '</td>
            <td>' . $row['id'] . '</td>
            <td class="tableDetailCol">' . $row['trans_details'] . '</td>
            <td class="finNum">' . $transAmount . '</td>
            <td class="finNum">' . $balance . '</td>
            </tr>';
    }
    $transHistory .= '
        <tr>
            <th colspan="4"></th>
            <th>Balance =</th>
            <th class="finNum">' . 'Tk ' . $balance . '</th>
        </tr>';
    return $transHistory;
}
