<?php 

$mysqli = mysqli_connect("localhost", "root", "Lucia1!", "miranda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

if (isset($_GET['id'])) {
    $room_id = intval($_GET['id']); 

    $sql = "SELECT * FROM rooms WHERE rooms._id = $room_id";
    $result = mysqli_query($mysqli, $sql);

 
    if ($result && mysqli_num_rows($result) > 0) {
        $room = mysqli_fetch_assoc($result);
        ?>
        <h1>Detalles de la habitación</h1>
        <ol>
            <li>Name: <?= htmlspecialchars($room['name']) ?></li>
            <li>Number: <?= htmlspecialchars($room['id']) ?></li>
            <li>Price: <?= htmlspecialchars($room['price']) ?></li>
            <li>Discount: <?= round(100 - ($room['offer'] * 100) / $room['price']) ?>%</li>
        </ol>
        <?php
    } else {
        echo "No se encontró ninguna habitación con el ID especificado.";
    }


    mysqli_free_result($result);
} else {
    echo "Introduce un ID de habitación en la URL.";
}


mysqli_close($mysqli);
?>
