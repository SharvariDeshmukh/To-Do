<?php
require_once("index.php");

session_destroy();
header("Location: index.php");


?>