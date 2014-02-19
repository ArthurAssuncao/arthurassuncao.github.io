<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Portfolio - Arthur Assunção');
    $pagina->setDescription('Portfolio de Arthur Assuncao');
    $pagina->setKeywords('informacoes, portfolio, websites, programas, arthur assuncao');
    $pagina->setCanonical($pagina->createCanonicalLink());
    $pagina->iniciaConteudo();
?>
    <br />
    Portfolio

    <div>

<?php
    $pagina->finalizaConteudo();
    echo $pagina->renderizar();
?>