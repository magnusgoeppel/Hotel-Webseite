<?php

//Reservierung vom Post holen
$reservation_id = $_POST["reservation_id"];

// Verbindung zur DB
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

// Update des Status zu Storniert
$query = "UPDATE reservations SET status = 'Storniert' WHERE id = '$reservation_id'";
$result = $conn->query($query);

if ($result) {
    echo "Reservierung storniert";
} else {
    echo "Fehler bei der Stornierung";

}
header('Location: http://localhost/index.php?site=zimmer');

exit;
?>
