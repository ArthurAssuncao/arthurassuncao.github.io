<?php
	require('template/Pagina.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Busca - Arthur Assunção');
	$pagina->setDescription('Pagina de busca para buscar no site arthurassuncao.com');
	$pagina->setKeywords('Pagina de busca, busca, arthur assuncao, encontra, search');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();
?>
	<br>
	<script>
		(function() {
		var cx = '000108721877074523459:0ygmxanhm8y';
		var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		'//www.google.com.br/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
		})();
	</script>
	<gcse:search queryParameterName="search" enableAutoComplete="true" ></gcse:search>
<?php
	$pagina->finalizaConteudo();
	echo $pagina->renderizar();
?>