<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Teun van der Ploeg" />
    <link rel="stylesheet" type="text/css" href="style/center.css" />
  </head>
  <body>
  <?php include('header.php'); ?>
<form action="save_user.php" method="post">

<div class="wrapper">
<h1>Registreren</h1>
<div class="form">
<label for="">Email</label>
<input required type="text" name="email"><br>

<label for="">Gebruikersnaam</label>
<input required type="text" name="gebruikersnaam"><br>

<label for="">Wachtwoord</label>
<input required type="password" name="wachtwoord"><br>

<button type="submit">Registreren</button>
</div>

</div>
</form>
</body>
</html>