<div class="income-report">
    <h2>Income Details Report</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Entry Date</th>
                <th>Post Date</th>
                <th>Transaction Id</th>
                <th>Accounts Name</th>
                <th>Details</th>
                <th>Amount (Tk)</th>
                <th>Total Income (Tk)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            echo typeWiseTransHistory( 'account_type', 1);
            // <!-- Function Location normal_report Line_145 -->
            ?>
        </tbody>
    </table>
</div>