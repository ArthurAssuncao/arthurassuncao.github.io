<?php
    /* menu de todas as paginas */
    $is_pagina_home = false; //top
    $is_pagina_mywork = false; //work
    $is_pagina_skills = false; //skills
    $is_pagina_curriculo = false; //cv
    $is_pagina_contato = false; //contact

    if (strcmp($this->canonical, 'http://arthurassuncao.com') == 0){
        //$is_pagina_home = true;
    }
    else if(strcmp($this->canonical, 'http://arthurassuncao.com/skills') == 0){
        $is_pagina_skills = true;
    }
    else if(strcmp($this->canonical, 'http://arthurassuncao.com/cv') == 0){
        $is_pagina_curriculo = true;
    }
    else if(strcmp($this->canonical, 'http://arthurassuncao.com/contact') == 0){
        $is_pagina_contato = true;
    }
?>
<!-- MENU SUPERIOR-->
<!--Navigation-->
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper"><a id="logo-container" href="#top" class="brand-logo">Arthur <span class="hide-on-med-and-down">Assunção</span></a>
                <ul id="nav-mobile" class="right side-nav">
                    <li <?php echo $is_pagina_mywork ? 'class="active"' : ''?>><a href="#mywork" data-hash="#page_mywork">Meu Trabalho</a></li>
                    <li <?php echo $is_pagina_skills ? 'class="active"' : ''?>><a href="#skills" data-hash="#page_skills">Habilidades</a></li>
                    <li> <?php echo $is_pagina_contato ? 'class="active"' : ''?><a href="#contact" data-hash="#page_contact">Contato</a></li>
                </ul><a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>
<div class="menu_left_side hide-on-med-and-up">
    <ul>
        <li class="vertical-text" data-href="#mywork">Meu Trabalho</li>
        <li class="vertical-text" data-href="#skills">Habilidades</li>
        <li class="vertical-text" data-href="#contact">Contato</li>
    </ul>
</div>