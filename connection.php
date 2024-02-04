<?php 
$serverName = "LAPTOP-T38AGT3Q"; //serverName\instanceName

$database = "hotel";
$uid = "";
$pass = "";

$connection = [
    "Database" => $database,
    "UID" => $uid,
    "PWD" => $pass
];

$conn = sqlsrv_connect($serverName, $connection);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo '';
}

// Uniqie Rooms Display in rooms.php
	$result = sqlsrv_query($conn, " SELECT DISTINCT RoomType, MaxGuests, BedConfig, SquareFootage, Amenities, Price, ImagePath 
									FROM Rooms 
									ORDER BY Price	");
	$roomsByType = array();
	while ($room = sqlsrv_fetch_array($result)) {
		$roomsByType[] = $room;
	}



?>
