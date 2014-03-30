<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);
    $pagina->setTitle('Curriculo - Arthur Assunção');
    $pagina->setDescription('Curriculo de Arthur Assunção');
    $pagina->setKeywords('Curriculo, Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github');
    $pagina->setCanonical($pagina->createCanonicalLink());
    $pagina->iniciaConteudo();

    $embeddedJs = "
        $(document).ready(function(){
            $('.skill_bar').each(function(){
                var tamanho = $(this).data('skillbar');
                $(this).animate({
                    width: tamanho+'%'
                }, 1000);
            });
        });
    ";
    $pagina->addEmbeddedJavascript($embeddedJs);

    require('template/PaginaCurriculo.class.php');
?>
    <h3>Currículo</h3>
    <div class="container" itemscope='itemscope' itemtype='http://schema.org/Person'>
        <div class="pull-right col-md-5">
            <h4 class="pull-right"><strong><span itemprop='name'>Arthur Nascimento Assunção</span></strong></h4><br /><br />
            <span class="pull-right">Nasceu em 11/05/1992</span><br />
            <span class="pull-right">Barbacena / MG</span><br />
            <span class="pull-right" data-email="%63%6f%6e%74%61%74%6f%40%61%72%74%68%75%72%61%73%73%75%6e%63%61%6f%2e%63%6f%6d"></span><br />
            <span class="pull-right">github.com/arthurassuncao</span><br />
            <span class="pull-right">blog.arthurassuncao.com</span><br />
        </div>
        <div id="curriculo_resumo" class="pull-left col-md-6 col-md-offset-1 justify">
            <h4>Resumo</h4>
            <span itemprop='description'>
                <p>Arthur Assunção é atualmente <span itemprop='jobTitle'>desenvolvedor de aplicações</span> móveis e Web</span>.</p>
                <p>Graduado em <strong>Tecnologia em Sistemas para Internet</strong> pelo Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais.</p>
            </span>
        </div>
    </div>
    <div class="row">
        <div class="container col-md-7 justify">
            <div id="curriculo_experiencia">
                <h4>Experiência</h4>
                <ul id="lista_experiencia" class="list-unstyled">
                    <li class='curriculo_item'>
                        <?php 
                        echo PaginaCurriculo::createExperiencia(
                            "Desenvolvedor de Aplicações Móveis Android e HTML5 e Aplicações Web Django", 
                            "<a href='http://www.addmob.com.br' title='AddMob Integradora de Soluções'>AddMob Integradora de Soluções</a>",
                            "", 
                            "Desenvolvimento de aplicações móveis Android e Web Services em python com o framework Django, uso de notação JSON para representação dos dados para comunicação com as aplicações móveis. Utilização de controle de versão Git para melhor 
manutenção do código e colaboração entre os membros da equipe.",
                            "dezembro de 2012",
                            "fevereiro de 2014"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php 
                        echo PaginaCurriculo::createExperiencia(
                            "Desenvolvedor Web e Web Designer",
                            "Freelancer",
                            "Website Addmob.com.br",
                            "Desenvolvimento em conjunto com o profissional Charles Tim Batista Garrocho do website da empresa <a href='http://www.addmob.com.br'>AddMob Integradora de Soluções Ltda</a>. Website desenvolvido em HTML5 e Django, utilizando ainda o framework Bootstrap e Jquery, com layout responsivo e captura de gestos para melhor experiência em dispositivos móveis.",
                            null,
                            "2013"
                        ); 
                        ?>
                    </li>
                </ul>
            </div>
            <hr />
            <div id="curriculo_experiencia_academica">
                <h4>Experiência Acadêmica</h4>
                <ul id="lista_experiencia_academica" class="list-unstyled">
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createExperienciaAcademica(
                            "Sistema Integrado de Gestão Acadêmica - SIGA – RENAPI (Rede Nacional de Pesquisa e Inovação) da SETEC/MEC, 
núcleo do Instituto Federal do Sudeste de Minas Gerais câmpus Barbacena",
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "Desenvolvedor e Tester em Java e PHP/Miolo",
                            "Desenvolvimento, suporte e teste do Sistema Integrado de Gestão Acadêmica utilizado em institutos e universidades federais do Brasil. Desenvolvimento em PHP com o framework MIOLO e em Java, uso de ORM para acesso ao banco de dados PostgreSQL. Uso de controle de versão SVN e do gerenciador de projetos Redmine para melhor manutenção do código e colaboração entre os membros das equipes distribuídas pelo Brasil.", 
                            "março de 2012",
                            "junho de 2012"
                        );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createExperienciaAcademica(
                            "Acompanhamento dos Egressos utilizando Ferramenta On-Line",
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "Bolsista",
                            "Levantamento de informações sobre os cursos do Instituto Federal do Sudeste de Minas Gerais câmpus Barbacena, configuração da ferramenta de questionários LimeSurvey, montagem e acompanhamento de questionários voltados para alunos egressos e analise dos dados obtidos",
                            "outubro de 2012",
                            "janeiro de 2013"
                        );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createExperienciaAcademica(
                            "Centro Acadêmico do Curso de Tecnologia em Sistemas para Internet",
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "Secretário Geral",
                            "", 
                            "Gestão 2013",
                            null
                        );
                        ?>
                    </li>
                </ul>
            </div>
            <hr />
            <div id="curriculo_formacao">
                <h4>Formação</h4>
                <ul id="lista_formacao" class="list-unstyled">
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacao(
                            "Mestrado em Ciẽncia da Computação", 
                            "Universidade Federal de Ouro Preto",
                            "",
                            "",
                            "2014",
                            ""
                        );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacao(
                            "Superior de Tecnologia em Sistemas para Internet", 
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "",
                            "2.500 h",
                            "2011",
                            "2014"
                        );
                        ?>
                    </li>
                </ul>
            </div>
            <hr />
            <div id="curriculo_formacao_complementar">
                <h4>Formação Complementar</h4>
                <ul id="lista_formacao_complementar" class="list-unstyled">
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Python para Administradores de Redes Linux", 
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "",
                            "40 h",
                            "2012",
                            "2012"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Programação para Dispositivos Móveis com Android", 
                            "Instituto Federal de Educação, Ciência e Tecnologia do Sudeste de Minas Gerais",
                            "",
                            "40 h",
                            "2012",
                            "2013"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "SQL Completo", 
                            "Softblue",
                            "",
                            "20 h",
                            "2012",
                            "2012"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Montagem e Manutenção de Computadores", 
                            "Fundação ACMinas",
                            "",
                            "20 h",
                            "2012",
                            "2012"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "HTML Avançado", 
                            "Fundação Bradesco",
                            "",
                            "64 h",
                            "2011",
                            "2011"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Javascript", 
                            "Fundação Bradesco",
                            "",
                            "45 h",
                            "2011",
                            "2011"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Web Design", 
                            "Infocob Informática",
                            "",
                            "44 h",
                            "2009",
                            "2009"
                        ); 
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                        echo PaginaCurriculo::createFormacaoComplementar(
                            "Aprendizagem Industrial de Instalação Elétrica Industrial", 
                            "SENAI - Barbacena",
                            "Instalar e montar componentes e dispositivos eletroeletrônicos para acionamento de máquinas industriais em redes elétricas de baixa tensão, obedecendo a especificações de projeto elétrico bem como normas técnicas de instalação elétrica, de saúde, meio ambiente e de segurança do trabalho.",
                            "800 h",
                            "2009",
                            "2010"
                        ); 
                        ?>
                    </li>
                </ul>
            </div>
            <hr />
            <div id="curriculo_outros_conhecimentos">
                <h4>Outros Conhecimentos</h4>
                <div class="container">
                    <ul id="lista_outros_conhecimentos" class="list-unstyledERRO">
                        <li class='curriculo_item'>
                            Linguagens de programação: Pascal, C, C++, Java, PHP, Python, Javascript.
                        </li>
                        <li class='curriculo_item'>
                            HTML5, CSS3
                        </li>
                        <li class='curriculo_item'>
                            Linguagens de interoperabilidade: JSON, XML.
                        </li>
                        <li class='curriculo_item'>
                            Frameworks/Bibliotecas: Django, MIOLO, Jquery, Jquery Mobile, Bootstrap 2.x e 3.0.
                        </li>
                        <li class='curriculo_item'>
                            Sistemas de controle de versão: Git, SVN.
                        </li>
                        <li class='curriculo_item'>
                            Bancos de dados relacionais: MySQL, Postgres, SQLite, HyperSQL.
                        </li>
                        <li class='curriculo_item'>
                            Web Service RESTful.
                        </li>
                        <li class='curriculo_item'>
                            Versionamento Semântico (SemVer).
                        </li>
                        <li class='curriculo_item'>
                            Design responsivo e desenvolvimento de sites otimizados para dispositivos portáteis.
                        </li>
                        <li class='curriculo_item'>
                            Desenvolvimento em ambientes Unix/Linux.
                        </li>
                        <li class='curriculo_item'>
                            Search Engine Optimization (SEO).
                        </li>
                        <li class='curriculo_item'>
                            Facebook OpenGraph e HTML5 Microdata.
                        </li>
                    </ul>
                </div>
            </div>
            <hr />
            <div id="curriculo_seminarios_eventos">
                <h4>Participação em Seminários e Eventos</h4>
                <ul id="lista_seminarios_eventos" class="list-unstyled">
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
            <hr />
            <div id="curriculo_projetos_opensource">
                <h4>Projetos Open Source</h4>
                <ul id="lista_projetos_opensource" class="list-unstyled">
                    <li class='curriculo_item'>
                        <?php
                            echo PaginaCurriculo::createProjeto(
                                "ArthurAssuncao.com", 
                                "https://github.com/ArthurAssuncao/ArthurAssuncao.com",
                                "Meu Site pessoal, utiliza HTML5, CSS3, Jquery, Bootstrap e um layout responsivo, usa Ajax para carregar o conteúdo da Home que segue o padrão single page. 
                                Utiliza PHP e a biblioteca Minify para reduzir os arquivos JS e CSS e faz Cache das páginas e arquivos."
                            );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                            echo PaginaCurriculo::createProjeto(
                                "Android CepView", 
                                "https://github.com/ArthurAssuncao/Android-CepView",
                                "Android Cep View é um Android UI widget com os principais campos relacionados a endereço (CEP, endereço, número, complemento, bairro, cidade, estado), 
                                fornece preenchimento automático dos dados com base no CEP (Código de Endereçamento Postal) informado."
                            );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                            echo PaginaCurriculo::createProjeto(
                                "Github Portfolio Generator", 
                                "https://github.com/ArthurAssuncao/Github_Portfolio_Generator",
                                "Gera portfólio com os projetos públicos hospedados no Github."
                            );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                            echo PaginaCurriculo::createProjeto(
                                "Bootstrap for Blogger", 
                                "https://github.com/ArthurAssuncao/bootstrap4blogger",
                                "Template para o Blogger usando o framework Twitter Bootstrap"
                            );
                        ?>
                    </li>
                    <li class='curriculo_item'>
                        <?php
                            echo PaginaCurriculo::createProjeto(
                                "SRWare Iron Updater", 
                                "https://github.com/ArthurAssuncao/SRWare_Iron_Updater",
                                "Extensão para o navegador SRWare Iron para verificar se há novas atualizações."
                            );
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <div id="curriculo_habilidades">
                <h4>Habilidades</h4>
                <ul class="list-unstyled">
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Java", "70");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Python", "80");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Android", "90");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Django", "80");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Jquery", "75");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("xHTML/HTML5", "80");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Git (Controle de Versão)", "90");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("SQL", "80");
                        ?>
                    </li>
                    <li>
                        <?php
                        echo PaginaCurriculo::createHabilidade("PHP", "70");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("JSF (Java Server Faces)", "50");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("Javascript", "70");
                        ?>
                    </li>
                    <li>
                        <?php
                            echo PaginaCurriculo::createHabilidade("JSON", "80");
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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