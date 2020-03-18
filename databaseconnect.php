<?php
//Verbindings gegevens instellen
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'thewall';

try {
    $connection = new PDO('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $connection->query("SELECT * FROM `afbeeldingen`");

} catch (PDOException $e) {
    echo 'Fout bij database verbinding:<br>' . $e->getMessage() . ' op regel ' . $e->getLine() . ' in ' . $e->getFile();
    exit;
}?>