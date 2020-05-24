<?php
session_start();

unset($_SESSION["countant"]);

header("location:home.php");
?>