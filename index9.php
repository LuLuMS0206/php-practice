<?php

$mysqli = mysqli_connect("localhost", "root", "Lucia1!", "miranda");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}


$name = $price = $offer = "";
$nameErr = $priceErr = $offerErr = "";

/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = mysqli_real_escape_string($mysqli, $_POST["name"]);
    }

    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } elseif (!is_numeric($_POST["price"])) {
        $priceErr = "Price must be a number";
    } else {
        $price = mysqli_real_escape_string($mysqli, $_POST["price"]);
    }

    if (empty($_POST["offer"])) {
        $offerErr = "Offer is required";
    } elseif (!is_numeric($_POST["offer"])) {
        $offerErr = "Offer must be a number";
    } else {
        $offer = mysqli_real_escape_string($mysqli, $_POST["offer"]);
    }


    if (empty($nameErr) && empty($priceErr) && empty($offerErr)) {
        $sql = "INSERT INTO rooms (name, price, offer) VALUES ('$name', '$price', '$offer')";
        if (mysqli_query($mysqli, $sql)) {
            echo "New room added successfully!";
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}


mysqli_close($mysqli);
?>


<h1>Add New Room</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name: <input type="text" name="name" value="<?php echo $name; ?>">
    <span><?php echo $nameErr; ?></span><br><br>

    Price: <input type="text" name="price" value="<?php echo $price; ?>">
    <span><?php echo $priceErr; ?></span><br><br>

    Offer: <input type="text" name="offer" value="<?php echo $offer; ?>">
    <span><?php echo $offerErr; ?></span><br><br>

    <input type="submit" value="Add Room">
</form>
