<?php 

    $mysqli = mysqli_connect("localhost","root","Lucia1!","miranda");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }


    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if ($search) {
        $sql = "SELECT * FROM rooms WHERE name LIKE ?";
        $stmt = $mysqli->prepare($sql);
        $likeSearch = "%$search%";
        $stmt->bind_param("s", $likeSearch);
        $stmt->execute();
        $rooms = $stmt->get_result();
    } else {
        $sql = "SELECT * FROM rooms";
        $rooms = mysqli_query($mysqli, $sql);
    }
?>

<h1>Rooms</h1>

<form>
    <label for="search">Search by name:</label>
    <input type="text" id="search" name="search" value="<?= htmlspecialchars($search) ?>">
    <button type="submit">Search</button>
</form>

<?php if ($rooms && $rooms->num_rows > 0): ?>
    <?php foreach ($rooms as $room): ?>
        <ol>
            <li>Name: <?= htmlspecialchars($room['name']) ?></li>
            <li>Number: <?= htmlspecialchars($room['id']) ?></li>
            <li>Price: <?= htmlspecialchars($room['price']) ?></li>
            <li>Discount: <?= round(100-($room['offer'] * 100)/$room['price']) ?>%</li>
        </ol>
    <?php endforeach; ?>
<?php else: ?>
    <p>No rooms found.</p>
<?php endif; ?>

<?php 

    if ($rooms) {
        mysqli_free_result($rooms);
    }
    mysqli_close($mysqli);
?> 
