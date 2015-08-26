<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Sobre - Arthur Assunção');
    $pagina->setDescription('Pagina de informações sobre o Arthur Assuncao');
    $pagina->setKeywords('informacoes, sobre, arthur assuncao');
    $pagina->setCanonical($pagina->createCanonicalLink());
    $pagina->iniciaConteudo();
?>
    <h3>Sobre</h3>

<?php
    $pagina->finalizaConteudo();
    echo $pagina->renderizar();
?>