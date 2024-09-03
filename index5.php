<?php 
    $mysqli = mysqli_connect("localhost","root","Lucia1!","miranda");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    
    $sql = "SELECT * FROM rooms";
    $rooms = mysqli_query($mysqli, $sql); 
    

    if ($rooms) {
        ?>
        <h1>Rooms</h1>
        <?php foreach ($rooms as $room): ?>
            <ol>
                <li>Name: <?= $room['name'] ?></li>
                <li>Number: <?= $room['id'] ?></li>
                <li>Price: <?= $room['price'] ?></li>
                <li>Discount: <?= round(100-($room['offer'] * 100)/$room['price']) ?>%</li>
            </ol>
        <?php endforeach; ?>
        <?php
    } else {
        echo "Error executing query: " . mysqli_error($mysqli);
    }
    mysqli_free_result($rooms);
    mysqli_close($mysqli);
?> 
