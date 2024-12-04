<?php

require_once "dane.php";
$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) die("General Error");

$query = "DESCRIBE koty";
$result = $conn->query($query);
if (!$result) die("Error");

$structure = [];
while ($row = $result->fetch_assoc()) {
    $structure[] = $row;
}

$query = "SELECT * FROM koty";
$result = $conn->query($query);
if (!$result) die("Error");

echo "<table border='1'><tr>";
foreach ($structure as $column) {
    echo "<th>" . htmlspecialchars($column['Field']) . " (" . htmlspecialchars($column['Type']) . ")</th>";
}
echo "</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($structure as $column) {
        $fieldName = $column['Field'];
        echo "<td>" . htmlspecialchars($row[$fieldName]) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>