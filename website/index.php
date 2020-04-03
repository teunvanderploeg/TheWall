<?php include('databaseconnect.php'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="thewall" />
    <meta name="keywords" content="thewall" />
    <meta name="author" content="Teun en Romer" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <title>Welkom <?php session_start();

if ( ! isset( $_SESSION['user_id'] ) ) {echo "";}else{echo $_SESSION['gebruikersnaam'];}?> 

bij TheWall</title>
  </head>
  <body>
  <?php include('header.php'); ?>
    <section class="tracks">
    <?php foreach ($statement as $track): ?>
      <div class="track" id="track-<?php echo $track['id'] ?>">
      <a href="eenplaatje.php?id=<?php echo $track['id'] ?>">
        <img src="<?php echo $track['afbeelding'] ?>" alt="<?php echo $track['titel'] ?>"/>
    </a>
    </div>
    <?php endforeach ?>
    </section>
</body>
</html>





