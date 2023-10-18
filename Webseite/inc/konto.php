<?php
// Verbindung zur Datenbank herstellen
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

// Verbindung felgeschalgen
if ($conn -> connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
//Setze Benutzername auf den aktuellen Benutzer
$username = $_SESSION["username"];


// Prüfen, ob ein Wert im Formularfeld "firstname" eingegeben wurde
if (isset($_POST["firstname"]))
{
    // Wert aus Formularfeld "firstname" in Variable $update speichern
    $update = $_POST["firstname"];
    // SQL-Query vorbereiten, um den Vornamen des Benutzers in der Datenbank zu aktualisieren
    $sql = "UPDATE registrierung SET vorname='$update' WHERE benutzername='$username'";

    // Versuchen, die Aktualisierung in der Datenbank durchzuführen
    if (mysqli_query($conn, $sql)) {
        // Wenn die Aktualisierung erfolgreich war, inkludiere die "update_erf.php" Datei
        include_once "update_erf.php";
    } else {
        // Wenn die Aktualisierung fehlgeschlagen ist, inkludiere die "update_fail.php" Datei
        include_once "update_fail.php";
    }
}
//gleicher Fall für "lastname"
if (isset($_POST["lastname"]))
{
    $update = $_POST["lastname"];
    $sql = "UPDATE registrierung SET nachname='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "gender"
if (isset($_POST["gender"]))
{
    if ($_POST["gender"] === "männlich" || $_POST["gender"] === "weiblich" || $_POST["gender"] === "divers")
    {
        $update = $_POST["gender"];
        $sql = "UPDATE registrierung SET geschlecht='$update' WHERE benutzername='$username'";

        if (mysqli_query($conn, $sql))
        {
            include_once "update_erf.php";
        }
        else
        {
            include_once "update_fail.php";
        }
        }
    else
    {
        include_once "geschlecht_falsch.php";
    }
}

//gleicher Fall für "phonenumber"
if (isset($_POST["phonenumber"]))
{
    $update = $_POST["phonenumber"];
    $sql = "UPDATE registrierung SET telefonnummer='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "email"
if (isset($_POST["email"]))
{
    $update = $_POST["email"];
    $sql = "UPDATE registrierung SET email='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "street"
if (isset($_POST["street"]))
{
    $update = $_POST["street"];
    $sql = "UPDATE registrierung SET straße='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "hausnumber"
if (isset($_POST["housenumber"]))
{
    $update = $_POST["housenumber"];
    $sql = "UPDATE registrierung SET hausnummer='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "stair"
if (isset($_POST["stair"]))
{
    $update = $_POST["stair"];
    $sql = "UPDATE registrierung SET stiege='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "door"
if (isset($_POST["door"]))
{
    $update = $_POST["door"];
    $sql = "UPDATE registrierung SET tür='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "plz"
if (isset($_POST["plz"]))
{
    $update = $_POST["plz"];
    $sql = "UPDATE registrierung SET plz='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "location"
if (isset($_POST["location"]))
{
    $update = $_POST["location"];
    $sql = "UPDATE registrierung SET wohnort='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

//gleicher Fall für "username"
if (isset($_POST["username"]))
{
    $update = $_POST["username"];
    $sql = "UPDATE registrierung SET benutzername='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        include_once "update_erf.php";
    }
    else
    {
        include_once "update_fail.php";
    }
}

// Überprüft, ob das $_POST-Array einen Eintrag "password" enthält
if(isset($_POST["password"]))
{
    // Überprüft, ob das eingegebene Passwort und die Wiederholung des Passworts übereinstimmen
    if ($_POST["password"] == $_POST["password_repeat"])
    {
    // Speichert das eingegebene Passwort in der Variablen $update
    $update = $_POST["password"];
    //Hasht das eingegebene Passwort mit dem Default-Algorithmus von PHP
    $passwordHash = password_hash($update, PASSWORD_DEFAULT);
    // Aktualisiert das Passwort des aktuellen Benutzers in der Datenbank
    $sql = "UPDATE registrierung SET passwort='$passwordHash' WHERE benutzername='$username'";

        // Überprüft, ob die SQL-Abfrage erfolgreich war
        if (mysqli_query($conn, $sql))
        {
            // Lädt das gespeicherte Passwort des Benutzers aus der Datenbank
            $hash = "SELECT passwort FROM registrierung WHERE benutzername='$username'";
            $result = mysqli_query($conn, $hash);
            $row = mysqli_fetch_assoc($result);
            // Überprüft, ob das alte Passwort mit dem gespeicherten Passwort in der Datenbank übereinstimmt
            if (password_verify($_POST["password_alt"], $row["passwort"])) {
                // Inkludiert die Datei update_erf.php, wenn das alte Passwort richtig war
                include_once "update_erf.php";
            } else {
                // Inkludiert die Datei passwort_falsch.php, wenn das alte Passwort falsch war.
                include_once "passwort_falsch.php";
            }
        }
        else
            {
                // Inkludiert die Datei passwort_falsch.php, wenn das SQL-Abfrage nicht erfolgreich war.
                include_once "passwort_falsch.php";
            }
    }
    else
    {
        // Inkludiert die Datei passwort_falsch.php, wenn die Passwörter nicht übereinstimmen.
        include_once "passwort_falsch.php";
    }

}

//Wenn der aktuelle Benutzer der Admin ist
if ($_SESSION["username"] === 'admin')
{
?>
<!--Dropdownmenü zum Auswählen des Benutzers der bearbeitet werden soll.-->
<div class="container d-flex justify-content-center mt-3 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form method="post" action="?site=konto_admin_edit">
                    <div class="dropdown">
                        <select name="selected-user" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                            <option value="" disabled selected>Wähle einen Benutzer aus</option>
                            <?php

                                $sql = "SELECT benutzername FROM registrierung";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result))
                                {
                                    ?>
                                    <option value="<?= $row['benutzername'] ?>"><?= $row['benutzername'] ?></option>;
                                    <?php
                                }
                           ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <input type="submit" value="Absenden" class="btn btn-danger">
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>

<!-- Anzeigen aller Benutzerdaten-->
<?php
$sql = "SELECT id, benutzername, vorname, nachname, geschlecht, telefonnummer, email, straße, hausnummer, stiege, wohnort,
        plz, benutzername, passwort FROM registrierung";
$result = mysqli_query($conn, $sql);

?>
    <div class="d-flex justify-content-center">
    <div class="card" style="width: 100rem;">
<?php

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Benutzername</th>
<th>Vorname</th>
<th>Nachname</th>
<th>Geschlecht</th>
<th>Telefonnummer</th>
<th>E-Mail</th>
<th>Straße</th>
<th>Hausnummer</th>
<th>Stiege</th>
<th>Postleitzahl</th>
<th>Wohnort</th>
<th>Benutzername</th>
</tr>";

    while ($row = mysqli_fetch_array($result))
    {

        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['benutzername'] . "</td>";
        echo "<td>" . $row['vorname'] . "</td>";
        echo "<td>" . $row['nachname'] . "</td>";
        echo "<td>" . $row['geschlecht'] . "</td>";
        echo "<td>" . $row['telefonnummer'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['straße'] . "</td>";
        echo "<td>" . $row['hausnummer'] . "</td>";
        echo "<td>" . $row['stiege'] . "</td>";
        echo "<td>" . $row['plz'] . "</td>";
        echo "<td>" . $row['wohnort'] . "</td>";
        echo "<td>" . $row['benutzername'] . "</td>";
        //echo "<td>" . $row['passwort'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
            </div>

    <?php
    mysqli_close($conn);

}
else
{
?>
        <!-- Änderungsformlare -->
    <div class="container d-flex justify-content-center mt-3">
        <h1>Benutzerdaten ändern</h1>
    </div>
<div class="container d-flex justify-content-center  mb-5">
    <div class="row d-flex justify-content-center mt-3 mb-5">
        <div class="card" style="width: 43rem;">
            <div class="card-body">

                <form method="post">

                    <label for="firstname" class="col-form-label">Vorname:</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>


                    <div class="mt-3 mb-3">
                        <input type="submit" name="firstname_submit"  value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="lastname" class="lastname">Nachname:</label>
                    <input type="text" name="lastname" id="lastname" class="form-control">

                    <div class="mt-3 mb-3">
                        <input type="submit" name="lastname_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="gender" class="gender">Geschlecht: (männlich/weiblich/divers)</label>
                    <input type="text" name="gender" id="gender" class="form-control">

                    <div class="mt-3 mb-3">
                        <input type="submit" name="gender_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="phonenumber" class="col-form-label">Telefonnummer:</label>
                    <input type="number" name="phonenumber" id="phonenumber" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="phonenumber_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>
                <form method="post">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="email_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="street" class="col-form-label">Straße:</label>
                    <input type="text" name="street" id="street" class="form-control">

                    <div class="mt-3 mb-3">
                        <input type="submit" name="street_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="housenumber" class="col-form-label">Hausnummer:</label>
                    <input type="number" min="1" max="999" name="housenumber" id="housenumber" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="housenumber_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="stair" class="col-form-label">Stiege:</label>
                    <input type="number" min="1" max="99" name="stair" id="stair" class="form-control">

                    <div class="mt-3 mb-3">
                        <input type="submit" name="stair_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="door" class="col-form-label">Tür:</label>
                    <input type="number" min="1" max="99" name="door" id="door" class="form-control">

                    <div class="mt-3 mb-3">
                        <input type="submit" name="door_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="plz" class="col-form-label">Postleitzahl:</label>
                    <input type="number" min="1000" max="9999" name="plz" id="plz" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="plz_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="location" class="col-form-label">Wohnort:</label>
                    <input type="text" name="location" id="location" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="location_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="username" class="col-form-label">Benutzername:</label>
                    <input type="text" name="username" id="username" class="form-control" required>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="username_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>

                <form method="post">
                    <label for="password_alt" class="col-form-label">altes Passwort:</label>
                    <input type="password_alt" name="password_alt" id="password_alt" class="form-control" required>

                    <label for="password" class="col-form-label">Passwort:</label>
                    <input type="password" name="password" id="password" class="form-control" required>

                    <label for="password" class="col-form-label">Passwort wiederholen:</label>
                    <input type="password" name="password_repeat" id="password_repeat" class="form-control" requierd>

                    <div class="mt-3 mb-3">
                        <input type="submit" name="password_submit" value="Änderung speichern" class="btn btn-danger">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
