<?php
//Datenbank verbindung
include_once "db-config.php";


if(isset($_POST['submit']))
{
    //Passwort überpfüung
    if($_POST["password"] != $_POST["password_repeat"])
    {
        include_once "passwort_falsch.php";
    }
    else
    {
        //Speicher in der Datenbank
        $conn = mysqli_connect("localhost", "root", "", "benutzerdaten");
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
        $phonenumber = mysqli_real_escape_string($conn, $_POST["phonenumber"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $street = mysqli_real_escape_string($conn, $_POST["street"]);
        $housenumber = mysqli_real_escape_string($conn, $_POST["housenumber"]);
        $stair = mysqli_real_escape_string($conn, $_POST["stair"]);
        $door = mysqli_real_escape_string($conn, $_POST["door"]);
        $plz = mysqli_real_escape_string($conn, $_POST["plz"]);
        $location = mysqli_real_escape_string($conn, $_POST["location"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO registrierung (vorname, nachname, geschlecht, telefonnummer, email, straße, hausnummer,
                                            stiege, tür, plz, wohnort, benutzername, passwort) 
                VALUES ('$firstname', '$lastname', '$gender', '$phonenumber', '$email', '$street', '$housenumber', '$stair', 
                        '$door', '$plz', '$location', '$username', '$password_encrypted')";
        mysqli_query($conn, $sql);

        header("Location: ?site=registrierung_erf");
    }

}
?>

    <div class="container d-flex justify-content-center mt-3">
        <h1>Registrierung</h1>
    </div>
    <!-- Registrierungsformular -->
    <div class="container d-flex justify-content-center mt-3 mb-5">
        <div class="row d-flex justify-content-center mb-5">
            <div class="card" style="width: 43rem;">
                <div class="card-body">
                    <form method="post">

                        <label for="firstname" class="lastname">Vorname:</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required>


                        <label for="lastname" class="lastname">Nachname:</label>
                        <input type="text" name="lastname" id="lastname" class="form-control">


                        <label for="gender" class="col-form-label">Geschlecht:</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option disabled selected value>Geben Sie ein Geschlecht an</option>
                            <option value="männlich">Männlich</option>
                            <option value="weiblich">Weiblich</option>
                            <option value="divers">Divers</option>
                        </select>

                        <label for="phonenumber" class="col-form-label">Telefonnummer:</label>
                        <input type="number" name="phonenumber" id="phonenumber" class="form-control" required>


                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" required>


                        <label for="street" class="col-form-label">Straße:</label>
                        <input type="text" name="street" id="street" class="form-control">


                        <label for="housenumber" class="col-form-label">Hausnummer:</label>
                        <input type="number" min="1" max="999" name="housenumber" id="housenumber" class="form-control" required>


                        <label for="stair" class="col-form-label">Stiege:</label>
                        <input type="number" min="1" max="99" name="stair" id="stair" class="form-control">


                        <label for="door" class="col-form-label">Tür:</label>
                        <input type="number" min="1" max="99" name="door" id="door" class="form-control">


                        <label for="plz" class="col-form-label">Postleitzahl:</label>
                        <input type="number" min="1000" max="9999" name="plz" id="plz" class="form-control" required>


                        <label for="location" class="col-form-label">Wohnort:</label>
                        <input type="text" name="location" id="location" class="form-control" required>


                        <label for="username" class="col-form-label">Benutzernume:</label>
                        <input type="text" name="username" id="username" class="form-control" required>


                        <label for="password" class="col-form-label">Passwort:</label>
                        <input type="password" name="password" id="password" class="form-control" required>


                        <label for="password" class="col-form-label">Passwort wiederholen:</label>
                        <input type="password" name="password_repeat" id="password_repeat" class="form-control">

                        <div class="mt-3">
                            <button type="submit" name="submit" class="btn btn-danger">Absenden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
