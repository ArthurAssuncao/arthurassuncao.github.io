<!DOCTYPE html>
<html lang="<?php echo $this->lang ?>" prefix="og: http://ogp.me/ns#">
<?php
	// Header
	require('header.php');
?>
	<body <?php echo $this->body_onload != '' ? "onload='{$this->body_onload}'" : '' ?>>
		<div id="wrapper" class="container">
			<div id="principal" class="clearfix">
				<div class="github-fork-ribbon-wrapper right hidden-phone">
			        <div class="github-fork-ribbon">
			            <a href="https://github.com/ArthurAssuncao">Fork me on GitHub</a>
			        </div>
			    </div>
<?php
	// Menu
	require('menu.php');
?>
	<div id="conteudo" class="container">
<?php
	// Conteudo
	echo $this->conteudo;
?>
			<!-- /div container -->
			</div>
		<!-- /div principal -->
		</div>
	<!-- /div wrapper -->
	</div>
<?php
	// Footer
	require('footer.php');
?>
	<!-- Scripts rodam mais rapidos e de forma melhor estando no fim da pagina -->
	<?php //<script type="text/javascript" src="/js/jquery/jquery-1.8.3.min.js"></script> ?>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/min/?f=/js/principal.js,/js/site.js"></script>
<?php 
	echo $this->createTagsJS($this->links_js_footer);
	echo $this->embedded_js_footer ? "<script type='text/javascript'>{$this->embedded_js_footer}</script>" : '';
 ?>
	</body>
</html>