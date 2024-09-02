<?php

$json_data = file_get_contents('rooms.json');

$rooms = json_decode($json_data, true);

echo "<ol>";
foreach ($rooms as $room) {
    echo "<li>";
    echo "Name: " . htmlspecialchars($room['Name']) . "<br>";
    echo "Number: " . htmlspecialchars($room['Number']) . "<br>";
    echo "Price: $" . htmlspecialchars($room['Price']) . "<br>";
    echo "Discount: " . htmlspecialchars($room['Discount']) . "%<br>";
    echo "</li>";
}
echo "</ol>";
?>
