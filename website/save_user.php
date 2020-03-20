<?php
//Verbindings gegevens instellen

require 'includes/functions.php';
$dbConnect = dbConnect();

$gebruikersnaam = filter_var($_POST['gebruikersnaam'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); 


echo 'gebruikersnaam: ';
echo $gebruikersnaam;
echo '<br>';
echo 'Email: ';
echo $email;
echo '<br>';




    $stmt_e = $dbConnect->prepare("SELECT * FROM gebruikers WHERE email= '$email'");

    $params = [
       'email' => $email
    ];

    $stmt_e->execute($params);

    if($stmt_e->rowCount() > 0){
      echo "Deze email bestaat al";
      exit;
    }else{


        $stmt_g = $dbConnect->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam' ";);

        $paramss = [
           'gebruikersnaam' => $gebruikersnaam
        ];
    
        $stmt_g->execute($paramss);
    
        if($stmt_g->rowCount() > 0){
          echo "Deze gebruikersnaam bestaat al";
          exit;
        }else{       
    
    $stmt = $dbConnect->prepare(
        "INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord)
        VALUES (:gebruikersnaam, :email, :wachtwoord)");

        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);

        $stmt->execute();
        echo "Dit account bestaat al";
        header('Location: index.php');
        exit;
    }
    }
?>