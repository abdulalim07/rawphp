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
        // Function to make an XMLHttpRequest
        function makeRequest(method, url, callback) {
            let xhr = new XMLHttpRequest();
            xhr.open(method, url, true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let data = JSON.parse(xhr.responseText);
                    callback(data);
                }
            };

            xhr.send();
        }

        // Function to update dropdown values
        function updateDropdown(containerId, data, callback) {
            let container = document.getElementById(containerId);
            container.innerHTML = ""; // Clear existing options

            if (data.length > 0) {
                let select = document.createElement("select");
                select.onchange = function() {
                    callback(this.value);
                };

                // Add options based on the fetched data
                for (let i = 0; i < data.length; i++) {
                    let option = document.createElement("option");
                    option.value = data[i].id;
                    option.text = data[i].name;
                    select.appendChild(option);
                }

                container.appendChild(select);
            }
        }

        // Function to load parent values
        function loadParentValues() {
            makeRequest('GET', 'connection/get_data.php', function(data) {
                updateDropdown("parent-level", data, loadChildValues);
            });
        }

        // Function to load child values
        function loadChildValues(parentId) {
            makeRequest('GET', 'connection/get_childData.php?parentId=' + parentId, function(data) {
                updateDropdown("child-values-container", data, loadGrandchildValues);
            });
        }

        // Function to load grandchild values
        function loadGrandchildValues(childId) {
            makeRequest('GET', 'connection/get_childData.php?childId=' + childId, function(data) {
                updateDropdown("grandchild-values-container", data, function() {});
            });
        }

        // Call the function to load parent values initially
        console.log(loadParentValues());
    </script>

</body>

</html>
