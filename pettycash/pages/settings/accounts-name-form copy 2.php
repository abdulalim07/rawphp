<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Dropdown</title>
</head>

<body>

    <div>
        <h2>Accounts Name Entry, Update and Delete</h2>
        <form action="connection/insert_data.php" method="post">
            <div>
                <label for="name">Accounts Name:</label>
                <input type="text" name="name" required><br>
            </div>
            <div>
                <label for="nest_id">Link under Top Accounts:</label>
                <select id="parent-level" onchange="loadChildValues()">
                    <option value="0">Select Level</option>
                    <!-- Populate with top-level values from your database -->

                    <!-- Add more options as needed -->
                </select>
            </div>
            <div id="child-values-container">
                <!-- Container to display child values -->
            </div>

            <div id="grandchild-values-container">
                <!-- Container to display grandchild values -->
            </div>
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
        // ================PARENT VALUE START================
        function loadParentValues(topLinkId) {
            // AJAX request to fetch data from the server
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'connection/get_data.php?topLinkId=' + topLinkId, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let parentAccountsName = JSON.parse(xhr.responseText);
                    printParentValue(parentAccountsName);
                }
            };

            xhr.send();
        }

        function printParentValue(parentAccountsName) {
            let selectParentLevel = document.getElementById("parent-level");
            selectParentLevel.innerHTML = ""; // Clear existing options

            // Add a default option
            let defaultOption = document.createElement("option");
            defaultOption.value = "0";
            defaultOption.text = "Select Level";
            selectParentLevel.appendChild(defaultOption);

            // Add options based on the fetched data
            for (let i = 0; i < parentAccountsName.length; i++) {
                let option = document.createElement("option");
                option.value = parentAccountsName[i].id;
                option.text = parentAccountsName[i].name;
                selectParentLevel.appendChild(option);
            }

            // Call the function to load child values with the selected parent value
            let selectedParentValue = selectParentLevel.value;
            loadChildValues(selectedParentValue);
        }

        // Call the function to load parent values initially
        loadParentValues(0);
        // ================PARENT VALUE END================
        // ================CHILD VALUE START================

        function loadChildValues(topLinkId) { //topLinkId = parentId
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'connection/get_data.php?topLinkId=' + topLinkId, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var childAccountsName = JSON.parse(xhr.responseText);
                    printChildValue(childAccountsName);
                }
            };

            xhr.send();
        }

        function printChildValue(childAccountsName) {
            var childContainer = document.getElementById("child-values-container");
            childContainer.innerHTML = ""; // Clear existing content

            if (childAccountsName.length > 0) {
                var childSelect = document.createElement("select");
                childSelect.onchange = function() {
                    var selectedChildValue = childSelect.value;
                    loadGrandchildValues(selectedChildValue);
                };

                // Add a default option
                var defaultOption = document.createElement("option");
                defaultOption.value = "0";
                defaultOption.text = "Select Child";
                childSelect.appendChild(defaultOption);

                // Add options based on the fetched data
                for (var i = 0; i < childAccountsName.length; i++) {
                    var option = document.createElement("option");
                    option.value = childAccountsName[i].id;
                    option.text = childAccountsName[i].name;
                    childSelect.appendChild(option);
                }

                childContainer.appendChild(childSelect);
            }

            // Call the function to load child values with the selected parent value
            let selectedChildValue = childSelect.value;
            loadGrandchildValues(selectedChildValue);
        }

        // ================CHILD VALUE END================
        // ================GRAND CHILD VALUE START================

        function loadGrandchildValues(topLinkId) { //topLinkId = childId
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'connection/get_data.php?topLinkId=' + topLinkId, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var grandChildAccountsName = JSON.parse(xhr.responseText);
                    printGrandchildValue(grandChildAccountsName);
                }
            };

            xhr.send();
        }

        function printGrandchildValue(grandChildAccountsName) {
            var grandchildContainer = document.getElementById("grandchild-values-container");
            grandchildContainer.innerHTML = ""; // Clear existing content

            if (grandChildAccountsName.length > 0) {
                var grandchildSelect = document.createElement("select");

                // Add a default option
                var defaultOption = document.createElement("option");
                defaultOption.value = "0";
                defaultOption.text = "Select Grandchild";
                grandchildSelect.appendChild(defaultOption);

                // Add options based on the fetched data
                for (var i = 0; i < grandChildAccountsName.length; i++) {
                    var option = document.createElement("option");
                    option.value = grandChildAccountsName[i].id;
                    option.text = grandChildAccountsName[i].name;
                    grandchildSelect.appendChild(option);
                }

                grandchildContainer.appendChild(grandchildSelect);
            }
        }
        // ================GRAND CHILD VALUE END================
    </script>

</body>

</html>
<!-- প্যারেন্ট ভ্যালু লোড হওয়ার পর চাইল্ড ভ্যাল সিলেক্ট প্যারেন্ট ভ্যালু অনুযায়ী লোড হচ্ছে না। -->