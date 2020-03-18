<?php
//Verbindings gegevens instellen
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'thewall';


$gebruikersnaam = filter_var($_POST['gebruikersnaam'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT); 


try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $connection->query("SELECT * FROM `gebruikers`");

    // $stmtt = $pdo->prepare("SELECT 1 FROM gebruikers WHERE email=?");
    // $stmtt->execute([$email]); 
    // $user = $stmtt->fetch();
    // if ($user) {
    // echo "deze email word al gebruikt";
    // } else {
            
    
    $stmt = $connection->prepare(
        "INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord)
        VALUES (:gebruikersnaam, :email, :wachtwoord)");
        $stmt->bindParam(':gebruikersnaam', $gebruikersnaam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':wachtwoord', $wachtwoord);

        $stmt->execute();

        echo "<section>";
        echo "<h2>Je bent geregistreerd</h2>";
        echo "<a href='index.php'>back</a>";
        echo "</section>";
    // } 

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}?>