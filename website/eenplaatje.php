<?php include('login_check.php'); ?>
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
  <div class="eenplaatje">
<img src="<?php echo $informatie['afbeelding'] ?>" alt="<?php echo $informatie['titel'] ?>"/>

<div class="titel">
<!-- <h5>Title:</h5> -->
<h5><?php echo $informatie['titel'];?></h5>
</div>

<div class="bijschrift">
<!-- <h5>Bijschrift:</h5> -->
<p><?php echo $informatie['bijschrift'];?></p>
</div>

</div>
</body>
</html>