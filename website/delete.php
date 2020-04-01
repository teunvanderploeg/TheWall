<?php
include('login_check.php'); 
require 'includes/functions.php';

$id = $_GET['id'];
$connection = dbConnect();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM afbeeldingen WHERE id = :id";
$statement = $connection->prepare($sql);
$parameters = 
[
 'id' => $id
];
$statement->execute( $parameters );


foreach ($statement as $afbeeldingen):
if($afbeeldingen['gebruiker_id'] === $user_id){
unlink($afbeeldingen['afbeelding']);


$sql = "DELETE FROM afbeeldingen WHERE id = :id";
$statement = $connection->prepare($sql);
$parameters = 
[
 'id' => $id
];
$statement->execute( $parameters );

header("Location: personelijke_pagina.php");
}else if ($user_id === 1){
  unlink($afbeeldingen['afbeelding']);

  $sql = "DELETE FROM afbeeldingen WHERE id = :id";
  $statement = $connection->prepare($sql);
  $parameters = 
  [
   'id' => $id
  ];
  $statement->execute( $parameters );
  
  header("Location: adminpage.php");
}
endforeach
?>
