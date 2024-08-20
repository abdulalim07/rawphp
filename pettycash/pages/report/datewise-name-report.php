<div class="income-report">
    <h3>Date and Name wise Report</h3>
    <div class="">
        <form action="" target="_self" method="post">
            <?php
            include_once '../../assets/connection/utility_input.php';
            echo acName();
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
                    <th>Entry<br>Date</th>
                    <th>Voucher<br>Date</th>
                    <th>Transaction<br>Id</th>
                    <th>Details</th>
                    <th>Amount<br>(Tk)</th>
                    <th>Balance<br>(Tk)</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // for query to database
            echo dateWiseNameTransHistory('account_name', $cellData, 'created_at', $transStartDate, $transEndDate);
            // <!-- Function Location normal_report Line_238 -->
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