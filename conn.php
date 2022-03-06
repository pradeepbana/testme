<?php

    $host = '127.0.0.1';
    $db = 'testme';
    $user = 'root';
    $pass = '';
    $charset= 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'heuuu';        
    } catch(PDOException $e) {
        throw new PDOException($e->getmessage());
    }

   // require_once 'crud.php';
    require_once 'users.php';
   // $crud = new crud($pdo);
    $user = new user($pdo);

    $user->insertUser('admin','ps5456');
     $user->insertUser('hacker','1234');
?>
