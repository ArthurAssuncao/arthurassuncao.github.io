<?php
    // verifica requisicao post
    $envia = isset($_POST['envia']) ? $_POST['envia'] : '';
    if(strcmp($envia, 'true') == 0){
        $nome_completo = ucwords($_POST['nome_completo']);
        $email = $_POST['email'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        
        include('util/email/Email.class.php');
        
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

    if(isset($erro_email)){
        require('template/Pagina.class.php');
        $pagina = new Pagina(__FILE__);
    }
    else{
        require('template/PaginaCached.class.php');
        $pagina = new PaginaCached(__FILE__);
    }
    $pagina->setTitle('Contato - Arthur Assunção');
    $pagina->setDescription('Pagina de contato com o site arthurassuncao.com');
    $pagina->setKeywords('Pagina de contato, contato, arthur assuncao, email, duvidas, sugestoes');
    $pagina->setCanonical($pagina->createCanonicalLink());

    $regex_email = '\S+@\S+\.\S+';
    $regex_nome = '^[A-Z][a-zA-Z \'&-]*[A-Za-z]$';
    
    include('template/Formulario.class.php');

    $pagina->iniciaConteudo();
?>
    <h3>Contato</h3>
    <span>
    Entre em contato através do formulário, você pode tirar suas dúvidas, fornecer sugestões, reclamar ou simplemente falar comigo.
    <br />
    (*) Campos Obrigatórios
    </span>
    <br /><br />
    <div class="row">
        <form name="form_contato" id="form_contato" class="form-horizontal well span10" action="contato" method="post" onsubmit="return valida_campos()">
          <fieldset>
            <div class="control-group">
              <?php
                echo Formulario::createInput('Nome Completo', 'nome_completo', 'text', true, 'Digite seu nome', 'Digite seu nome', $regex_nome); echo '<br>';
                echo Formulario::createInput('E-mail', 'email', 'email', true, 'Digite seu email', 'Digite seu email', $regex_email); echo '<br>';
                echo Formulario::createInput('Assunto', 'assunto', 'text', true, 'Qual o assunto?', 'Digite o assunto', ''); echo '<br>';
                echo Formulario::createTextarea('Deixe sua Mensagem', 'mensagem', '6', '50', true, 'Digite sua mensagem', 'Digite sua mensagem'); echo '<br>';
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
    $pagina->finalizaConteudo();
    $embedded_js_footer = '
        function valida_campos(){
            return true;
        }
        $(document).ready(function() {
          document.form_contato.envia.value = "true";
        });
    ';
    $pagina->addEmbeddedJavascript($embedded_js_footer);
    echo $pagina->renderizar();
?>