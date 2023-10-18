<?php
include_once "index.php";
// Verbindung zur Datenbank herstellen
$conn = mysqli_connect('localhost', 'root', '', 'benutzerdaten');

//Wenn die Verbindung fehlgeschlagen ist
if ($conn -> connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

// Wenn ein Benutzer im Dropdownmenü ausgwählt ist
if(isset($_POST['selected-user']))
{
    //Setze ihn auf aktuellen benutzer
    $_SESSION['username'] = $_POST['selected-user'];
}

//gleicher code wie in konto

$username = $_SESSION['username'];

if (isset($_POST['firstname']))
{

    $update = $_POST['firstname'];
    $sql = "UPDATE registrierung SET vorname='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["lastname"]))
{
    $update = $_POST["lastname"];
    echo "$update";
    $sql = "UPDATE registrierung SET nachname='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["gender"]))
{
    if ($_POST["gender"] === "männlich" || $_POST["gender"] === "weiblich" || $_POST["gender"] === "divers")
    {
        $update = $_POST["gender"];
        $sql = "UPDATE registrierung SET geschlecht='$update' WHERE benutzername='$username'";

        if (mysqli_query($conn, $sql))
        {
            header("Location: ?site=edit_erf");
        }
        else
        {
            header("Location: ?site=edit_fail");
        }
    }
    else
    {
        eader("Location: ?site=geschlecht_edit_fail");
    }
}

if (isset($_POST["phonenumber"]))
{
    $update = $_POST["phonenumber"];
    $sql = "UPDATE registrierung SET telefonnummer='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["email"]))
{
    $update = $_POST["email"];
    $sql = "UPDATE registrierung SET email='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["street"]))
{
    $update = $_POST["street"];
    $sql = "UPDATE registrierung SET straße='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["housenumber"]))
{
    $update = $_POST["housenumber"];
    $sql = "UPDATE registrierung SET hausnummer='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["stair"]))
{
    $update = $_POST["stair"];
    $sql = "UPDATE registrierung SET stiege='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["door"]))
{
    $update = $_POST["door"];
    $sql = "UPDATE registrierung SET tür='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["plz"]))
{
    $update = $_POST["plz"];
    $sql = "UPDATE registrierung SET plz='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

if (isset($_POST["location"]))
{
    $update = $_POST["location"];
    $sql = "UPDATE registrierung SET wohnort='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}


if (isset($_POST["username"]))
{
    $update = $_POST["username"];
    $sql = "UPDATE registrierung SET benutzername='$update' WHERE benutzername='$username'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: ?site=edit_erf");
    }
    else
    {
        header("Location: ?site=edit_fail");
    }
}

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
            if (password_verify($_POST["password_alt"], $row["passwort"]))
            {
                // Inkludiert die Datei update_erf.php, wenn das alte Passwort richtig war
                header("Location: ?site=edit_erf");
            } else
            {
                // Inkludiert die Datei passwort_falsch.php, wenn das alte Passwort falsch war.
                header("Location: ?site=password_edit_fail");
            }
        }
        else
        {
            // Inkludiert die Datei passwort_falsch.php, wenn das SQL-Abfrage nicht erfolgreich war.
            header("Location: ?site=password_edit_fail");
        }
    }
    else
    {
        // Inkludiert die Datei passwort_falsch.php, wenn die Passwörter nicht übereinstimmen.
        header("Location: ?site=password_edit_fail");
    }

}


?>
    <div class="container d-flex justify-content-center mt-3">
        <h1>Benutzerdaten ändern für <?php echo "$username"; ?></h1>
    </div>
    <div class="container d-flex justify-content-center  mb-5">
        <div class="row d-flex justify-content-center mt-3 mb-5">
            <div class="card" style="width: 43rem;">
                <div class="card-body">

                    <form method="post" action="">

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

                    
                    <?php //Admin kann sein benutzer nicht ändern
                    if($_SESSION['username'] != 'admin')
                        {
                            ?>
                            <form method="post">
                                <label for="username" class="col-form-label">Benutzername:</label>
                                <input type="text" name="username" id="username" class="form-control" required>

                                <div class="mt-3 mb-3">
                                    <input type="submit" name="username_submit" value="Änderung speichern" class="btn btn-danger">
                                </div>
                            </form>
                    <?php
                        }?>

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


