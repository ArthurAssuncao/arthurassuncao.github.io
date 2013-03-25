<?php 
	$title = 'Página não encontrada - Arthur Assunção';
	$description = 'Erro 404 - Pagina não encontrada';
	$keywords = 'Pagina não encontrada';
	$canonical = 'http://arthurassuncao.com/erro/404';

	$embedded_css = "	#principal{
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
	
	$links_css = array('../css/prettify/prettify.css');
	$body_onload = 'prettyPrint()';
	
	require_once('../template/header.php');
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
	$footer_links_js = array('../js/prettify/prettify.js');
	require_once('../template/footer.php');
?>