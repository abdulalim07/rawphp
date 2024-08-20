<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petty Cash::Home</title>
    <link rel="stylesheet" href="../../assets/css/main-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>
    <div class="main-body">
        <div class="top-body">
            <div class="left-top">
                <div class="site-logo">
                    Petty Cash
                </div>
            </div>
            <div class="right-top">
                <?php
                include_once '../menu/nav-menu.php';
                ?>
            </div>
        </div>
        <div class="center-body">
            <div class="left-center">
                <div class="sideMenu">
                    <h4>Left Side</h4>
                    <div>
                        <?php include_once '../../assets/connection/normal_report.php'; ?>
                        <h6>C.Balance :: <?php echo pettyBalance(); ?>Tk</h6>
                        <!-- Function Location normal_report Line_7 -->
                    </div>
                    <div class="leftSideMenu">
                        <ul>
                            <li><a href="?p=1">Expense Voucher</a></li>
                            <li><a href="?p=2">Expense Details Report</a></li>
                            <li><a href="?p=3">Name Wise Expense Report</a></li>
                            <li><a href="?p=4">Date wise Expense Report by Account Name</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="mid-center">
                <?php
                function pageLoad($pageName)
                {
                    if ($pageName == 1) {
                        include_once 'expense-form.php';
                    } else if ($pageName == 2) {
                        include_once 'expense-report.php';
                    } else  if ($pageName == 3) {
                        include_once 'namewise-report.php';
                    } else {
                        include_once 'datewise-name-report.php';
                    }
                }

                if (isset($_GET["p"])) {
                    $pageName = $_GET["p"];
                    pageLoad($pageName);
                }
                ?>
            </div>
            <div class="rigth-center"></div>
        </div>
        <div class="bottom-body">
            <div class="copy-rigths">Copyright Reserved for Petty Cash 2023</div>
        </div>
    </div>
</body>

<script>
    flatpickr("#voucherDate", {
        dateFormat: "d-m-Y"
    });
</script>

</html>