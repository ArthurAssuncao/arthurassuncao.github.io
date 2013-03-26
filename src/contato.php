<?php 
	// verifica requisicao post
	$envia = isset($_POST["envia"]) ? $_POST["envia"] : '';
	if(strcmp($envia, 'true') == 0){
		$nome_completo = $_POST["nome_completo"];
		$email = $_POST["email"];
		$assunto = $_POST["assunto"];
		$mensagem = $_POST["mensagem"];
		
		require_once ('util/email/formulario_contato.php');
		
		if(empty($nome_completo) || empty($email) || empty($assunto) || empty($mensagem)){
			$msg_erro = 'Preencha todos os campos';
		}
		else{
			//enviaEmail($email, $nome_completo, $mensagem, $assunto);
		}
	}

	$title = 'Arthur Assunção';
	$description = 'Arthur Assunção';
	$keywords = 'Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github';
	
	require_once('template/header.php');
	
	$regex_email = "[a-zA-Z0-9.!#$%&'*+-/=?\^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*";
	$regex_nome = "^[A-Z][a-zA-Z '&-]*[A-Za-z]$";
	
	require_once('util/formulario.php');
	
?>
    <h3>Contato</h3>
	<span>
	Entre em contato através do formulário, você pode tirar suas dúvidas, fornecer sugestões, reclamar ou simplemente falar comigo.
	<br>
	(*) Campos Obrigatórios
	</span>
	<br><br>
	<div class="row">
        <form class="form-horizontal well span10" action="contato" method="post" onsubmit="valida_campos()">
          <fieldset>
            <div class="control-group">
              <?php
                cria_input('Nome Completo', 'nome_completo', 'text', true, 'Digite seu nome', 'Digite seu nome', $regex_nome); echo '<br>';
                cria_input('E-mail', 'email', 'email', true, 'Digite seu email', 'Digite seu email', $regex_email); echo '<br>';
                cria_input('Assunto', 'assunto', 'text', true, 'Qual o assunto?', 'Digite o assunto', ''); echo '<br>';
                cria_textarea('Deixe sua Mensagem', 'mensagem', '6', '50', true, 'Digite sua mensagem', 'Digite sua mensagem'); echo '<br>';
              ?>
              <input type="hidden" name="envia" value="true" />
              <div class="controls">
                <input type="submit" class="btn btn-info" value="Enviar">
              </div>
            </div>
              <?php 
                if(isset($msg_erro)){
                    echo '<div class="alert alert-error">';
                    echo $msg_erro;
                    echo '</div>';
                }
                ?>
          </fieldset>
        </form>
	</div>
<?php 
	$footer_embedded_js = "
		function valida_campos(){
			
		}
	";
	require_once('template/footer.php');
?>