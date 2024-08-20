<div class="income-report">
    <h2>Expense Details Report</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Entry Date</th>
                <th>Post Date</th>
                <th>Transaction Id</th>
                <th>Accounts Name</th>
                <th>Details</th>
                <th>Amount (Tk)</th>
                <th>Total Expense (Tk)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo typeWiseTransHistory('account_type', 2);
            // <!-- Function Location normal_report Line_178 -->
            ?>
        </tbody>
    </table>
</div>