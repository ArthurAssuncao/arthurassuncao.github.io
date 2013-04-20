<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Repositorios - Arthur Assunção');
    $pagina->setDescription('Pagina com os repositorios dos projetos de Arthur Assunção');
    $pagina->setKeywords('repositorios, git, github, projetos, bitbucket, controle de versao');
    $pagina->setCanonical($pagina->createCanonicalLink());
    $pagina->addJavascript('js/gitview/gitview.pt.js');
    $pagina->iniciaConteudo();
?>
    <h3>Repositórios</h3>
    <div id="repositorios"></div>
    <br />
<?php
    $pagina->finalizaConteudo();
    $embedded_js_footer = "new Gitview({".
            "user       : 'arthurassuncao',".
            "domNode    : document.getElementById('repositorios'),".
            "count      : 10,".
            "showForks  : true,".
            "width      : '630px',".
            "theme     : 'light',".
            "compact    : true,".
        "});";
    $pagina->addEmbeddedJavascript($embedded_js_footer);
    echo $pagina->renderizar();
?>