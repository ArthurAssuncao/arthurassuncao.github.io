<?php
	require('template/Pagina.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Busca - Arthur Assunção');
	$pagina->setDescription('Pagina de busca para buscar no site arthurassuncao.com');
	$pagina->setKeywords('Pagina de busca, busca, arthur assuncao, encontra, search');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();
?>
	<br />
	<script>
		(function() {
		var cx = '000108721877074523459:0ygmxanhm8y';
		var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
		gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
		'//www.google.com.br/cse/cse.js?cx=' + cx;
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
		})();
	</script>
	<div class="gcse-search" data-queryParameterName="search" data-enableAutoComplete="true" />

<?php
	$pagina->embedded_js_footer = "
		var parametros = window.location.search.substr(1);
		var termo_busca = parametros.split('=')[1];
		termo_busca = decodeURIComponent(termo_busca);
		$('#barra_busca').val(termo_busca);
	";
	$pagina->finalizaConteudo();
	echo $pagina->renderizar();
?>