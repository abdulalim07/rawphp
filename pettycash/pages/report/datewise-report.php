<div class="income-report">
    <h2>Date Wise Balance Report</h2>
    <div class="">
        <form action="" target="_self" method="post">
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
        isset($_POST["transStartDate"]) &&
        isset($_POST["transEndDate"])
    ) {
        // $transStartDate = date("Y-m-d", strtotime($_POST["transStartDate"]));
        $transStartDate = date("Y-m-d 00:00:01", strtotime($_POST["transStartDate"]));
        $transEndDate = date("Y-m-d 23:59:59", strtotime($_POST['transEndDate']));
    ?>
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
            // for query to database
            echo dateWiseTransHistory('created_at', $transStartDate, $transEndDate);
            // <!-- Function Location normal_report Line_95 -->
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
