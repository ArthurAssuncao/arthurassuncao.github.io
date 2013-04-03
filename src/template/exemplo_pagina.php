<?php
	require('Pagina.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Exemplo');
	$pagina->iniciaConteudo();
?>
	<h2>Home</h2>
	<p>Lorem ipsum dolor sit amet, consectetur...</p>
<?php
	$pagina->finalizaConteudo();
	echo $pagina->renderizar('template.php');
?>