<?php

include 'Connection.php';


$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL);
if($url === false){
    header('Location: /index.php?sucesso=0');
    exit();
}

$titulo = filter_input(INPUT_POST,'titulo');

$sql = 'INSERT INTO videos (url, title) VALUES (?,?)';
$statement = $pdo->prepare($sql);
$statement->bindValue(1,$url);
$statement->bindValue(2,$titulo);

if($statement->execute() === false){
    header('Location: /index.php?sucesso=0');
}else{
    header('Location: /index.php?sucesso=1');
}

header('Location: /index.php');