<?php
	require('template/Pagina.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Arthur Assunção - Home');
	$pagina->setDescription('Arthur Assunção - Home');
	$pagina->setKeywords('Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
	$pagina->addCSS('css/jquery_github/github.css');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();
?>
	<div id="pagina_home" class="pagina">
    	<h3>Em breve...</h3>
    </div>
	<div id="pagina_repositorios" class="pagina"></div>
    <div id="pagina_curriculo" class="pagina"></div>
    <div id="pagina_contato" class="pagina"></div>
    <br>
<?php
	$pagina->finalizaConteudo();
	$pagina->addJavascript('js/jquery_github/jquery.github.js');
	$pagina->addJavascript('js/index.js');
	echo $pagina->renderizar();
?>