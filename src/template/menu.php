<?php
    /* menu de todas as paginas */
    $is_pagina_home = false; //top
    $is_pagina_work = false; //work
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
                <li <?php echo $is_pagina_work ? 'class="selected"' : ''?>><a href="#intro" data-hash="#page_intro">Meu Trabalho</a></li>
                <li <?php echo $is_pagina_skills ? 'class="selected"' : ''?>><a href="#skills" data-hash="#page_skills">Habilidades</a></li>
                <li> <?php echo $is_pagina_contato ? 'class="selected"' : ''?><a href="#contact" data-hash="#page_contact">Contato</a></li>
            </ul><a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>