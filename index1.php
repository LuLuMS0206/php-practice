<?php
$rooms = [
    [
        "ID" => 1,
        "Name" => "Habitación Deluxe",
        "Number" => 101,
        "Price" => 120.00,
        "Discount" => 10 
    ],
    [
        "ID" => 2,
        "Name" => "Habitación Estándar",
        "Number" => 102,
        "Price" => 80.00,
        "Discount" => 5 
    ],
    [
        "ID" => 3,
        "Name" => "Suite Presidencial",
        "Number" => 103,
        "Price" => 250.00,
        "Discount" => 15 
    ]
];

echo "<pre>";
print_r($rooms);
echo "</pre>";
?>
