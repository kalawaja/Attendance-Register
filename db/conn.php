
<?php
    //Development Connection
    $host= 'localhost';
    $db= 'attendance_db';
    $user= 'kalawaja';
    $pass='23340';
    $charset='utf8mb4';

    $dsn="mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo=new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    require_once 'user.php';
    $crud=new crud($pdo);
    $userAdmin=new user($pdo);

    $userAdmin->insertUser("admin", "password");
?>