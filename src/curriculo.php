<?php
	require('template/PaginaCached.class.php');
	$pagina = new PaginaCached(__FILE__);
	$pagina->setTitle('Curriculo - Arthur Assunção');
	$pagina->setDescription('Curriculo de Arthur Assunção');
	$pagina->setKeywords('Curriculo, Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
	$pagina->setCanonical($pagina->createCanonicalLink());
	$pagina->iniciaConteudo();

	$embeddedCss = "
		li.curriculo_item{
			margin-top: 10px;
		}
		.curriculo_instituicao, curriculo_periodo{
			padding-bottom: 5px;
			color: gray;
		}
	";
	$pagina->addEmbeddedCSS($embeddedCss);
	//decodeURIComponent
	$embeddedJS = "
		$(document).ready(function() {
			$('[data-email]').each(function(){
				var email = $(this).data('email');
				var email_decodificado = decodeURIComponent(email);
				$(this).html(email_decodificado);
			});
		});
	";
	$pagina->addEmbeddedJavascript($embeddedJS);

	require('template/PaginaCurriculo.class.php');
?>
	<h3>Currículo</h3>
	<div>
		<div id="curriculo_resumo" class="pull-left span6 offset1 justify">
			<h4>Resumo</h4>
			<p>Arthur Assunção é atualmente desenvolvedor de aplicações móveis para o suporte a aplicações comerciais
			 e desenvolvedor de Web Services para a comunicação das aplicações móveis com os sistemas comerciais.</p>
		</div>
		<div class="pull-right span4">
			<h4 class="pull-right"><strong>Arthur Nascimento Assunção</strong></h4><br />
			<span class="pull-right">Nasceu em 11/05/1992</span><br /><br />
			<span class="pull-right">Barbacena / MG</span><br />
			<span class="pull-right" data-email="%63%6f%6e%74%61%74%6f%40%61%72%74%68%75%72%61%73%73%75%6e%63%61%6f%2e%63%6f%6d"></span><br />
			<span class="pull-right">blog.arthurassuncao.com</span><br />
		</div>
	</div>
	<div class="span7 justify">
		<div id="curriculo_experiencia">
			<h4>Experiência</h4>
			<ul id="lista_experiencia" class="unstyled">
				<li class='curriculo_item'>
					<?php 
					echo PaginaCurriculo::createExperiencia(
						"Desenvolvedor de Aplicações Móveis Android e Aplicações Web Django", 
						"Add TI Integradora de Soluções LTDA",
						"", 
						"Desenvolvimento de aplicações móveis para o suporte a outros sistemas comerciais, e desenvolvimento de um WebServices para intercâmbio dos dados com as aplicações móveis.",
						"2012 - (Emprego atual)"
					); 
					?>
				</li>
			</ul>
		</div>
		<hr />
		<div id="curriculo_experiencia_academica">
			<h4>Experiência Acadêmica</h4>
			<ul id="lista_experiencia_academica" class="unstyled">
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createExperienciaAcademica(
						"Acompanhamento dos Egressos utilizando Ferramenta On-Line", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"",
						"",
						"2012 - 2013" 
					);
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createExperienciaAcademica(
						"Acompanhamento dos Egressos utilizando Ferramenta On-Line",
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"Sistema Integrado de Gestão Acadêmica – SIGA ADM - RENAPI",
						"Desenvolvimento e manutenção do projeto Sistema Integrado de Gestão Acadêmica (SIGA-ADM)", 
						"2012 - 2012"
					); 
					?>
				</li>
			</ul>
		</div>
		<hr />
		<div id="curriculo_formacao">
			<h4>Formação</h4>
			<ul id="lista_formacao" class="unstyled">
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacao(
						"Superior de Tecnologia em Sistemas para Internet", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"",
						"2011 - em andamento",
						"" 
					);
					?>
				</li>
			</ul>
		</div>
		<hr />
		<div id="curriculo_formacao_complementar">
			<h4>Formação Complementar</h4>
			<ul id="lista_formacao_complementar" class="unstyled">
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"Python para Administradores de Redes Linux", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"",
						"2012 - 2012",
						"40 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"Programação para Dispositivos Móveis com Android", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"",
						"2012 - 2013",
						"40 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"SQL Completo", 
						"Softblue",
						"",
						"2012 - 2012",
						"20 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"Montagem e Manutenção de Computadores", 
						"Fundação ACMinas",
						"",
						"2012 - 2012",
						"20 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"HTML Avançado", 
						"Fundação Bradesco",
						"",
						"2011 - 2011",
						"64 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"Javascript", 
						"Fundação Bradesco",
						"",
						"2011 - 2011",
						"45 h"
					); 
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createFormacaoComplementar(
						"Web Design", 
						"Infocob Informática",
						"",
						"2009 - 2009",
						"44 h"
					); 
					?>
				</li>
			</ul>
		</div>
		<hr />
		<div id="curriculo_seminarios_eventos">
			<h4>Participação em Seminários e Eventos</h4>
			<ul id="lista_seminarios_eventos" class="unstyled">
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createSeminiarioEvento(
						"Escola Regional de Informática de Minas Gerais", 
						"Universidade Federal de Juiz de Fora",
						"Juiz de Fora, MG", 
						"21 a 22 de Novembro de 2012"
					);
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createSeminiarioEvento(
						"Workshop Mineiro de Sistemas de Informação", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"Juiz de Fora, MG", 
						"23 a 24 de Novembro de 2012"
					);
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createSeminiarioEvento(
						"ACM International Collegiate Programming Contest (XVI Maratona de Programação)", 
						"Universidade Salgado de Oliveira",
						"Juiz de Fora, MG", 
						"17 de Setembro de 2011"
					);
					?>
				</li>
				<li class='curriculo_item'>
					<?php
					echo PaginaCurriculo::createSeminiarioEvento(
						"2º Simpósio de Tecnologia em Sistemas para Internet - Uma Visão Geral", 
						"Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
						"Barbacena, MG", 
						"22 de março de 2011"
					);
					?>
				</li>
			</ul>
		</div>
	</div>
	<div class="span6 offset6"></div>
<?php
	$pagina->finalizaConteudo();
	$embeddedCss = "
		.instituicao{
			color: gray;
		}
	";
	$pagina->addEmbeddedCSS($embeddedCss);
	echo $pagina->renderizar();
?>