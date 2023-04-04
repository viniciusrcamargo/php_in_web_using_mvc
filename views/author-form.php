<?php

require_once __DIR__ . '/inicio-html.php'; ?>
    <main class="container">
        <form class="container__formulario"
              method="post">
            <h2 class="formulario__titulo">Cadastre um Autor!</h2>

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Nome do autor</label>
                <input name="nome"
                       value="<?= $author?->nome; ?>"
                       class="campo__escrita"
                       required
                       placeholder="Neste campo, dê o nome do Autor"
                       id='titulo' />
            </div>

            <input class="formulario__botao" type="submit" value="Enviar" />
        </form>
    </main>

<?php
require_once __DIR__ . '/fim-html.php';