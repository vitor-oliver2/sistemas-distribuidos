<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$nome = $_POST['nome'];
$telefone = $_POST['tel'];
$email = $_POST['email'];
$nasc = $_POST['nasc'];
$sexo = $_POST['sexo'];
$mensagem = $_POST['msg'];

try {
	// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'pozedurodo2020@gmail.com';
	$mail->Password = 'isananajpvit@2020';
	$mail->Port = 587;

	$mail->setFrom('pozedurodo2020@gmail.com');
	$mail->addAddress('trakiller02@gmail.com');
	// $mail->addAddress('endereco2@provedor.com.br');

	$mail->isHTML(true);
    $mail->Subject = 'Contato - Poze do Rodo';
	$mail->Body = '<head>
						<style>
							div#mensagem {
								background-color: #545454; 
								color: white;
								padding: 10px;
								width: 500px;
								border: 1px solid #5271ff;
								border-radius: 6px;
								margin: auto;
							}

							p {
								font-weight: bold;
								font-size: 13pt;
								text-decoration: none;
							}

							span {
								font-size: 11pt;
								text-decoration: none;
							}

							div#mensagem h2 {
								font-size: 17pt;
								text-align: center;
								color: white;
								border-bottom: 1px dashed #5271ff;
								padding-bottom: 20px;
							}
						</style>
					</head>';
	$mail->Body .= '<div id="mensagem"><h2>Nova Mensagem Recebida!</h2>';
	$mail->Body .= '<p>Nome: <span>' .$nome. '</span></p>';
    $mail->Body .= '<p>Email: <span id="email">'.$email. '</span></p>';
    $mail->Body .= '<p>Sexo: <span>'.$sexo. '</span></p>';
    $mail->Body .= '<p>Telefone: <span>'.$telefone. '</span></p>';
    $mail->Body .= '<p>Data de Nascimento: <span>'.$nasc. '</span></p>';
	$mail->Body .= '<p>Mensagem: <span>'.$mensagem. '</span></p></div>';
	
	if($mail->send()) {
		flush();
		echo '<script>alert("Sua mensagem foi enviada com sucesso!");
				window.close()</script>';

	} else {
		flush();
		echo 'Email nao enviado';
	}
} catch (Exception $e) {
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}

// $nome = $_POST['nome'];
// $email = $_POST['email'];
// $nasc = $_POST['nasc'];
// $sexo = $_POST['sexo'];
// $mensagem = $_POST['msg'];

?>