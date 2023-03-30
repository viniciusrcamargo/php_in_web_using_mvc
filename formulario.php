<?php
$pdo = new PDO('mysql:dbname=aluraplay','vini','&9741*Pa875');

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$video = [
    'url' => '',
    'title' => '',
];
if ($id !== false && $id !== null) {
    $statement = $pdo->prepare('SELECT * FROM videos WHERE id = ?;');
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();
    $video = $statement->fetch(\PDO::FETCH_ASSOC);
}
?>
<?php require_once 'inicio-html.php'; ?>

    <main class="container">

        <form class="container__formulario" action="<?php $id === false ? '/novo-Video' : '/editar-Video?id=' . $id; ?>" method="post">
            <h3 class="formulario__titulo">Envie um vídeo!</h3>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="url">Link embed</label>
                    <input name="url" class="campo__escrita" required
                        placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url'
                           value="<?= $video['url']; ?>"
                    />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                    <input name="titulo" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                        id='titulo'  value="<?= $video['title']; ?>" />
                </div>

                <input class="formulario__botao" type="submit" value="Enviar" />
        </form>

    </main>

<?php require_once 'fim-html.php'; ?>