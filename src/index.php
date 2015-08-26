<?php
    require('template/PaginaCached.class.php');
    $pagina = new PaginaCached(__FILE__);

    $pagina->setTitle('Arthur Assunção - Desenvolvedor');
    $pagina->setDescription('Arthur Assunção - Desenvolvedor');
    $pagina->setKeywords('Arthur Assunção, Sistemas para Internet, Desenvolvedor, Mestre em Computação');
    $pagina->setCanonical($pagina->createCanonicalLink());

    // $pagina->addCSS('min/plugin-min.css');
    // $pagina->addCSS('min/custom-min.css');
    // $pagina->addCSS('css/mystyle.css');

    require('template/PaginaCurriculo.class.php');
    $pagina->iniciarConteudo();
?>
    <!--Hero-->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <h1 class="text_h center header cd-headline letters type">
                <span>Hei, meu nome é Arthur e sou </span> 
                <span class="cd-words-wrapper waiting">
                    <b class="is-visible">mestrando em Ciência da Computação</b>
                    <b>desenvolvedor de Apps Móveis</b>
                    <b>desenvolvedor Web</b>
                    <b>desenvolvedor de Sistemas</b>
                </span>
            </h1>
        </div>
    </div>
    
    <!--Intro and service-->
<div id="intro" class="section scrollspy">
    <div class="container">
        <div class="row">
            <!--
            <div  class="col s12">
                <h2 class="center header text_h2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="span_h2"> Phasellus  </span>vestibulum lorem risus, nec suscipit lorem <span class="span_h2"> laoreet quis.</span> </h2>
            </div>
            -->

            <div  class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-image-flash-on"></i>
                    <h5 class="promo-caption">Acelere o desenvolvimento</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-social-group"></i>
                    <h5 class="promo-caption">Foco na experiência do usuário</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="center promo promo-example">
                    <i class="mdi-hardware-desktop-windows"></i>
                    <h5 class="promo-caption">Totalmente responsivo</h5>
                    <p class="light center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Work-->
<div class="section scrollspy" id="work">
    <div class="container">
        <h2 class="header text_b">Alguns projetos que participei </h2>
        <div class="row">
            <?php
                echo PaginaCurriculo::createProjetoPortfolio(
                    "MaisVendas", 
                    array("MaisVendas na PlayStore", "https://play.google.com/store/apps/details?id=com.vendas"), 
                    "http://fakeimg.pl/300x200/",
                    array("Participei da programação para Android do app móvel e do Web Service em Django da empresa AddMob.",
                    "Foi feito o desenolvimento do app Android e Web Service em Django com banco de dados MySQL, uso de notação JSON para comunicação entre os sistemas e utilização de controle de versão Git para uma melhor manutenção do código e colaboração entre os membros da equipe.",
                    "O MaisVendas é um sistema para quem deseja ter seu catálogo de produtos e sua lista de clientes disponíveis ao toque da tela de seu tablet ou smartphone. É possível realizar vendas, consultar pedidos realizados, verificar o histórico de vendas através do gráfico iterativo e muito mais."
                    )
                );
            ?>
            <?php
                echo PaginaCurriculo::createProjetoPortfolio(
                    "JUMP!", 
                    array("Repositorio do projeto","https://github.com/arthurassuncao/jump"), 
                    "http://fakeimg.pl/300x200/",
                    array("Participei da equipe de desenvolvimento do jogo JUMP (Jogo Unificado para Movimentação Projetada).",
                    "O jogo permite que o jogador, em frente a uma webcam, controle, por meio de seus pulos, o personagem do jogo.",
                    "Foram utilizados: linguagem Python com a biblioteca OpenCV e Node.js.",
                    "Projeto foi apresentado na Semana Nacional de Ciência e Tecnologia (SNCT) de 2013 no IFSEMG - Câmpus Barbacena."
                    )
                );
            ?>
            <?php
                echo PaginaCurriculo::createProjetoPortfolio(
                    "uGuide Desk", 
                    array("Repositorio do projeto","https://github.com/arthurassuncao/jump"), 
                    "http://fakeimg.pl/300x200/",
                    array("Participei da equipe de desenvolvimento da aplicação.",
                    "O projeto consistiu de um software informativo e interativo para acompanhamento de eventos e notícias do Festival de Inverno de Ouro Preto e Mariana de 2014 com interação com os usuários por meio do sensor Kinect.",
                    "Foram utilizadas linguagem C++ e interface gráfica Qt com comunicação com o Web Service via JSON."
                    )
                );
            ?>
            <?php
                echo PaginaCurriculo::createProjetoPortfolio(
                    "Chrome Extensions", 
                    array("Entensões na Chrome Store","https://chrome.google.com/webstore/search/adev?hl=pt-BR"), 
                    "http://fakeimg.pl/300x200/",
                    array("Desenvolvimento de extensões para o navegador Google Chrome:",
                    "<ul>
                    <li>
                        <a href='https://chrome.google.com/webstore/detail/hide-contact-from-faceboo/dldcnjjdfolnampaceecohfaolbefbhj'>Hide Contact From Facebook Chat List</a><br />
                        <p>Esconde contatos da lista do chat do Facebook sem bloquear o contato. O contato continua te vendo na lista do chat dele como online, porém voce não o vê mais.</p>
                    </li>
                    <li>
                        <a href='https://chrome.google.com/webstore/detail/wpp-web-customizer/lhaamjcmnafobcjjcjfpglfonpdkoedb'>Wpp web Customizador</a><br />
                        <p>Modifica o fundo (background) do chat do Whatsapp™ Web.</p>
                    </li>
                    </ul>"
                    )
                );
            ?>
            <?php
                echo PaginaCurriculo::createProjetoPortfolio(
                    "Addmob.com.br", 
                    array("Addmob.com.br","https://www.addmob.com.br"), 
                    "http://fakeimg.pl/300x200/",
                    array("Participei do desenvolvimento do Website da empresa AddMob Integradora de Soluções Ltda.",
                    "Website desenvolvido em HTML5/CSS3 e Django, utilizando o framework Bootstrap 2.x e jQuery, com layout responsivo e captura de gestos (Hammer.js) para otimizar a experiência em dispositivos móveis."
                    )
                );
            ?>
        </div>
    </div>
