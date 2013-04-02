<?php
	include('header.php');
?>
	<body <?php echo $body_onload != '' ? 'onload="'.$body_onload.'"' : '' ?>>
		<div id="wrapper" class="container">
			<div id="principal" class="clearfix">
<?php
	//destruindo variaveis
	unset($body_onload);
?>
<?php
	include('menu.php');
?>
	<div id="conteudo" class="container">
<?php
	//conteudo
	echo $this->conteudo;
?>
			<!-- /div container -->
			</div>
		<!-- /div principal -->
		</div>
	<!-- /div wrapper -->
	</div>
<?php
	include('footer.php');
?>