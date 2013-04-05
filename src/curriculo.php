<?php
	require('template/PaginaCached.class.php');
	$pagina = new PaginaCached(__FILE__);
	$pagina->setTitle('Curriculo - Arthur Assunção');
	$pagina->setDescription('Curriculo de Arthur Assunção');
	$pagina->setKeywords('Curriculo, Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();
?>
	<h3>Currículo</h3>
<?php
	$pagina->finalizaConteudo();
	echo $pagina->renderizar();
?>