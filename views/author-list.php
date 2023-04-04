<?php

require_once __DIR__ . '/inicio-html.php';
/** @var \Alura\Mvc\Entity\Author[] $authorList */
?>

<ul class="videos__container" alt="videos alura">
    <?php foreach ($authorList as $author) { ?>
        <li class="videos__item">
            <div class="descricao-video">
                <img src="public/img/logo.png" alt="logo canal alura">
                <h3><?php echo $author->nome; ?></h3>
                <div class="acoes-video">
                    <a href="/editar-video?id=<?= $author->id; ?>">Editar</a>
                    <a href="/remover-video?id=<?= $author->id; ?>">Excluir</a>
                </div>
            </div>
        </li>
    <?php } ?>

</ul>
<?php require_once __DIR__ . '/fim-html.php';
