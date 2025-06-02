<?php
//requisitando diretorios 
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
require 'vendor/autoload.php';

//configuração do OAuth
$clientID='';
$clientSecret='';
$refreshToken='';
$emailClient=''; 

//criação do provedor OAuth
$provedor = new Google([
    'clientId' => $clientId,
    'clientSecret' => $clientSecret,
]);

$mail = new PHPMailer(true); //criação do objeto mail

//configuração do phpMailer para o envio de email
$mail->isSMTP();                                                       //protocolo SMTP
$mail->Host='smtp.gmail.com';
$mail->SMTPAuth=true;                                                  
    $mail->setOAuth(  
        new OAuth([
            'provider' => $provedor,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
            'refreshToken' => $refreshToken,
            'userName' => $emailClient,
        ])
    );
                 
$mail->SMTPSecure = 'tls';                                              //criptografia tls
$mail->Port=587;                                                       //porta tpc para conectar

//configuração da mensagem

$mail->setFrom(address: 'nao-responda@gmail.com', name: 'Formulario de Currículo');    //define remetente e nome do mesmo
$mail->addAddress(address: "guirineuqazwsxx@gmail.com");                   //define destinatario
$mail->isHTML(isHtml: true);
$mail->Subject = "Curriculo recebido!";                                                //define assunto do mail
$mail->Body = "
    <h3>Novo curriculo enviado</h3><br>
    Nome: $nome $segundoNome<br>
    mail: $email<br>
    Telefone: $telefone<br>
    Cargo: $cargo";

$mail->addStringAttachment(string: $conteudoCurriculo, filename: $nomeArquivo);        //envia arquivo de curriculo

$mail->send();
return true;
