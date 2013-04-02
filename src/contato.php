<?php 
	// verifica requisicao post
	$envia = isset($_POST['envia']) ? $_POST['envia'] : '';
	if(strcmp($envia, 'true') == 0){
		$nome_completo = ucwords($_POST['nome_completo']);
		$email = $_POST['email'];
		$assunto = $_POST['assunto'];
		$mensagem = $_POST['mensagem'];
		
		include('util/email/email.php');
		
		$erro_email = false;
		$msg_email = '';
		if(empty($nome_completo) || empty($email) || empty($assunto) || empty($mensagem)){
			$erro_email = true;
			$msg_email = 'Preencha todos os campos';
		}
		else{
			$email_obj = new Email($nome_completo, $email, $mensagem, $assunto);
			$resultado = $email_obj->envia();
			if (strcmp($resultado, '') == 0){
				$msg_email = 'Email enviado com sucesso';
			}
			else{
				$erro_email = true;
				$msg_email = $resultado;
			}
		}
	}

	$title = 'Arthur Assunção';
	$description = 'Arthur Assunção';
	$keywords = 'Arthur Assunção, Instituto Federal do Sudeste de Minas Gerais, Barbacena, Sistemas para Internet, Programação, github';
	
	include('template/header.php');
	
	$regex_email = '\S+@\S+\.\S+';
	$regex_nome = '^[A-Z][a-zA-Z \'&-]*[A-Za-z]$';
	
	include('util/formulario.php');
	
?>
    <h3>Contato</h3>
	<span>
	Entre em contato através do formulário, você pode tirar suas dúvidas, fornecer sugestões, reclamar ou simplemente falar comigo.
	<br>
	(*) Campos Obrigatórios
	</span>
	<br><br>
	<div class="row">
        <form name="form_contato" id="form_contato" class="form-horizontal well span10" action="contato" method="post" onsubmit="return valida_campos()">
          <fieldset>
            <div class="control-group">
              <?php
                cria_input('Nome Completo', 'nome_completo', 'text', true, 'Digite seu nome', 'Digite seu nome', $regex_nome); echo '<br>';
                cria_input('E-mail', 'email', 'email', true, 'Digite seu email', 'Digite seu email', $regex_email); echo '<br>';
                cria_input('Assunto', 'assunto', 'text', true, 'Qual o assunto?', 'Digite o assunto', ''); echo '<br>';
                cria_textarea('Deixe sua Mensagem', 'mensagem', '6', '50', true, 'Digite sua mensagem', 'Digite sua mensagem'); echo '<br>';
              ?>
              <input type="hidden" name="envia" />
              <div class="controls">
                <input type="submit" class="btn btn-info" value="Enviar">
              </div>
            </div>
              <?php 
                if(isset($erro_email)){
                	echo $erro_email == true ? '<div class="alert alert-error">' : '<div class="alert alert-info">';
                    echo $msg_email, '</div>';
                }
                ?>
          </fieldset>
        </form>
	</div>
<?php 
	$footer_embedded_js = '
		function valida_campos(){
			return true;
		}
		$(document).ready(function() {
		  document.form_contato.envia.value = "true";
		});
	';
	include('template/footer.php');
?>