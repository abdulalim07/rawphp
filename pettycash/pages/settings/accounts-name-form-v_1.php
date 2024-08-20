<div>
    <h2>Accounts Name Entry, Update and Delete</h2>
    <form action="connection/insert-data.php" method="post">
        <div>
            <label for="name">Accounts Name:</label>
            <input type="text" name="name" required><br>
        </div>
        <div>
            <label for="nest_id">Link under Top Accounts:</label>
            <select name="nest_id" id="parentId" onchange="whenSelectParentId()">
                <option value="NULL">This is Top Accounts</option>
                <?php
                include_once 'connection/function.php';
                $parentId = isset($_POST['parentId']) ? $_POST['parentId'] : null;
                printAccountsName($result_accounts_names, $parentId);
                ?>
            </select>
            <div>
                <label for="ac_type">Accounts Type:</label>
                <select name="ac_type" id="acType">
                    <option value="1">Income</option>
                    <option value="2">Expense</option>
                </select>
            </div>
            <div>
                <input type="submit" value="Submit Accounts Name">
            </div>
    </form>
</div>
<script>
    function whenSelectParentId() {
        let parentId = document.getElementById("parentId").value;

        // Make an AJAX request to the PHP function on the same page
        let xhr = new XMLHttpRequest();

        // Use window.location.href to get the current page URL
        xhr.open("POST", window.location.href, true);

        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Update the subOptions div with the response
                document.getElementById("parentId").options.length = 0; // Clear existing options
                document.getElementById("parentId").innerHTML = xhr.responseText;
            }
        };

        // Pass parentId and action as parameters
        xhr.send("parentId=" + parentId);
    }
</script>