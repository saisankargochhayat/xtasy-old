<?php
$servername = "localhost";
$username = "root";
$password = "";
$mysql_db = 'xtasy';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$mysql_db", $username, $password);
    // set the PDO error mode to exception

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $salt = 'alssrp';
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
