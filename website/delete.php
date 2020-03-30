<?php
include('login_check.php'); 
require 'includes/functions.php';

$id = $_GET['id'];

$user_id = $_SESSION['user_id'];

$statement = dbConnect()->query("SELECT * FROM afbeeldingen WHERE id = $id");
$statement->execute();


foreach ($statement as $afbeeldingen):
if($afbeeldingen['gebruiker_id'] === $user_id){
unlink($afbeeldingen['afbeelding']);

$statement = dbConnect()->prepare("DELETE FROM afbeeldingen WHERE id = $id");
$statement->execute();

header("Location: personelijke_pagina.php");
}
endforeach
?>
