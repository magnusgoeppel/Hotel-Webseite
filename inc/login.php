<?php
//include_once "db-config.php";
$conn = mysqli_connect("localhost", "root", "", "benutzerdaten");
// Überprüfen, ob der Benutzer auf die Absenden-Schaltfläche geklickt hat
if (isset($_POST['login']))
{
    // Benutzereingaben aus dem Formular auslesen
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // SQL-Abfrage vorbereiten
    $query = "SELECT passwort FROM registrierung WHERE benutzername = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $hash_pwd = $row['passwort'];
        $hash = password_verify($password, $hash_pwd);

        $query = "SELECT * FROM registrierung WHERE benutzername = '$username'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);

        // Wenn genau ein Datensatz gefunden wurde, ist die Anmeldung erfolgreich
        if ($count == 1 && $hash)
        {
            // Benutzer anmelden (z.B. indem eine Sitzungsvariable gesetzt wird)
           // $_SESSION['logged_in'] = true;
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: ?site=login_erf");
        }
        else
        {
            include_once "passwort_falsch.php";
        }

    }
    else
    {
        include_once "passwort_falsch.php";
    }
}
?>
    <!-- Annmeldeformular -->
    <div class="container d-flex justify-content-center mt-3">
        <h1>Anmelden</h1>
    </div>
    <div class="row d-flex justify-content-center mt-3">
        <div class="card" style="width: 28rem;">
            <div class="card-body">
                <form method="post">

                    <label for="username" class="col-form-label">Benutzername:</label>
                    <div class="mb-2">
                        <span class="error text-danger"> </span>
                    </div>
                    <input type="text" name="username" id="username" class="form-control" required>


                    <label for="password" class="col-form-label">Passwort:</label>
                    <div class="mb-2">
                        <span class="error text-danger"></span>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" required>

                    <div class="mt-3">
                        <input type="submit" name="login" value="Anmelden" class="btn btn-danger">
                    </div>
                </form>
                <div class="mt-3">
                </div>
            </div>
        </div>
    </div>