<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/main-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

    <table class="report-table">
        <thead>
            <tr>
                <th>Entry<br>Date</th>
                <th>Voucher<br>Date</th>
                <th>Transaction<br>Id</th>
                <th>Accounts<br>Type</th>
                <th>Accounts<br>Name</th>
                <th>Details</th>
                <th>Income<br>(Tk)</th>
                <th>Expense<br>(Tk)</th>
                <th>Balance<br>(Tk)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // test dateWiseTransHistory in normal_report line_95

            include_once 'select_data.php';
            include_once 'where_data.php';

            function dateWiseTransHistory($columnName, $transStartDate, $transEndDate)
            {
                $firstEntryDate = '2023-12-03';
                // $beforeStartDate = $transStartDate - 1;
                $balance = 0;
                $resultTransfer = '';
                $totalDebit = 0;
                $totalCredit = 0;
                // opening balance calculation START
                if ($firstEntryDate <= $transStartDate) {
                    $beforeStartDate = date('Y-m-d  23:59:59', strtotime($transStartDate));
                    echo $beforeStartDate;

                    $beforeBalance = whereDateTransHistory($columnName, $firstEntryDate, $beforeStartDate);
                    // Function Location where_data Line_57 

                    foreach ($beforeBalance as $row) {
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
                }
                return $resultTransfer;
            }
            echo dateWiseTransHistory('created_at', '2024-01-01  00:00:01', '2024-01-03 23:59:59');
            ?>
        </tbody>
    </table>

</body>

</html>