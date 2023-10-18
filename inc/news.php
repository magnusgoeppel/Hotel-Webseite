<?php

$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

?>



<div class="container d-flex justify-content-center mt-3">
  <h1>Neuigkeiten<h1>
</div>

<?php
//Check für Session und admin
if (isset($_SESSION["username"]) && $_SESSION["username"] === "admin")
{
if (!$conn) {
    die("Es konnte keine Verbindung zur Datenbank hergestellt werden " . mysqli_connect_error());
}
?>

<! -- Alert für die Verbindung zur DB -- !>
<div classs="container danger">
    <div class="row no-gutters fixed-bottom">
        <div class="col-lg-2">
            <div class="alert alert-danger" role="alert">
                <p>Eine Verbindung zur Datenbank wurde erfolgreich hergestellt</p>
            </div>
        </div>
    </div>
</div>

<! -- Newserstellung für Admins -- !>
<div class="container d-flex justify-content-center mt-3">
<div class="card mb-3" style="max-width: 540px;">
       
            <div class="card-body">
                 <h2 class="text-center">Newserstellung für Admins<h1>
            </div>
            <div class="container d-flex justify-content-center mt-3">
<form action="inc/create.php" method="post" enctype="multipart/form-data">
    <label  for="title">Titel des Posts:</label><br>
    <input type="text" id="title" name="title"><br>

    <label for="content">Inhalt des Posts:</label><br>
    <textarea id="content" name="content"></textarea><br>

    <label for="image">Zugehöriges Bild:</label>
    <input type="file" id="image" name="image" ><br>

    <input type="submit" name="submit" value="Post erstellen"class="btn btn-danger" style="margin:3px;">
</form>
</div>
</div>
</div>
<?php
}
    //Ausgabe der Newsposts aud der DB
$query = "SELECT * FROM blog_posts ORDER BY post_date DESC";
$result = mysqli_query($conn, $query);

        ?>
<div class="container">
    <?php
    //Ausgabe von Newsposts
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo '<div class="card mb-3 mt-3 mx-auto" style="max-width: 540px;">';
                echo '<div class="card-body text-center">';
                echo "<h2 >" . $row['title'] . "</h2>"; 
                echo "<p>Datum: " . $row['post_date'] . "</p>";
                echo "<p>" . $row['content'] . "</p>"; 
                echo "<img src='" . $row['image_url'] . "' style='max-width: 400px; height:300px;'>";

                echo '</div></div>';
            }
            //Keine Newsposts
        }else {
            echo '<div class="card mb-3 mt-3 mx-auto" style="max-width: 540px;">';
            echo '<div class="card-body text-center">';
            echo "Aktuell gibt es keine Neuigkeiten.";
            echo '</div></div>';
        }
    ?>
</div>


