<!DOCTYPE html>
<html lang="<?php echo $this->lang ?>" prefix="og: http://ogp.me/ns#">
<?php
	// Header
	include('header.php');
?>
	<body <?php echo $this->body_onload != '' ? "onload='$this->body_onload'" : '' ?>>
		<div id="wrapper" class="container">
			<div id="principal" class="clearfix">
<?php
	// Menu
	include('menu.php');
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
	include('footer.php');
?>