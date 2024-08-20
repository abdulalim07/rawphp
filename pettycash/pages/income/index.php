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
    <?php
    include_once '../../assets/connection/normal_report.php';
    ?>
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
                        <h6>C.Balance :: <?php echo pettyBalance(); ?>Tk</h6>
                        <!-- Function Location normal_report Line_8 -->
                    </div>
                    <div class="leftSideMenu">
                        <ul>
                            <li><a href="?p=1">Income Voucher</a></li>
                            <li><a href="?p=2">Income Details Report</a></li>
                            <li><a href="?p=3">Name wise Income Report</a></li>
                            <li><a href="?p=4">Date wise Income Report by Account Name</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mid-center">
                <?php
                function pageLoad($pageName)
                {
                    if ($pageName == 1) {
                        include_once 'income-form.php';
                    } else if ($pageName == 2) {
                        include_once 'income-report.php';
                    } else if ($pageName == 3) {
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

</html>