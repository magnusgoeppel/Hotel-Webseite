<?php
session_unset();
session_destroy();
header("Location: ?site=logout_erf");