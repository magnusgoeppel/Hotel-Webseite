<?php
session_start();
if(!isset($_SESSION["username"])){
  die("Error: kein User eingeloggt");
}

echo $_SESSION["username"];


$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
echo "Verbindung erfolgreich";
$username = $_SESSION["username"];
//User id beschaffen
$query = "SELECT ID FROM registrierung WHERE Benutzername='$username'";
$result = $conn->query($query);
if($result->num_rows == 0){
    die("Error: No user found with that username");
}
$user = $result->fetch_assoc();
$user_id = $user["ID"];


// Daten aus dem Post extrahieren
$check_in_date = $_POST["check_in_date"];
$check_out_date = $_POST["check_out_date"];
$persons = $_POST["persons"];
$breakfast = isset($_POST["breakfast"]) ? 1 : 0;
$parking = isset($_POST["parking"]) ? 1 : 0;
$pets = isset($_POST["pets"]) ? 1 : 0;
$checkIn = new DateTime($check_in_date);
$checkOut = new DateTime($check_out_date);
$interval = $checkIn->diff($checkOut);
$days = $interval->days;
$price = $days * 35 * $persons+ ($breakfast * 20) + ($parking * 15) + ($pets * 10);

// Einfügen der Daten in die DB

$query = "INSERT INTO reservations (user_id, check_in_date, check_out_date, persons, breakfast, parking, pets, price) VALUES ('$user_id', '$check_in_date', '$check_out_date', '$persons', '$breakfast', '$parking', '$pets', '$price')";

$result = $conn->query($query);
header('Location: http://localhost/index.php?site=zimmer');

exit;
