<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/header.css">
</head>
<body>
<header>
    <h1 class="logo">Theme<span>Wall<span></h1>
    <div class="header-right">
      <a class="active" href="index.php">Home</a>
      <?php 
    if (isset( $_SESSION['user_id'] ) ) {
      echo "<a href='upload.php'>Upload</a>";
      if($_SESSION['user_id'] == 1){
        echo "<a href='adminpage.php'>Admin</a>";
        } 
      echo "<a href='personelijke_pagina.php'>Mijn Foto's</a>";
      echo "<a href='uitlogen.php'>Uitlogen</a>";
 
    }else{
      echo "<a href='login.php'>Login</a>";
      echo "<a href='register.php'>Registreer</a>";
    }
    
    ?>
    </div>
  </header>
</body>
</html>