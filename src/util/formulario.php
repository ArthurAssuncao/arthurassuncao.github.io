<?php
function cria_input($texto_campo, $nome_campo, $tipo='text', $required=false, $placeholder='', $title='', $pattern='', $help_text=''){
	/*<label class="control-label" for="input01">Text input</label>
		  <div class="controls">
			<input type="text" class="input-xlarge" id="input01">
			<p class="help-block">Supporting help text</p>
		  </div>*/
	$required = $required ? 'required' : '';
	//echo '<div class="control-group">'."\n";
	echo "<label class='control-label $required' for='$nome_campo'>$texto_campo</label>\n";
	echo '<div class="controls">'."\n";
	$pattern = $pattern ? "pattern=\"$pattern\"" : '';
	echo "<input name='$nome_campo' type='$tipo' class='input-xxlarge' id='$nome_campo' $required placeholder='$placeholder' title='$title' alt='$texto_campo' $pattern>\n";
	if($help_text) echo "<p class='help-block'>$help_text</p>\n";
	echo '</div>';
	//echo '</div>';
}

function cria_textarea($texto_campo, $nome_campo, $linhas='1', $colunas='10', $required=false, $placeholder='', $title='', $help_text=''){
	$required = $required ? 'required' : '';
	//echo '<div class="control-group">'."\n";
	echo "<label class='control-label $required' for='$nome_campo'>$texto_campo</label>\n";
	echo '<div class="controls">'."\n";
	echo "<textarea name='$nome_campo' cols='$colunas' rows='$linhas' class='input-xxlarge' id='$nome_campo' $required placeholder='$placeholder' title='$title' alt='$texto_campo'></textarea>\n";
	if($help_text) echo "<p class='help-block'>$help_text</p>\n";
	echo '</div>';
	//echo '</div>';
}
?>