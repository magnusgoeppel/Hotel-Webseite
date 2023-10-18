<?php include_once "startseite.php"?>
<div class="container danger">
    <div class="row no-gutters fixed-bottom">
        <div class="col-lg-2">
            <div class="alert alert-danger" role="alert">
                <p>Willkommen zurück <?= $_SESSION["username"]; ?></p>
            </div>
        </div>
    </div>
</div>