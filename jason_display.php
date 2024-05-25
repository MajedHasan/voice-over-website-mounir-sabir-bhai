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
    <title>Display JSON Data</title>
</head>
<body>

<h1>JSON Data</h1>

<?php
if ($jsonArray !== null) {
    echo "<ul>";
    foreach ($jsonArray as $key => $value) {
        if (is_array($value)) {
            echo "<li><strong>$key:</strong><ul>";
            foreach ($value as $subKey => $subValue) {
                echo "<li>$subKey: $subValue</li>";
            }
            echo "</ul></li>";
        } else {
            echo "<li><strong>$key:</strong> $value</li>";
        }
    }
    echo "</ul>";
} else {
    echo "<p>Error decoding JSON data.</p>";
}
?>

</body>
</html>