<?php
	require('Template.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Home');
	$pagina->iniciaConteudo();
?>
	<h2>Home</h2>
	<p>Lorem ipsum dolor sit amet, consectetur...</p>
<?php
	$pagina->finalizaConteudo();
	echo $pagina->render('inc/template.php');
?>