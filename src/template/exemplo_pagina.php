<?php
	//require('Pagina.class.php');
	require('PaginaCached.class.php');
	//$pagina = new Pagina();
	$pagina = new PaginaCached();
	$pagina->setTitle('Exemplo');
	$pagina->iniciaConteudo();
?>
	<h2>Home</h2>
	<p>Lorem ipsum dolor sit amet, consectetur...</p>
<?php
	$pagina->finalizaConteudo();
	echo $pagina->renderizar('template.php');
?>