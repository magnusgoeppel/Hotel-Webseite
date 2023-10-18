<div class="container d-flex justify-content-center mt-3">
  <h1>Reservierungsverwaltung<h1>
</div>
<div class="card-container" style="display: flex; margin:20px; flex-wrap: wrap;justify-content-center">
<div class="card mb-3" style="max-width: 540px;">
<form action="index.php?site=res_verw" method="post"style="margin:15px;">

  <label for="username">Benutzername:</label>
  <input type="text" name="username"><br>
  <label for="status">Status:</label>
  <select name="status">
      <option value="alle">alle</option>
      <option value="Neu">neu</option>
      <option value="Bestätigt">bestätigt</option>
      <option value="Storniert">storniert</option>
  </select>
  <input type="submit" value="Filter anwenden" class="btn btn-danger" style="margin:3px;">
</div>
</div>
</form>
<?php
$username= "";
$status= "";
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(empty($_POST['username'])){
    $username = '';
  } else {
    $username = $_POST['username'];
  }
  $status = $_POST['status'];
}
//Switch Case für den Filter
 switch ($status) {
  case "alle":
      if (!empty($username)) {
          $query = "SELECT reservations.id, registrierung.Benutzername, check_in_date, check_out_date, persons, status 
                    FROM reservations JOIN registrierung ON reservations.user_id = registrierung.id WHERE registrierung.Benutzername = '$username'";
      } else {
          $query = "SELECT reservations.id, registrierung.Benutzername, check_in_date, check_out_date, persons, status 
                    FROM reservations JOIN registrierung ON reservations.user_id = registrierung.id";
      }
      break;
  case "Neu":
  case "Bestätigt":
  case "Storniert":
      if (!empty($username)) {
          $query = "SELECT reservations.id, registrierung.Benutzername, check_in_date, check_out_date, persons, status 
                    FROM reservations JOIN registrierung ON reservations.user_id = registrierung.id WHERE registrierung.Benutzername = '$username' AND status = '$status'";
      } else {
          $query = "SELECT reservations.id, registrierung.Benutzername, check_in_date, check_out_date, persons, status 
                    FROM reservations JOIN registrierung ON reservations.user_id = registrierung.id WHERE status = '$status'";
      }
      break;
  default:
      $query = "SELECT reservations.id, registrierung.Benutzername, check_in_date, check_out_date, persons, status 
                FROM reservations JOIN registrierung ON reservations.user_id = registrierung.id";
      break;
}


$result = $conn->query($query);
?>
<div class="card-container" style="display: flex;flex-wrap: wrap;justify-content-center">
<?php
if($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$id = $row["id"];
$username = $row["Benutzername"];
$check_in_date = $row["check_in_date"];
$check_out_date = $row["check_out_date"];
$persons = $row["persons"];
$status = $row["status"];
?>
<div class="d-flex justify-content-center">
<div class="card mb-3 " style="margin:20px">
<div class="card-body">
<h4 class="card-title">Reservierungs ID: <?php echo $id; ?></h4>
<p class="card-text">Benutzername: <?php echo $username; ?></p>
<p class="card-text">Check-in: <?php echo $check_in_date; ?></p>
<p class="card-text">Check-out: <?php echo $check_out_date; ?></p>
<p class="card-text">Personenanzahl: <?php echo $persons; ?></p>
<p class="card-text">Status: <?php echo $status; ?></p>
<form action="inc/update_status.php" method="post">
<input type="hidden" name="reservation_id" value="<?php echo $id; ?>">
<select name="status">
<option value="Neu" <?php if ($status == 'Neu') { echo 'Neu'; } ?>>Neu</option>
<option value="Bestätigt" <?php if ($status == 'Bestätigt') { echo 'Bestätigt'; } ?>>Bestätigt</option>
<option value="Storniert" <?php if ($status == 'Storniert') { echo 'Storniert'; } ?>>Storniert</option>
 </select><input type="submit" value="Aktualisieren"class="btn btn-danger"style="margin:3px;">
             </form>
            
              <form action="inc/delete_reservation.php" method="post">
               <input type="hidden" name="reservation_id" value="<?php echo $id; ?>">
                <input type="submit" value="Löschen" class="btn btn-danger" style="margin:3px;">

</form>
<form action="http://localhost/index.php?site=reservation_details" method="post">
  <input type="hidden" name="reservation_id" id="reservation_id" value="<?php echo $id; ?>">
  <input type="submit" value="Details anzeigen" class="btn btn-danger" style="margin:3px;">
</form>





          </div>
        </div>
</div>
  <?php
      }
    } else {
      echo '<div class="card mb-3 mt-3 mx-auto" style="max-width: 540px;">';
            echo '<div class="card-body text-center">';
            echo "Aktuell gibt es keine Reservierungen.";
            echo '</div></div>';
    }
  ?>
</div>
