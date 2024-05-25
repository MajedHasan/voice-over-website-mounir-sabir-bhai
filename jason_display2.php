<?php
// File path to the JSON file
$jsonFilePath = 'json/file.json';

// Read the JSON file contents
$jsonString = file_get_contents($jsonFilePath);

// Decode the JSON string to a PHP associative array
$jsonArray = json_decode($jsonString, true);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Display JSON Data in Grid</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>JSON Data in Grid</h1>

<?php
if ($jsonArray !== null) {
    echo "<table>";
    // Print table headers if the JSON data has keys
    if (!empty($jsonArray)) {
        echo "<thead><tr>";
        // Get the first element to extract keys
        $firstElement = reset($jsonArray);
        if (is_array($firstElement)) {
            foreach (array_keys($firstElement) as $key) {
                echo "<th>" . htmlspecialchars($key) . "</th>";
            }
        } else {
            foreach (array_keys($jsonArray) as $key) {
                echo "<th>" . htmlspecialchars($key) . "</th>";
            }
        }
        echo "</tr></thead>";
    }

    echo "<tbody>";
    // Print table rows
    foreach ($jsonArray as $row) {
        echo "<tr>";
        if (is_array($row)) {
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
        } else {
            echo "<td>" . htmlspecialchars($row) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>Error decoding JSON data.</p>";
}
?>

</body>
</html>