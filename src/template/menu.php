<?php
	/* menu de todas as paginas */
	$is_pagina_home = (isset($is_pagina_home) && $is_pagina_home) ? $is_pagina_home : False;
	$is_pagina_repositorios = (isset($is_pagina_repositorios) && $is_pagina_repositorios) ? $is_pagina_repositorios : False;
	$is_pagina_curriculo = (isset($is_pagina_curriculo) && $is_pagina_curriculo) ? $is_pagina_curriculo : False;
	$is_pagina_contato = (isset($is_pagina_contato) && $is_pagina_contato) ? $is_pagina_contato : False;
?>
<!-- MENU SUPERIOR-->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
		<a data-toggle="collapse" class="btn btn-navbar" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>
		<a class="brand" href="/" data-hash="#home">Arthur Assunção</a>
		<div id="barra_menu" class="nav-collapse">
			<nav>
				<ul class="nav" id="nav">
				  <li data-slide="1" <?php echo $is_pagina_home ? 'class="selected"' : ''?>><a href="/" data-hash="#pagina_home">Home</a></li>
				  <li data-slide="2" <?php echo $is_pagina_repositorios ? 'class="selected"' : ''?>><a href="/repositorios" data-hash="#pagina_repositorios">Repositórios</a></li>
				  <li data-slide="3" <?php echo $is_pagina_curriculo ? 'class="selected"' : ''?>><a href="/curriculo" data-hash="#pagina_curriculo">Currículo</a></li>
				  <li data-slide="4" <?php echo $is_pagina_contato ? 'class="selected"' : ''?>><a href="/contato" data-hash="#pagina_contato">Contato</a></li>
				  <li class="dropdown"><a id="drop_projetos" href="#projetos" data-hash="#projetos" role="button" class="dropdown-toggle" data-toggle="dropdown">Projetos <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop_projetos">
						<li><a href="https://github.com/ArthurAssuncao/Android-CepView">Android CepView</a></li>
						<li><a href="https://github.com/ArthurAssuncao/bootstrap4blogger">Bootstrap for Blogger</a></li>
						<li><a href="https://github.com/ArthurAssuncao/SRWare_Iron_Updater">SRWare Iron Updater</a></li>
					</ul>
				</ul>
			</nav>
		</div>
		<form class="form-search pull-right" method="get" action="/busca">
            <div class="input-prepend">
                <button class="btn botao_busca" type="submit"><i class="icon-search"></i></button>
                <input name="search" id="barra_busca" type="search" class="search-query input-medium" placeholder="procure no arthurassuncao.com" />
            </div>
            <!--<a id="muda_tema" href="#" class="btn btn-small" style="background-color: #e6e6e6">&nbsp;</a>-->
		</form>
    </div>
  </div>
</div>