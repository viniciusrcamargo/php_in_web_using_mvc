<?php
$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');
if(isset($_GET['id'])) {
    $videoList = $pdo->prepare('SELECT * FROM videos where id = ?;');
    $videoList->bindValue(1, $_GET['id']);
    $videoList->execute();
}else{
    header('Location: /index.php?sucesso=0');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

<!-- Cabecalho -->
<header>

    <nav class="cabecalho">
        <a class="logo" href="../index.php"></a>

        <div class="cabecalho__icones">
            <a href="./enviar-video.html" class="cabecalho__videos"></a>
            <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
        </div>
    </nav>

</header>

<main class="container">
    <?php foreach ($videoList as $video): ?>
    <form class="container__formulario" action="../edita-video.php" method="post">
        <input name="id" type="hidden" value="<?php echo $video['id']?>">
        <h3 class="formulario__titulo">Envie um vídeo!</h3>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link embed</label>
            <input name="url" class="campo__escrita" required
                   placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' value="<?= $video['url']?>" />
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
            <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                   id='titulo' value="<?= $video['title']?>"/>
        </div>

        <input class="formulario__botao" type="submit" value="Enviar" />
    </form>
    <?php endforeach; ?>
</main>

</body>

</html>