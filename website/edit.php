<?php include('admin_check.php'); ?>
<?php 
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
$informatie = $statement->fetch();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Teun van der Ploeg" />
    <link rel="stylesheet" type="text/css" href="style/center.css" />
    <link rel="stylesheet" type="text/css" href="style/index.css" />
  </head>
  <body>
  <?php include('header.php'); ?>
<h1>Edit van een plaatje</h1>
<img src="<?php echo $informatie['afbeelding'] ?>" alt="<?php echo $informatie['titel'] ?>"/>
<form action="update.php" method="post">
<input type="hidden" name="id" value="<?php echo $informatie['id'];?>" ><br>
<h5>Title:</h5>
<input type="text" name="titel" value="<?php echo $informatie['titel'];?>"><br>
<h5>Bijschrift:</h5>
<input type="text" name="bijschrift" value="<?php echo $informatie['bijschrift'];?>"><br>
<br>
<button type="submit">opslaan</button>
</form>
</body>
</html>