
<?php
require 'includes/functions.php';

$errors = [];

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) 
{
$email      = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$sql       = 'SELECT * FROM `gebruikers` WHERE `email` = :email';
$statement = dbConnect()->prepare( $sql );

$params = [
    'email' => $email
];

$result = $statement->execute( $params );
    
    if ( $statement->rowCount() === 1 ) 
    {
        // OK, er is een rij gevonden met dit email adres, deze ophalen
        $gebruiker = $statement->fetch();
        

        if ( password_verify( $wachtwoord, $gebruiker['wachtwoord'] ) ) 
        {
            $errors = [];
            
            // GEBRUIKER INLOGGEN
            // Nu de id en voornaam van de gebruiker in de sessie zetten
            session_start();
            $_SESSION['user_id']  = $gebruiker['id'];
            $_SESSION['gebruikersnaam'] = $gebruiker['gebruikersnaam'];
            
            // GEBRUIKER DOORSTUREN NAAR BEVEILIGDE PAGINA
            header( 'Location: index.php' );
            exit;
            
        } else
            {
            $errors['wachtwoord'] = 'Fout wachtwoord';
            }
    } 
    else {
        $errors['email'] = 'Onbekend account';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Teun van der Ploeg" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Login</title>
  </head>
  <body>
  <?php include('header.php'); ?>
    <h1>Inloggen</h1>
    <form action="login.php" method="POST">
        <p>
            <label for="">Email</label>
            <input type="text" name="email">
            <?php if ( isset( $errors['email'] ) ): ?>
            <span class="error"><?php echo $errors['email'] ?></span>
            <?php endif; ?>
        </p>
        <p>
            <label for="">Wachtwoord</label>
            <input type="password" name="wachtwoord">
            <?php if ( isset( $errors['wachtwoord'] ) ): ?>
            <span class="error"><?php echo $errors['wachtwoord'] ?></span>
            <?php endif; ?>
        </p>
        <button type="submit">Inloggen</button>
    </form>
    </body>
</html>
