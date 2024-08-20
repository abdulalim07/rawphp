<?php
include_once '../../assets/connection/create_data.php';

if (
    isset($_POST['voucherDate']) &&
    isset($_POST['voucherName']) &&
    isset($_POST['voucherAmount']) &&
    isset($_POST['voucherDetails'])
) {
    $voucherDate = date("Y-m-d H:i:s", strtotime($_POST['voucherDate']));
    $voucherName = $_POST['voucherName'];
    $voucherAmount = $_POST['voucherAmount'];
    $voucherDetails = $_POST['voucherDetails'];
    $voucherType = 2;
    
    echo createTransHistory($voucherDate, $voucherName, $voucherAmount, $voucherDetails, $voucherType);
    // <!-- Function Location create_data Line_33 -->

    exit();
}
?>

<div class="income-form">
    <h2>Expense Posting</h2>
    <form action="" target="_self" method="post">
        <!-- Your form fields go here -->
        <div class="voucherFormRow">
            <div class="voucherFormLabel">
                <label for="date">Voucher Date: </label>
            </div>
            <div>
                <input class="voucherInput" type="text" id="voucherDate" name="voucherDate">
            </div>
        </div>
        <div class="voucherFormRow">
            <div class="voucherFormLabel">
                <label for="voucherName">Accounts Name: </label>
            </div>
            <div>
                <?php
                include_once '../../assets/connection/utility_input.php';
                echo acNameTypeWise(2);
                ?>
            </div>
        </div>
        <div class="voucherFormRow">
            <div class="voucherFormLabel">
                <label for="voucherAmount">Voucher Amount (Tk): </label>
            </div>
            <div>
                <input class="voucherInput" type="text" id="voucherAmount" name="voucherAmount" placeholder="C.Balance :: <?php echo pettyBalance(); ?>Tk">
            </div>
        </div>
        <div class="voucherFormRow">
            <div class="voucherFormLabel">
                <label for="voucherDetails">Voucher Details: </label>
            </div>
            <div>
                <textarea class="voucherInput" id="voucherDetails" name="voucherDetails" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="voucherFormButtonRow">
            <button type="submit">Exp. Voucher Post</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>