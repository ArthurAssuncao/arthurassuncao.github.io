<?php 
	$title = 'Arthur Assunção';
	$description = 'Arthur Assunção';
	$keywords = 'Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github';
	//$is_pagina_home = True;
	
	$links_css = ['css/jquery_github/github.css'];
	require_once('template/header.php');
?>
    <div id="pagina_home" class="pagina">
    	<h3>Em breve...</h3>
    </div>
	<div id="pagina_repositorios" class="pagina"></div>
    <div id="pagina_curriculo" class="pagina"></div>
    <div id="pagina_contato" class="pagina"></div>
    <br>
<?php
	$footer_links_js = ['js/jquery_github/jquery.github.js','js/index.js'];
	require_once('template/footer.php');
?>