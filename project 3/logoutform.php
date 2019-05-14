<?php

session_unset();
session_destroy();
echo '<div class="alert alert-info" role="alert">
    U bent succesvol uitgelogd, u word doorgestuurd naar de algemene homepagina.</div>';
    header("Refresh: 4; url=./index.php?content=loginform");



?>