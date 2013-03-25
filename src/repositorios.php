<?php 
	$title = 'Repositorios - Arthur Assunção';
	$description = 'Pagina com os repositorios dos meus projetos';
	$keywords = 'repositorios, git, github, projetos';
	$canonical = 'http://arthurassuncao.com/busca';
	$is_pagina_repositorios = True;
	
	$links_js = ['js/gitview/gitview.pt.js'];

	require_once('template/header.php');
?>
	<h1>Repositórios</h1>
	<div id="repositorios"></div>
<?php 
	$footer_embedded_js = "new Gitview({".
			"user       : 'arthurassuncao',".
			"domNode    : document.getElementById('repositorios'),".
			"count      : 10,".
			"showForks  : true,".
			"width      : '630px',".
			"theme 	   : 'dark',".
			"compact    : true,".
		"});";
	require_once('template/footer.php');
?>