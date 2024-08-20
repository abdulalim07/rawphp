<div class="income-report">
    <h3>Date wise Income Report by Account Name</h3>
    <div class="">
        <form action="" target="_self" method="post">
            <?php
            include_once '../../assets/connection/utility_input.php';
            echo acNameTypeWise(1);
            ?>
            <div>
                <label for="date">Date From: </label>
                <input class="transDateInput" type="text" id="transStartDate" name="transStartDate">
                <label for="date">To: </label>
                <input class="transDateInput" type="text" id="transEndDate" name="transEndDate">
                <button type="submit">Show Report</button>
            </div>
        </form>
    </div>
    <?php
    if (
        isset($_POST["voucherName"]) &&
        isset($_POST["transStartDate"]) &&
        isset($_POST["transEndDate"])
    ) {
        $cellData = $_POST["voucherName"];
        $transStartDate = date("Y-m-d", strtotime($_POST["transStartDate"]));
        $transEndDate = date("Y-m-d", strtotime($_POST['transEndDate']));

        $myAccountsName = whereAccountsName('id', $cellData);
        // <!-- Function Location where_data Line_7 -->

        if (!$myAccountsName) {
            die("Query failed");
        }

        $row = $myAccountsName->fetch_assoc();

        if ($row) {
            $printAccountName = $row['ac_name'];
            
            $myAccountsName->free();
        } else {
            $printAccountName = "Not Found";
        }
    ?>
    <h2>Account Name: <?php echo $printAccountName; ?></h2>
        <table class="report-table">
            <thead>
                <tr>
                    <th>Entry Date</th>
                    <th>Voucher Date</th>
                    <th>Transaction Id</th>
                    <th>Details</th>
                    <th>Amount (Tk)</th>
                    <th>Balance (Tk)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // for query to database
            echo dateWiseNameTransHistory('account_name', $cellData, 'voucher_at', $transStartDate, $transEndDate);
            // <!-- Function Location normal_report Line_205 -->
        }
            ?>
            </tbody>
        </table>
</div>

<script>
    flatpickr(".transDateInput", {
        dateFormat: "d-m-Y"
    });
</script>