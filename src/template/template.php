<!DOCTYPE html>
<html lang="<?php echo $this->lang ?>" prefix="og: http://ogp.me/ns#">
<?php
	// Header
	require('header.php');
?>
	<body <?php echo $this->body_onload != '' ? "onload='{$this->body_onload}'" : '' ?>>
		<div id="wrapper" class="container">
			<div id="principal" class="clearfix">
				<a href="https://github.com/ArthurAssuncao"><img style="position: fixed; top: 0; right: 0; border: 0; z-index: 9999;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>
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
	<script type="text/javascript" src="/min/?f=/js/bootstrap/bootstrap.min.js,/js/principal.js,/js/site.js"></script>
<?php 
	echo $this->createTagsJS($this->links_js_footer);
	echo $this->embedded_js_footer ? "<script type='text/javascript'>{$this->embedded_js_footer}</script>" : '';
 ?>
	</body>
</html>