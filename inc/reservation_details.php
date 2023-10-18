<div class="container d-flex justify-content-center mt-3">
  <h1>Reservierungsdetails<h1>
</div>


<?php


$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

$reservation_id = $_POST['reservation_id'];
//Daten aus der DB holen
$query = "SELECT reservations.*, registrierung.Benutzername, reservations.price
  FROM reservations 
  JOIN registrierung ON reservations.user_id = registrierung.id 
  WHERE reservations.id = '$reservation_id'";
//Variablen setzen
$result = $conn->query($query);
if($result->num_rows > 0) {
  $reservation = $result->fetch_assoc();
  $username = $reservation['Benutzername'];
  $check_in_date = $reservation['check_in_date'];
  $check_out_date = $reservation['check_out_date'];
  $persons = $reservation['persons'];
  $pets = $reservation['pets'];
  $breakfast = $reservation['breakfast'];
  $parking = $reservation['parking'];
  $price = $reservation['price'];
?>
  
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Reservierungsdetails</h4>
          <p class="card-text">Reservierungs-ID: <?php echo $reservation_id; ?></p>
          <p class="card-text">Benutzername: <?php echo $username; ?></p>
          <p class="card-text">Check-in : <?php echo $check_in_date; ?></p>
          <p class="card-text">Check-out : <?php echo $check_out_date; ?></p>
          <p class="card-text">Personenanzahl: <?php echo $persons; ?></p>
          <p class="card-text">Frühstück: <?php echo ($breakfast == 1) ? "Ja" : "Nein"; ?></p>
              <p class="card-text">Parkplatz: <?php echo ($parking == 1) ? "Ja" : "Nein"; ?></p>
              <p class="card-text">Haustiere: <?php echo ($pets == 1) ? "Ja" : "Nein"; ?></p>
          <p class="card-text">Preis: <?php echo $price; ?>€</p>
          <a href="http://localhost/index.php?site=res_verw" class="btn btn-danger">Zurück zur Reservierungsverwaltung</a>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
}
