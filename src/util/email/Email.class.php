<?php
	include("phpmailer/class.phpmailer.php");
class Email{
	public $phpMailer;

	public function __construct($nome, $email, $mensagem, $assunto){
		require($_SERVER['DOCUMENT_ROOT'].'/config/configs.php');

		//instancia a objetos
		$this->phpMailer = new PHPMailer();
		// define a linguagem
		$this->phpMailer->SetLanguage("br", 'phpMailer/language/');
		// mandar via SMTP
		$this->phpMailer->IsSMTP();
		// Seu servidor smtp
		$this->phpMailer->Host = "smtp.gmail.com:465";
		// usar ssl
		$this->phpMailer->SMTPSecure = 'ssl';
		// habilita smtp autenticado
		$this->phpMailer->SMTPAuth = true;
		// usuário deste servidor smtp
		$this->phpMailer->Username = $email_remetente;
		$this->phpMailer->Password = $senha_remetente;
		//email utilizado para o envio 
		//pode ser o mesmo de username
		$this->phpMailer->From = $email_remetente;
		$this->phpMailer->FromName = $nome_remetente;

		//Enderecos que devem ser enviadas as mensagens
		$this->phpMailer->AddAddress($email_destinatario, $nome_destinatario);
		//wrap seta o tamanhdo do texto por linha
		$this->phpMailer->WordWrap = 50; 
		//anexando arquivos no email
		//$this->phpMailer->AddAttachment("anexo/arquivo.zip"); 
		$this->phpMailer->IsHTML(false); //enviar em HTML

	    // informando a quem devemos responder 
		//ou seja para o mail inserido no formulario
		$this->phpMailer->AddReplyTo("$email", "$nome");

		//criando o codigo html para enviar no email
		$msg = "<b> Nome:</b> $nome<br>\n";
		$msg .= "<b> E-mail:</b> $email<br>\n";
		$msg .= "<b> Mensagem:</b> $mensagem<br>\n";

		//adicionando o assunto do email
		$this->phpMailer->Subject = $assunto;
		//adicionando o html no corpo do email
		$this->phpMailer->Body = $msg;
	}

	public function envia(){
		//enviando e retornando o status de envio
		if(!$this->phpMailer->Send()){
			return 'Houve um erro ao  enviar o email! '.$this->phpMailer->ErrorInfo;
			//$this->phpMailer->ErrorInfo informa onde ocorreu o erro 
			//exit;
		}
		return '';
	}
}
?>