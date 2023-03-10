<?php
$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL);
if($url === false){
    header('Location: /?sucesso=0');
    exit();
}

$titulo = filter_input(INPUT_POST,'titulo');

$repository = new Alura\Mvc\Repository\VideoRepository($pdo);

if($repository->add(new Alura\Mvc\Entity\Video($url, $titulo) )=== false){
    header('Location: /?sucesso=0');
}else{
    header('Location: /?sucesso=1');
}
