<?php
if (isset($_GET['id'])) {
    $room_id = intval($_GET['id']); 


    $json_data = file_get_contents('rooms.json');


    $rooms = json_decode($json_data, true);

    $found_room = null;

    foreach ($rooms as $room) {
        if ($room['ID'] === $room_id) {
            $found_room = $room;
            break;
        }
    }

    if ($found_room) {
        echo "<h2>Detalles de la habitación</h2>";
        echo "Name: " . htmlspecialchars($found_room['Name']) . "<br>";
        echo "Number: " . htmlspecialchars($found_room['Number']) . "<br>";
        echo "Price: $" . htmlspecialchars($found_room['Price']) . "<br>";
        echo "Discount: " . htmlspecialchars($found_room['Discount']) . "%<br>";
    } else {
        echo "No se encontró ninguna habitación con el ID especificado.";
    }
} else {
    echo "ntroduce un ID de habitación en la URL.";
}
?>
