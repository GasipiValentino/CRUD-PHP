<?php
require_once "../function/autoload.php";

( new Autenticacion() )->log_out();

header("Location: ../index.php");

?>