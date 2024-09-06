
<h1>Rooms</h1>

@foreach ($rooms as $room)
    <ul>
        <li>Name: {{ htmlspecialchars($room['Name']) }}</li>
        <li>Number: {{ htmlspecialchars($room['Number']) }}</li>
        <li>Price: {{ htmlspecialchars($room['Price']) }}$</li>
        <li>Discount: {{ htmlspecialchars($room['Discount']) }}%</li>
        <li>Price Discount: {{ htmlspecialchars($room['Price'] - ($room['Price'] * ($room['Discount'] / 100))) }}$</li>
    </ul>
@endforeach