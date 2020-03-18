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
    <link rel="stylesheet" type="text/css" href="style/home.css" />
    <title>TheWall</title>
  </head>
  <body>
  <header>
    <h1 class="logo">Jouw Afspeellijst</h1>
    <div class="header-right">
      <a class="active" href="#">Home</a>
      <a href="upload.html">Upload</a>
      <a href="#">Registreer</a>
    </div>
  </header>
    <section class="tracks">
    <?php foreach ($statement as $track): ?>
      <div class="track" id="track-<?php echo $track['id'] ?>">
        <img src="<?php echo $track['afbeelding'] ?>" alt="<?php echo $track['titel'] ?>"/>
      </div>
    <?php endforeach ?>
    </section>
</body>
  <script src="javascript.js"></script>
</html>





