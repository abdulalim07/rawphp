<div class="income-report">
    <h3>Name Wise Report</h3>
    <div class="">
        <form action="" target="_self" method="post">
            <?php
            include_once '../../assets/connection/utility_input.php';
            echo acName();
            ?>
            <button type="submit">Show Report</button>
        </form>
    </div>
    <?php
    if (isset($_POST["voucherName"])) {
        $cellData = $_POST["voucherName"];

        $myAccountsName = whereAccountsName('id', $cellData);
        // Function Location where_data Line_7

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
                    <th>Post Date</th>
                    <th>Transaction Id</th>
                    <th>Details</th>
                    <th>Amount (Tk)</th>
                    <th>Balance (Tk)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            echo nameWiseTransHistory('account_name', $cellData);
        }
            ?>
            <!-- Function Location normal_report Line_175 -->
            </tbody>
        </table>
</div>