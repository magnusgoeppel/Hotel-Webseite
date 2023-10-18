<?php

//Wenn es keine Session gibt, dann wird eine gestartet
if(!isset($_SESSION))
{
    session_start();
}
function isSession()
{
    return isset($_SESSION["username"]);
}


?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Box Hotel</title>
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <?php include_once "inc/nav.php"?>
    <style>
    body
    {
        background-image: url("img/test.jpg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        margin-top: 120px;
    }
    </style> 
</head>
<body>
    <?php
        //Seite ist Startseite wenn keine andere ausgewählt ist
        $site = $_GET["site"] ?? "startseite";
        //Speicher der Webseite in $sites
        $sites = ["startseite", "hilfecenter", "impressum", "login", "login_erf", "password_reset",
                  "registrierung", "password_reset_erf", "registrierung_erf","konto", "news","errorlogin",
                  "logout", "logout_erf", "zimmer", "konto_admin_edit", "konto_admin","reservation_details",
                    "res_verw", "edit_erf", "edit_fail", "geschlecht_edit_fail", "password_edit_fail"];

        //Wenn die Seite nicht gefunden wird.
        if (!in_array($site, $sites))
        {
            $error = "Seite nicht gefunden - " . $site;
            $site = "error";
        }
        //Include der aktuellen Seite.
        include_once "inc/" . $site . ".php";
    ?>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>