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
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
            <div class="col s12 m4 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="http://fakeimg.pl/500/">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Projeto X <i class="mdi-navigation-more-vert right"></i></span>
                        <p><a href="#">Projeto link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Projeto X <i class="mdi-navigation-close right"></i></span>
                        <p>Um pouco sobre o projeto.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Skills -->
<div class="section scrollspy" id="skills">
    <div class="container">
        <h2 class="header text_b">Habilidades </h2>
        <div class="row">
            <div class="col s12 m8 l8">
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
            <div class="col s12 m4 l4">
                <div id="curriculo_habilidades">
                    <h5>Habilidades</h5>
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