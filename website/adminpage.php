<?php include('admin_check.php'); ?>
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
    <link rel="stylesheet" type="text/css" href="style/personelijk.css" />
    <script src="https://kit.fontawesome.com/af1b884290.js" crossorigin="anonymous"></script>
    <title>Admin Page</title>
  </head>
  <body>
  <?php include('header.php'); ?>
    <section class="tracks">
    <?php foreach ($statement as $track): ?>
      <div class="track" id="track-<?php echo $track['id'] ?>">
      <img src="<?php echo $track['afbeelding'] ?>" alt="<?php echo $track['titel'] ?>"/>
        <a class="deletelink" href='delete.php?id=<?php echo $track['id']; ?>'><i class="fas fa-trash-alt deletebutton"></i></a>
        <a class="edditlink" href='edit.php?id=<?php echo $track['id']; ?>'><i class="fas fa-edit edditbutton"></i></a>
      </div>
    <?php endforeach ?>
    </section>
</body>
</html>





