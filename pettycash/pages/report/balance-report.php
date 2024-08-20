<div class="income-report">
    <h2>Balance Details Report</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Post Date</th>
                <th>Transaction Id</th>
                <th>Accounts Type</th>
                <th>Accounts Name</th>
                <th>Details</th>
                <th>Income (Tk)</th>
                <th>Expense (Tk)</th>
                <th>Balance (Tk)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo allAccountTransHistory();
            ?>
            <!-- Function Location normal_report Line_40 -->
        </tbody>
    </table>
</div>