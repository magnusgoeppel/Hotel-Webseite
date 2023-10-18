<nav class="navbar navbar-expand-lg fixed-top", style="background-color: firebrick; ">
    <div class="container-fluid">
        <a class="navbar-brand"style="">Red Box Hotel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <!--Items der Navbar-->
                <li class="nav-item">
                    <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "startseite") ?>" aria-current="page" href="?site=startseite">Startseite</a></button>
                </li>

                <li class="nav-item">
                    <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "news") ?>" href="?site=news">Neuigkeiten</a></button>
                </li>

                <?php
                if (isset($_SESSION["username"]) && $_SESSION["username"] === "admin")
                {
                ?>
                <li class="nav-item">
                 <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "res_verw") ?>" aria-current="page" href="?site=res_verw">Reservierungsverwaltung</a></button>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "zimmer") ?>" aria-current="page" href="?site=zimmer">Zimmerreservierung</a></button>
                </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "hilfecenter") ?>" href="?site=hilfecenter">Hilfecenter</a></button>
                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "impressum") ?>" href="?site=impressum">Impressum</a></button>
                </li>

                 <?php
                    // Wenn angemrldet
                    if (isSession())
                    {
                        ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "konto") ?>" href="?site=konto">Konto</a></button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="btn btn-light" name="logout" ><a class="nav-link" <?php ($site = "logout") ?> href="?site=logout">Logout</a></button>
                        </li>
                       
                    <?php
                    }
                    else
                    {
                        ?>
                        <li class="nav-item">
                            <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "registrierung") ?>" href="?site=registrierung">Registrierung</a></button>
                        </li>

                        <li class="nav-item">
                            <button type="button" class="btn btn-light"><a class="nav-link <?php ($site = "login") ?>" href="?site=login">Anmelden</a></button>
                        </li>
                    <?php
                    }
                    ?>
            </ul>
        </div>
    </div>
</nav>