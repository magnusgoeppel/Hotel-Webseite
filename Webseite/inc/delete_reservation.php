<?php
//Zugriff auf die DB
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

  if(isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    echo $reservation_id;
    //Löschen der Reservierung aus der DB
    $query = "DELETE FROM reservations WHERE id='$reservation_id'";
    $result = $conn->query($query);
    if($result) {
      echo "Reservation deleted successfully";
    } else {
      echo "Error deleting reservation: " . $conn->error;
    }
  }
  header('Location: http://localhost/index.php?site=res_verw');
exit;
?>