</div>

<!-- Skills -->
<div class="section scrollspy" id="skills">
    <div class="container">
        <h2 class="header text_b">Habilidades </h2>
        <div class="row">
            <div class="col s12 m6 l6">
                <div id="curriculo_formacao">
                    <h5>Formação</h5>
                    <ul id="lista_formacao" class="list-unstyled">
                        <li class='curriculo_item'>
                            <?php
                            echo PaginaCurriculo::createFormacao(
                                "Mestrado em Ciência da Computação", 
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
                                "IF Sudeste MG",
                                "",
                                "2.500 h",
                                "2011",
                                "2014"
                            );
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- fim formacao -->
                <hr />
                <!-- producao cientifica -->
                <div id="curriculo_producao">
                    <h5>Produção Científica</h5>
                    <ul id="lista_experiencia" class="list-unstyled">
                        <li class='curriculo_item'>
                            <?php 
                            echo PaginaCurriculo::createProducaoCientifica(
                                "Methodology to Events Identification in Vehicles Using Statistical Process Control on Steering Wheel Data", //titulo
                                array("Arthur N. Assuncao", "Fabio O. de Paula", "Ricardo A. R. Oliveira"), //autores
                                1,
                                "The 13th ACM International Symposium on Mobility Management and Wireless Access (MobiWac 2015)", //evento
                                "MobiWac", //sigla
                                "2015", //ano
                                "11", //mes
                                "" //url
                            ); 
                            ?>
                        </li>
                    </ul>
                </div>
                <!-- fim producao cientifica -->
            </div>
                <!-- habilidades -->
            <div class="col s12 m5 l5 offset-m1 offset-l1">
                <div id="curriculo_habilidades">
                    <h5>Habilidades</h5>
                    <ul class="list-unstyled">
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Android", "70");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Python", "60");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("JavaScript/jQuery", "60");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("R", "70");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("HTML5/CSS3", "70");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Twitter Bootstrap 2.x - 3.x", "70");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Git (Controle de Versão)", "90");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Design Responsivo", "70");
                            ?>
                        </li>
                        <li>
                            <?php
                            echo PaginaCurriculo::createHabilidade("PHP", "40");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("Java", "50");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("C++", "50");
                            ?>
                        </li>
                        <li>
                            <?php
                                echo PaginaCurriculo::createHabilidade("SQL", "60");
                            ?>
                        </li>
                    </ul>
                    <div class="center-align btn_skills_more">
                        <button class="btn waves-effect waves-light" id="btn_skills_more">
                            Mais +
                        </button>
                    </div>
                </div>
                <!-- fim skills -->
            </div>
        </div>
    </div>
</div>

<!--Parallax-->
<div class="parallax-container">
    <div class="parallax"><img src="img/ufop.jpg"></div>
</div>

<?php
    $pagina->finalizarConteudo();
    // $pagina->addJavascript('js/plugin-min.js"');
    // $pagina->addJavascript('js/custom-min.js');
    $embedded_js_footer = "
        $(document).ready(function() {
            var hash = window.location.hash;
            if(hash != ''){
                $('a[data-hash*='+'#pagina_' + hash.replace(/#/,'')+']').click();
            }
        });
    ";
    echo $pagina->renderizar();
?>