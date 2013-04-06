<?php
	require('template/PaginaCached.class.php');
	$pagina = new PaginaCached(__FILE__);
	$pagina->setTitle('Arthur Assunção');
	$pagina->setDescription('Arthur Assunção - Home Page');
	$pagina->setKeywords('Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
	$pagina->addCSS('css/jquery_github/github.css');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();
?>
	<div id="pagina_home" class="container pagina">
    	<h3>Em breve...</h3>
    </div>
	<div id="pagina_repositorios" class="container pagina"></div>
    <div id="pagina_curriculo" class="container pagina"></div>
    <div id="pagina_contato" class="container pagina"></div>
    <br />
<?php
	$pagina->finalizaConteudo();
	$pagina->addJavascript('js/jquery_github/jquery.github.js');
	$pagina->addJavascript('js/index.js');
	$embedded_js_footer = "
		$(document).ready(function() {
			var hash = window.location.hash;
			if(hash != ''){
			  	$('a[data-hash*='+'#pagina_' + hash.replace(/#/,'')+']').click();
			}
		});
	";
	$pagina->addEmbeddedJavascript($embedded_js_footer);
	echo $pagina->renderizar();
?>