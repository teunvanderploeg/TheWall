<?php include('header.php'); ?>

<?php
//Verbindings gegevens instellen

require 'includes/functions.php';
$dbConnect = dbConnect();

$gebruikersnaam = filter_var($_POST['gebruikersnaam'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); 

echo '<br>';
echo 'gebruikersnaam: ';
echo $gebruikersnaam;
echo '<br>';
echo 'Email: ';
echo $email;
echo '<br>';




    $stmt_e = $dbConnect->prepare("SELECT * FROM gebruikers WHERE email = :email ");

    $params_e = [
       'email' => $email
    ];

    $stmt_e->execute($params_e);

    if($stmt_e->rowCount() > 0){
      echo "Deze email bestaat al";
      exit;
    }else{


        $stmt_g = $dbConnect->prepare("SELECT * FROM gebruikers WHERE gebruikersnaam = :gebruikersnaam ");

        $params_g = [
           'gebruikersnaam' => $gebruikersnaam
        ];
    
        $stmt_g->execute($params_g);
    
        if($stmt_g->rowCount() > 0){
          echo "Deze gebruikersnaam bestaat al";
          exit;
        }else{       
    

if($gebruikersnaam == ""){
  echo "Deze gebruikersnaam is niet goed";
          exit;
}else if($email == ""){
  echo "Deze email is niet goed";
}else if ($wachtwoord = ""){
  echo "Deze wachtwoord is niet goed";
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
  }
?>
