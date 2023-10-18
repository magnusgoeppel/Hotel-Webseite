<?php
// Datenbank-Verbindungsinformationen
$host = "localhost";
$user = "root";
$password = "";
$database = "benutzerdaten";

// Verbindung herstellen
$conn = mysqli_connect($host, $user, $password, $database);

// Verbindung überprüfen
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}