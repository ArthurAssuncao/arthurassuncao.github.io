<?php
	require($_SERVER['DOCUMENT_ROOT'].'/template/Pagina.class.php');
	$pagina = new Pagina();
	$pagina->setTitle('Página não encontrada - Arthur Assunção');
	$pagina->setDescription('Erro 404 - Pagina não encontrada');
	$pagina->setKeywords('Pagina não encontrada, 404');
	$pagina->setCanonical('http://arthurassuncao.com/erro/404');
	$pagina->addCSS('/css/prettify/prettify.css');
	$pagina->setBodyOnload('prettyPrint()');

	$pagina->embedded_css = "#principal{
		margin-right: auto;
		margin-left: auto;
		width: 100%;
	}
	#code_erro_404{
		font-size: 130%;
		z-index: 2;
	}
	#fundo{
		color: rgba(235, 235, 235, 0.5);
		position: absolute;
		z-index: 1;
		font-size: 2000%;
		padding-left: 50%;
		font-weight: bold;
		margin-left: auto;
		margin-right: auto;
	}";

	$pagina->iniciaConteudo();
?>
	<span id="fundo" class="nao_selecionavel" >
		404
		</span>
		<pre class="prettyprint lang-py">
<code id="code_erro_404">

		#!/usr/bin/python
		#coding: utf-8

		import ERRO_404
		if ERRO_404:
		  print 'Ops, A página requisitada não foi encontrada'
		  try:
		    print 'Verifique se há erros na url e recarregue a página'
		  except HTTPError:
		    print '<a href="http://arthurassuncao.com" title="Arthur Assunção Home">Voltar à página inicial</a>'

</code>
		</pre>
<?php
	$pagina->addJavascript('/js/prettify/prettify.js');
	$pagina->finalizaConteudo();
	echo $pagina->renderizar();
?>