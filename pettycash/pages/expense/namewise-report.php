<div class="mid-center">
    <h3>Name Wise Expense Report</h3>
    <div class="">
        <form action="" target="_self" method="post">
            <?php
            include_once '../../assets/connection/utility_input.php';
            echo acNameTypeWise(2);
            ?>
            <button type="submit">Show Report</button>
        </form>
    </div>
    <?php
    if (isset($_POST["voucherName"])) {
        $cellData = $_POST["voucherName"];

        $myAccountsName = whereAccountsName('id', $cellData);

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
        <div class="income-report">
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
                // <!-- Function Location normal_report Line_209 -->
            }
                ?>
                </tbody>
            </table>
        </div>
</div>
<div class="rigth-center"></div>