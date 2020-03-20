<?php
require 'includes/functions.php';
$dbconnect = dbConnect();
$statement = $dbconnect->query("SELECT * FROM `afbeeldingen`");
?>

