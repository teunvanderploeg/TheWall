<?php include('admin_check.php'); ?>
<?php 
require 'includes/functions.php';

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $titel = filter_var($_POST['titel'], FILTER_SANITIZE_STRING);
    $bijschrift = filter_var($_POST['bijschrift'], FILTER_SANITIZE_STRING);

    // voorberijden 
    $nieuweInfo = [
        'titel' => $titel,
        'bijschrift' => $bijschrift,
    ];
        $sql = "UPDATE afbeeldingen SET titel=:titel, bijschrift=:bijschrift WHERE id = $id";

        $stmt = dbConnect()->prepare($sql);
        $stmt->execute($nieuweInfo);
        header("Location: adminpage.php");
?>