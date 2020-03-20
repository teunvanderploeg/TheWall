<?php
//Verbindings gegevens instellen

require 'includes/functions.php';
$dbConnect = dbConnect();

$gebruikersnaam = filter_var($_POST['gebruikersnaam'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); 



    // $stmtt = $pdo->prepare("SELECT 1 FROM gebruikers WHERE email= $email");

            
    
    $stmt = $dbConnect->prepare(
        "INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord)
        VALUES (:gebruikersnaam, :email, :wachtwoord)");
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);

        $stmt->execute();

        header('Location: index.php');
        exit;
     
?>