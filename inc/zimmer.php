<?php

if (!isset($_SESSION["username"])) {
  // User zur Loginpage
  header("Location: http://localhost/index.php?site=login");
}
  
?>


<div class="container d-flex justify-content-center mt-3">
  <h1>Reservierungen<h1>
</div>



<div class="card-container" style="display: flex; margin:20px; flex-wrap: wrap;justify-content-center">
<div class="card mb-3" style="max-width: 540px;">
       
            <div class="card-body">
                 <h2 class="text-center">Neue Reservierung erstellen<h1>
            </div>
            <div class="container d-flex justify-content-center mt-3">
<form action="inc\create_reservation.php" method="post">
  <label for="check_in_date">Check-in Date:</label>
  <input type="date" name="check_in_date" id="check_in_date" required>
  <br>
  <label for="check_out_date">Check-out Date:</label>
  <input type="date" name="check_out_date" id="check_out_date" required>
  <br>
  <label for="persons">Personenanzahl:</label>
  <input type="number" name="persons" id="persons" min="1" max="4" required>
  <br>
  <label for="breakfast">Frühstück:</label>
  <input type="checkbox" name="breakfast" id="breakfast" value="1">

  <label for="parking">Parkplatz:</label>
  <input type="checkbox" name="parking" id="parking" value="1">

  <label for="pets">Haustiere:</label>
  <input type="checkbox" name="pets" id="pets" value="1">
  <br>
  <input type="submit" value="Reservierung erstellen" class="btn btn-danger" style="margin:3px;">
  
</form>

</div>
</div>
</div>
<?php





$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

$username = $_SESSION["username"];
//Userid beschaffen
$query = "SELECT ID FROM registrierung WHERE Benutzername='$username'";
$result = $conn->query($query);
if($result->num_rows == 0){
    die("Error: No user found with that username");
}
$user = $result->fetch_assoc();
$user_id = $user["ID"];

$query = "SELECT id, check_in_date, check_out_date, persons, breakfast, parking, pets, status, price FROM reservations WHERE user_id='$user_id'";
$result = $conn->query($query);
?>
<div class="card-container" style="display: flex;flex-wrap: wrap;justify-content-center">
<?php
//Daten anwenden
if($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
      $check_in_date = $row["check_in_date"];
      $check_out_date = $row["check_out_date"];
      $persons = $row["persons"];
      $breakfast = $row["breakfast"];
      $parking = $row["parking"];
      $pets = $row["pets"];
      $status = $row["status"];
      $price = $row["price"];
?>
<div class="d-flex justify-content-center">
<div class="card mb-3 " style="margin:20px">
          <div class="card-body">
              <h4 class="card-title">Reservierung</h4>
              <p class="card-text">Check-in: <?php echo $check_in_date; ?></p>
              <p class="card-text">Check-out: <?php echo $check_out_date; ?></p>
              <p class="card-text">Personenanzahl: <?php echo $persons; ?></p>
              <p class="card-text">Frühstück: <?php echo ($breakfast == 1) ? "Ja" : "Nein"; ?></p>
              <p class="card-text">Parkplatz: <?php echo ($parking == 1) ? "Ja" : "Nein"; ?></p>
              <p class="card-text">Haustiere: <?php echo ($pets == 1) ? "Ja" : "Nein"; ?></p>
              <p class="card-text">Status: <?php echo $status; ?></p>
              <p class="card-text">Preis: <?php echo $price; ?>€</p>
              <form action="inc/cancel_reservation.php" method="post">
              <input type="hidden" name="reservation_id" value="<?php echo $row["id"]; ?>">
              <input type="submit" value="Reservierung stornieren"class="btn btn-danger" style="margin:3px;">
</form>

  </div>
  </div>
  </div>
  
  <?php

}
} else {
  echo '<div class="card mb-3 mt-3 mx-auto" style="max-width: 540px;">';
  echo '<div class="card-body text-center">';
  echo "Aktuell haben Sie keine Reservierungen.";
  echo '</div></div>';
}
    ?>