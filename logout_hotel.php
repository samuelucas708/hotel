<?php

session_start();
session_unset();
session_destroy();

header("Location: cadastro_hotel.html");

exit;

?>
