<?php
//Verbindings gegevens instellen
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'thewall';

try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $connection->query("SELECT * FROM `afbeeldingen`");

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}?>





<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="thewall" />
    <meta name="keywords" content="thewall" />
    <meta name="author" content="Teun en Rommer" />
    <link rel="stylesheet" type="text/css" href="home.css" />
    <title>TheWall</title>
  </head>
  <body>

  <div class="section">
<?php
foreach ($statement as $afbeeldingen){?>
<div class="afbeelding">
    <img src="img/<?php echo $afbeeldingen['afbeelding'] ?>" class="image"/>
</div>

<?php }?></div>

  </body>
  <script src="javascript.js"></script>
</html>





