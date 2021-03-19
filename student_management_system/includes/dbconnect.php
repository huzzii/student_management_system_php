<?php
$host = 'localhost';
$user = 'root';
$password = '1357';
$dbname = 'SMS';
$connError;
try {
    // Set DSN
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
        // Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch(PDOException $e) {
    $connError =  "Connection failed: " . $e->getMessage();
}
?>