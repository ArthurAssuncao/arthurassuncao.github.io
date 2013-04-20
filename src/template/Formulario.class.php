<?php
class Formulario{
    public static function createInput($texto_campo, $nome_campo, $tipo='text', $required=false, $placeholder='', $title='', $pattern='', $help_text=''){
        $required = $required ? 'required' : '';
        $campo = "<label class='control-label $required' for='$nome_campo'>$texto_campo</label>\n";
        $campo .= '<div class="controls">'."\n";
        $pattern = $pattern ? "pattern=\"$pattern\"" : '';
        $campo .= "<input name='$nome_campo' type='$tipo' class='input-xxlarge' id='$nome_campo' $required placeholder='$placeholder' title='$title' alt='$texto_campo' $pattern>\n";
        if($help_text) echo "<p class='help-block'>$help_text</p>\n";
        $campo .= '</div>';
        return $campo;
    }

    public static function createTextarea($texto_campo, $nome_campo, $linhas='1', $colunas='10', $required=false, $placeholder='', $title='', $help_text=''){
        $required = $required ? 'required' : '';
        //echo '<div class="control-group">'."\n";
        $campo = "<label class='control-label $required' for='$nome_campo'>$texto_campo</label>\n";
        $campo .= '<div class="controls">'."\n";
        $campo .= "<textarea name='$nome_campo' cols='$colunas' rows='$linhas' class='input-xxlarge' id='$nome_campo' $required placeholder='$placeholder' title='$title' alt='$texto_campo'></textarea>\n";
        if($help_text) echo "<p class='help-block'>$help_text</p>\n";
        $campo .= '</div>';
        return $campo;
    }
}
?>