<!DOCTYPE html>
<html lang="<?php echo $this->lang ?>" prefix="og: http://ogp.me/ns#">
<?php
    // Header
    require('header.php');
?>
    <body id="top" class="scrollspy" <?php echo $this->body_onload != '' ? "onload='{$this->body_onload}'" : '' ?>>
<div class="menu_left_side hide-on-med-and-up">
    <ul>
        <li class="vertical-text" data-href="#mywork">Meu Trabalho</li>
        <li class="vertical-text" data-href="#skills">Habilidades</li>
        <li class="vertical-text" data-href="#contact">Contato</li>
    </ul>
</div>
        <div id="wrapper">
            <div id="principal">
<?php
    // Menu
    require('menu.php');
?>
    <article id="conteudo">
<?php
    // Conteudo
    echo $this->conteudo;
?>
                <!-- /article container -->
                </article>
            
<?php
    // Footer
    require('footer.php');
?>

                <!-- /div principal -->
            </div>
        <!-- /div wrapper -->
        </div>
    <!-- Scripts rodam mais rapidos e de forma melhor estando no fim da pagina -->
    <script type="text/javascript" src="/min/?f=/js/plugin-min.js,/js/materialize.js,/js/custom-min.js,/js/wow.min.js"></script>
    <script type="text/javascript" src="/js/myjs.js"></script>
<?php 
    echo $this->createTagsJS($this->links_js_footer);
    echo $this->embedded_js_footer ? "<script type='text/javascript'>{$this->embedded_js_footer}</script>" : '';
 ?>
    </body>
</html>