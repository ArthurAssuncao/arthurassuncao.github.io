<?php
	/* menu de todas as paginas */
	$is_pagina_home = false;
	$is_pagina_repositorios = false;
	$is_pagina_curriculo = false;
	$is_pagina_contato = false;

	if (strcmp($this->canonical, 'http://arthurassuncao.com') == 0){
		//$is_pagina_home = true;
	}
	else if(strcmp($this->canonical, 'http://arthurassuncao.com/repositorios') == 0){
		$is_pagina_repositorios = true;
	}
	else if(strcmp($this->canonical, 'http://arthurassuncao.com/curriculo') == 0){
		$is_pagina_curriculo = true;
	}
	else if(strcmp($this->canonical, 'http://arthurassuncao.com/contato') == 0){
		$is_pagina_contato = true;
	}
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
				  <li data-slide="1" <?php echo $is_pagina_home ? 'class="selected"' : ''?>><a href="/" data-hash="#pagina_home" title="Home">Home</a></li>
				  <li data-slide="2" <?php echo $is_pagina_repositorios ? 'class="selected"' : ''?>><a href="/repositorios" data-hash="#pagina_repositorios" title="Repositórios">Repositórios</a></li>
				  <li data-slide="3" <?php echo $is_pagina_curriculo ? 'class="selected"' : ''?>><a href="/curriculo" data-hash="#pagina_curriculo" title="Currículo">Currículo</a></li>
				  <li data-slide="4" <?php echo $is_pagina_contato ? 'class="selected"' : ''?>><a href="/contato" data-hash="#pagina_contato" title="Contato">Contato</a></li>
				  <li class="dropdown"><a id="drop_projetos" data-target="#" href="#projetos" data-hash="#projetos" role="button" class="dropdown-toggle" data-toggle="dropdown" title="Projetos">Projetos <b class="caret"></b></a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="drop_projetos">
						<li role="menuitem"><a href="https://github.com/ArthurAssuncao/Android-CepView" title="Android CepView">Android CepView</a></li>
						<li role="menuitem"><a href="https://github.com/ArthurAssuncao/bootstrap4blogger" title="Bootstrap for Blogger">Bootstrap for Blogger</a></li>
						<li role="menuitem"><a href="https://github.com/ArthurAssuncao/SRWare_Iron_Updater" title="SRWare Iron Updater">SRWare Iron Updater</a></li>
					</ul>
				</ul>
			</nav>
		</div>
		<form class="form-search pull-right" method="get" action="/busca">
            <div class="input-prepend">
                <button class="btn botao_busca" type="submit"><i class="icon-search"></i></button>
                <input name="search" id="barra_busca" type="search" class="search-query input-medium" placeholder="procure no arthurassuncao.com" />
            </div>
		</form>
    </div>
  </div>
</div>