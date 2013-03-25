<?php
	/* Footer das paginas do site */
	/*
		Variaveis que podem ser usadas
		$footer_links_js = linhas com tags script para js
		$footer_embedded_js = texto com js para adicionar
	*/
	require_once('cabecalho_obrigatorio.php');
	
	if(!function_exists('getLinksJS')){
		function getLinksJS($vetor_links){
			$tags = '';
			foreach ($vetor_links as $link) {
				$tags .= "\t".'<script type="text/javascript" src="'.$link.'"></script>'."\n";
			}
			return $tags;
		}
	}
	
	//seta os valores nas variaveis, assim nenhum fica como nao definida e passam a ter os valores padrao
	$footer_links_js = (isset($footer_links_js)) ? getLinksJS($footer_links_js) : ''; /*permite adicionar mais js nos arquivos */
	$footer_embedded_js = (isset($footer_embedded_js)) ? '<script type="text/javascript">'."\n".$footer_embedded_js."\n\t</script>\n" : ''; //permite adicionar mais js
?>
<br>
<!-- /div container -->
</div>
<!-- /div principal -->
</div>
<!-- /div wrapper -->
</div>
<!-- RODAPÉ -->
	<footer id="footer" class="well">
		<div class="container">
			<div class="row">
				<div class="span2 offset1">
					<h4>Links</h4>
					<ul class="unstyled justify">
						<li><a href="http://github.com/arthurassuncao">Repositórios no Github</a></li>
						<li><a href="http://lattes.cnpq.br/8136835668168874">Currículo Lattes</a></li>
						<li><a href="http://blog.arthurassuncao.com">Blog</a></li>
						<li><a href="http://www.youtube.com/arthurassuncao11">Youtube</a></li>
						<li>Sobre</li>
					</ul>
				</div>
			</div>
			<div class="row links_secundarios">
				<div class="span5">
				</div>
				<div class="span4">
					<small>
						<span id="copyright">© Arthur Assunção 2012 - <?php echo date("Y"); ?></span>
					</small>
				</div>
				<div id="menu_footer" class="span3">
					<small>
						<a href="http://arthurassuncao.com">Home</a> | 
						<a href="http://arthurassuncao.com/curriculo">Currículo</a> | 
						Sobre | 
						<a href="http://arthurassuncao.com/contato">Contato</a>
					</small>
				</div>
			</div>
		</div>
	</footer>
	<!-- Scripts rodam mais rapidos e de forma melhor estando no fim da pagina -->
	<?php //<script type="text/javascript" src="/js/jquery/jquery-1.8.3.min.js"></script> ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/site.js"></script>
<?php echo $footer_links_js ?>
<?php
echo $footer_embedded_js;
?>
	</body>
</html>