<?php
$json_data = file_get_contents('rooms.json');

$rooms = json_decode($json_data, true);

echo "<pre>";
print_r($rooms);
echo "</pre>";
?>
