<?php

$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');

$id = $_GET['id'];
$sql = "DELETE FROM videos WHERE id = ?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1,$id);

if($statement->execute() === false){
    header('Location: /p?sucesso=0');
}else{
    header('Location: /?sucesso=1');
}
