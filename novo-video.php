<?php

include 'Connection.php';


$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');

$sql = 'INSERT INTO videos (url, title) VALUES (?,?)';
$statement = $pdo->prepare($sql);
$statement->bindValue(1,$_POST['url']);
$statement->bindValue(2,$_POST['titulo']);

var_dump($statement->execute());