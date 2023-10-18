<?php
  $conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');
  
  if(isset($_POST['reservation_id']) && isset($_POST['status'])) {
    $reservation_id = $_POST['reservation_id'];
    $status = $_POST['status'];
    //Update in die DB
    $query = "UPDATE reservations SET status='$status' WHERE id='$reservation_id'";
    $result = $conn->query($query);
    if($result) {
      echo "Reservation status updated successfully";
    } else {
      echo "Error updating reservation status: " . $conn->error;
    }
  }
  header('Location: http://localhost/index.php?site=res_verw');

exit;
?>
