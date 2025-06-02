<?php
//requisitando diretorios 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\OAuth;
use League\OAuth2\Client\Provider\Google;
require 'vendor/autoload.php';


//configuração do servidor de envio
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
