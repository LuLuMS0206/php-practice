<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?> 
    <h1>Room created!</h1>
    <h2>Name: <?= $_POST['name'] ?></h2>
    <ul>
        <li>Number: <?= $_POST['number'] ?></li>
        <li>Price: <?= $_POST['rate'] ?></li>
        <li>Discount: <?= $_POST['discount'] ?></li>
    </ul>
<?php else: ?>
    <h1>New Room:</h1>
    <form method="POST">
        Name: <input type="text" name="name"><br>
        Number: <input type="number" min="0" name="number"><br>
        Room Type: <input type="number" min="1" max="4" name="roomType"><br>
        Rate: <input type="number" min="0" name="rate"><br>
        Offer: <select><option value="yes">Yes</option><option value="no">No</option></select><br>
        Discount: <input type="number" name="discount"><br>
        Description: <input type="text" name="description"><br>
        Status: <input type="text" name="status"><br>
        Cancellation Policies: <input type="text" name="cancellationPolicies"><br>
        <input type="submit">
    </form>
<?php endif ?>