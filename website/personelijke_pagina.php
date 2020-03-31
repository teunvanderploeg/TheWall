<?php include('login_check.php'); ?>
<?php
require 'includes/functions.php';


$user_id = $_SESSION['user_id'];
$statement = dbConnect()->query("SELECT * FROM afbeeldingen WHERE gebruiker_id = $user_id");

$statement->execute();
$track = $statement->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="thewall" />
    <meta name="keywords" content="thewall" />
    <meta name="author" content="Teun en Romer" />
    <script src="https://kit.fontawesome.com/af1b884290.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style/index.css" />
    <link rel="stylesheet" type="text/css" href="style/personelijk.css" />
    <title>Welkom <?php if ( ! isset( $_SESSION['user_id'] ) ) {echo "";}else{echo $_SESSION['gebruikersnaam'];}?> bij TheWall</title>
  </head>
  <body>
  <?php include('header.php'); ?>
    <section class="tracks">
    <?php foreach ($statement as $afbeeldingen): ?>
      <div class="track" id="track-<?php echo $afbeeldingen['id'] ?>">
        <img src="<?php echo $afbeeldingen['afbeelding'] ?>" alt="<?php echo $afbeeldingen['titel'] ?>"/>
    <?php if ( $_SESSION['user_id'] === $user_id )  { ?>
    <a class="deletelink" href='delete.php?id=<?php echo $afbeeldingen['id']; ?>'><i class="fas fa-times deletebutton"></i></a>
    <?php } ?>
      </div>
    <?php endforeach ?>
    </section>
</body>
</html>