<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Teun van der Ploeg" />
    <link rel="stylesheet" type="text/css" href="style/register.css" />
  </head>
  <body>
  <?php include('header.php'); ?>
<h1>Registreren</h1>
<form action="save_user.php" method="post">

<h5>Email</h5>
<input required type="text" name="email"><br>

<h5>Gebruikersnaam</h5>
<input required type="text" name="gebruikersnaam"><br>

<h5>Wachtwoord:</h5>
<input required type="password" name="wachtwoord"><br>

<br>
<button type="submit">Registreren</button>
</form>
</body>
</html>